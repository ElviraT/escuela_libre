<?php

namespace App\Http\Controllers;

use App\Mail\UserReminderEmail;
use App\Models\Alumno;
use App\Models\Representative;
use App\Models\Status;
use App\Models\Teacher;
use App\Models\Ticket;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get()->count();
        $tickets = Ticket::where('state_id', '3')->get()->count();
        $teachers = Teacher::get()->count();
        $students = Alumno::get()->count();

        // CONSULTA MOROSOS
        $morosos = DB::table('representatives')
            ->whereNotExists(function ($query) {
                $query->from('payments')
                    ->where('payments.id_representative', DB::raw('representatives.id'))
                    ->whereYear('payments.payment_date', now()->year)
                    ->whereMonth('payments.payment_date', now()->month);
            })
            ->join('users', 'users.id', 'representatives.id_user')
            ->select('users.id', 'users.name', 'users.last_name', 'users.email')
            ->get();
        $status = Status::all();
        return view('dashboard', compact('user', 'tickets', 'teachers', 'students', 'morosos', 'status'));
    }
    public function reminder($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new UserReminderEmail($user));
        return redirect()->back();
    }

    public function change(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::find($request->id);
            $user->status = $request->id_status;
            $user->update();

            $representative = Representative::where('id_user', $request->id)->first();
            $representative->id_status = $request->id_status;
            $representative->update();

            $student = Alumno::where('id_representative', $representative->id)->get();
            foreach ($student as $item) {
                $item->idStatus = $request->id_status;
                $item->update();
            }


            DB::commit();
            Toastr::success(__('Updated registration'),  __('Status'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }
}
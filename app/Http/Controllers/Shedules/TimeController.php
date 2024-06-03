<?php

namespace App\Http\Controllers\Shedules;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Teacher;
use App\Models\Time;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TimeController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasAnyRole('Teacher')) {
            $times = Time::where('id_teacher', Auth::user()->id)->get();
        } else {
            $times = Time::all();
        }
        $days = Day::all();
        $teachers = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('teachers', 'users.id', '=', 'teachers.id_user')
            ->where('roles.name', 'Profesor')
            ->where('users.status', 1)
            ->select('teachers.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        return view('times.index', compact('days', 'times', 'teachers'));
    }


    public function store(Request $request)
    {
        try {
            $resultado = ($request->post());
            $time = Time::create($resultado);

            Toastr::success(__('added successfully'),  __('Time'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function edit(string $id)
    {
        $time = Time::find($id);
        return response()->json($time);
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        try {
            $time = Time::find($id);
            $time->update($input);

            Toastr::success(__('Updated registration'),  __('Shedule'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function destroy(Time $time)
    {
        $time->delete();
        Toastr::success(__('Registration Successfully Disabled'), 'Disabled');
        return redirect()->back();
    }
}

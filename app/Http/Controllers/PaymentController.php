<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Bank;
use App\Models\MethodPayment;
use App\Models\Payment;
use App\Models\Representative;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        $representatives = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('representatives', 'users.id', '=', 'representatives.id_user')
            ->where('roles.name', 'Representante')
            ->where('users.status', 1)
            ->select('representatives.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        $banks = Bank::all();
        $status = Status::all();
        $methods = MethodPayment::all();

        return view('payments.index', compact('payments', 'representatives', 'banks', 'status', 'methods'));
    }

    public function store(Request $request)
    {

        $id_user = ['id_user' => Auth::user()->id];
        $request['payment_date'] = DateTime::createFromFormat("d-m-Y", $request['payment_date'])->format("Y-m-d");
        $resultado = array_merge($request->post(), $id_user);
        try {
            DB::beginTransaction();
            $payment = Payment::create($resultado);
            $transaction = Transaction::create($resultado);
            if ($payment->id_status == 1) {
                $bank = Bank::where('id', $payment->id_bank)->first();
                $bank->increment('monto', $payment->monto);
            }
            DB::commit();
            Toastr::success(__('Added successfully'), __('Payment') . ': ' . $request->input('reference'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resultado = $request->all();
        try {
            DB::beginTransaction();
            $payment = Payment::find($id);
            $payment->update($resultado);

            $transaction = Transaction::where('reference', $request->reference);
            $transaction->update($resultado);

            if ($payment->id_status == 1) {
                $bank = Bank::where('id', $payment->id_bank)->first();
                $bank->increment('monto', $payment->monto);
            }

            DB::commit();
            Toastr::success(__('Updated registration'),  __('Payment') . ': ' . $request->input('reference'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function change(Request $request)
    {
        try {
            DB::beginTransaction();
            $payment = Payment::find($request->id);
            $payment->id_status = $request->id_status;
            $payment->update();

            $representative = Representative::where('id_user', $payment->id_representative)->first();
            $representative->id_status = $request->id_status;
            $representative->update();

            $user = User::find($representative->id_user);
            $user->status = $request->id_status;
            $user->update();

            $student = Alumno::where('id_representative', $representative->id)->get();
            foreach ($student as $item) {
                $item->idStatus = $request->id_status;
                $item->update();
            }

            if ($payment->id_status == 1) {
                $bank = Bank::where('id', $payment->id_bank)->first();
                $bank->increment('monto', $payment->monto);
            }
            DB::commit();
            Toastr::success(__('Updated registration'),  __('Status'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }
    public function destroy($id)
    {
        //
    }
}

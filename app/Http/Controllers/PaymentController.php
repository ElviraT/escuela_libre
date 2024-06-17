<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Payment;
use App\Models\Status;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('payments.index', compact('payments', 'representatives', 'banks', 'status'));
    }

    public function store(Request $request)
    {

        $id_user = ['id_user' => Auth::user()->id];
        $resultado = array_merge($request->post(), $id_user);
        try {
            $payment = Payment::create($resultado);
            Toastr::success(__('Added successfully'), __('Payment') . ': ' . $request->input('reference'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();

        return view('banks.index', compact('banks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $bank = Bank::create($request->post());
            Toastr::success(__('Added successfully'), __('Bank') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $bank = Bank::find($id);
        return response()->json($bank);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $bank = Bank::find($id);
            $bank->name = $request->input('name');
            $bank->account = $request->input('account');
            $bank->titular = $request->input('titular');
            $bank->save();
            Toastr::success(__('Updated registration'), __('Bank') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}

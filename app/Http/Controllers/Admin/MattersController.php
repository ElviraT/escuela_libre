<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matter;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MattersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $matter = Matter::create($request->post());
            Toastr::success(__('Added successfully'), __('Matter') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $matter = Matter::find($id);
        return response()->json($matter);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $matter = Matter::find($id);
            $matter->name = $request->input('name');
            $matter->id_grade = $request->input('id_grade');
            $matter->id_status = $request->input('id_status');
            $matter->save();
            Toastr::success(__('Updated registration'), __('Matter') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    public function destroy(Matter $matter)
    {
        $matter->id_status = '2';
        $matter->update();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}

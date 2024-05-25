<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:grades,name',
        ]);
        try {
            $grade = Grade::create($request->post());
            Toastr::success(__('Added successfully'), __('Grade') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $grade = Grade::find($id);
        return response()->json($grade);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $grade = Grade::find($id);
            $grade->name = $request->input('name');
            $grade->id_status = $request->input('id_status');
            $grade->save();
            Toastr::success(__('Updated registration'), __('Grade') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    public function destroy(Grade $grade)
    {
        $grade->id_status = '2';
        $grade->update();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}
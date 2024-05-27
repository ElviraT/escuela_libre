<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $modality = Modality::create($request->post());
            Toastr::success(__('Added successfully'), __('Modality') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $modality = Modality::find($id);
        return response()->json($modality);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $modality = Modality::find($id);
            $modality->name = $request->input('name');
            $modality->id_status = $request->input('id_status');
            $modality->save();
            Toastr::success(__('Updated registration'), __('Modality') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    public function destroy(Modality $modality)
    {
        $modality->id_status = '2';
        $modality->update();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}
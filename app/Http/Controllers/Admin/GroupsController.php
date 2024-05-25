<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $group = Group::create($request->post());
            Toastr::success(__('Added successfully'), __('Group') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return response()->json($group);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $group = Group::find($id);
            $group->name = $request->input('name');
            $group->id_grade = $request->input('id_grade');
            $group->id_status = $request->input('id_status');
            $group->save();
            Toastr::success(__('Updated registration'), __('Group') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    public function destroy(Group $group)
    {
        $group->id_status = '2';
        $group->update();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin\folders;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Folder::all();
        return view('my_unit.folders.index', compact('folders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $folder = Folder::create($request->post());
            Toastr::success(__('Added successfully'), __('Folder') . ': ' . $request->input('name'));
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
        $folders = Folder::findOrFail($id);
        return view('my_unit.folders.show', compact('folders'));
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

    public function sub_folder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'id_parent_folder' => $request->id
        ];
        try {
            $folder = Folder::create($data);
            Toastr::success(__('Added successfully'), __('Folder') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return redirect()->back();
    }
}

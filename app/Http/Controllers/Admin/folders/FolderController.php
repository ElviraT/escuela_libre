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
        $folders = Folder::whereNull('id_parent_folder')->get();
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
        $subfolders = $folders->childfolder;
        return view('my_unit.folders.show', compact('folders', 'subfolders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $folder = Folder::find($id);
        return response()->json($folder);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $folder = Folder::find($id);
            $folder->name = $request->input('name');
            $folder->save();
            Toastr::success(__('Updated registration'), __('Folder') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        $folder->delete();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
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

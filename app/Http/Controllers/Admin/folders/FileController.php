<?php

namespace App\Http\Controllers\Admin\folders;

use App\Http\Controllers\Controller;
use App\Models\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function upload(Request $request)
    {
        try {
            $id = $request->id;
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $request->file('file')->storeAs($request->folder, $fileName, 'public');

            $files = new File();
            $files->name = $fileName;
            $files->id_folder = $id;
            $files->save();

            Toastr::success(__('Updated registration'), __('File'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }
}
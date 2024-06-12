<?php

namespace App\Http\Controllers\Admin\folders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function upload(Request $request)
    {
        $id = $request->id;
        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $request->file('file')->store($request->folder, 'public');
    }
}

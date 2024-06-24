<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        $categories = Category::all();
        return view('announcements.index', compact('announcements', 'categories'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Announcement::create($request->post());
            DB::commit();
            Toastr::success(__('Added successfully'), __('Announcement') . ': ' . $request->input('title'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.show', compact('announcement'));
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return response()->json($announcement);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        try {
            $announcement = Announcement::find($id);
            $announcement->update($input);

            Toastr::success(__('Updated registration'),  __('Announcement'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        Toastr::success(__('Registration Successfully Disabled'), 'Delete');
        return redirect()->back();
    }
}

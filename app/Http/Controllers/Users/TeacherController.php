<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\MaritalStatus;
use App\Models\Sex;
use App\Models\Status;
use App\Models\Teacher;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $genders = Sex::all();
        $status = Status::all();
        $marital = MaritalStatus::all();
        $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'Profesor')
            ->where('users.status', 1)
            ->select('users.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();

        return view('teachers.index', compact('teachers', 'genders', 'status', 'marital', 'users'));
    }

    public function store(Request $request)
    {
        try {
            $resultado = $request->post();
            $teacher = Teacher::create($resultado);

            Toastr::success(__('added successfully'),  __('Teacher'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return response()->json($teacher);
    }

    public function update(Request $request, $id)
    {


        $resultado = $request->all();
        try {
            $teacher = Teacher::find($id);
            $teacher->update($resultado);

            Toastr::success(__('Updated registration'),  __('Teacher'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->id_status = "2";
        $teacher->update();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers\Shedules;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('teachers', 'users.id', '=', 'teachers.id_user')
            ->where('roles.name', 'Profesor')
            ->where('users.status', 1)
            ->select('teachers.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();

        return view('shedules.teacher.index', compact('teachers'));
    }
    public function teacher_time($id)
    {
        $time = Time::where('id_teacher', $id)->get();
        return response()->json($time);
    }
    public function classroom()
    {
        return view('classroom.index');
    }
}

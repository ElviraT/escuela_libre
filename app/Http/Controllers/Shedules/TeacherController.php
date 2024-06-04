<?php

namespace App\Http\Controllers\Shedules;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Matter;
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
        $matters = Matter::where('id_status', 1)->get();
        return view('shedules.teacher.index', compact('teachers', 'matters'));
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

    public function consulta($id)
    {
        $days = Day::join('times', 'days.id', 'times.id_day')
            ->join('teachers', 'times.id_teacher', 'teachers.id')
            ->where('teachers.id', $id)
            ->select(['days.id', 'days.name'])
            ->get();
        return response()->json($days);
    }

    public function consulta2($id, $teacher)
    {
        $hours = Time::where('id_day', $id)->where('id_teacher', $teacher)->first();
        return response()->json($hours);
    }

    public function title($id)
    {
        $title = Matter::join('groups', 'matters.id_grade', 'groups.id_grade')
            ->where('matters.id', $id)
            ->select('matters.name as Materia', 'groups.name as Grupo')
            ->first();
        return response()->json($title);
    }
}

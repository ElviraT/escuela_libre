<?php

namespace App\Http\Controllers\Shedules;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Day;
use App\Models\Event;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Time;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $colores = Color::all();
        $groups = Group::all();
        $days = Day::all();
        return view('shedules.teacher.index', compact('teachers', 'matters', 'colores', 'groups', 'days'));
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
        $title = Matter::where('id', $id)->first();
        $groups = Group::where('id_grade', $title->id_grade)->get();
        return response()->json($groups);
    }

    public function shedules_class(Request $request)
    {
        try {
            $request['startRecur'] = DateTime::createFromFormat("d-m-Y", $request['startRecur'])->format("Y-m-d");
            $request['endRecur'] = DateTime::createFromFormat("d-m-Y", $request['endRecur'])->format("Y-m-d");
            $event = Event::create($request->post());
            Toastr::success(__('added successfully'),  __('Event'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }

        return Redirect::back();
    }

    public function mostrar($id)
    {
        $event = Event::where('id_teacher', $id)->get();
        return response()->json($event);
    }

    public function edit($id)
    {
        $event = Event::where('id', $id)->first();
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        try {
            $event = Event::find($id);
            $event->update($request->post());
            Toastr::success(__('Updated registration'),  __('Event') . ':' . $request->title);
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }
    public function destroy($id)
    {
        try {
            $event = Event::find($id);
            $event->delete();
            Toastr::success(__('Registration Successfully Disabled'), __('Deleted'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }
}

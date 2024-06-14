<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('alumnos', 'users.id', '=', 'alumnos.id_user')
            ->where('roles.name', 'Alumno')
            ->where('users.status', 1)
            ->select('alumnos.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        return view('shedules.students.index', compact('students'));
    }

    public function mostrar($id)
    {
        $event = Event::join('alumnos', 'events.id_group', 'alumnos.id_group')
            ->where('alumnos.id', $id)
            ->select(
                'events.id',
                'events.title',
                'events.startime',
                'events.endtime',
                'events.id_day',
                'events.freq',
                'events.interval',
                'events.startRecur',
                'events.endRecur',
                'events.color'
            )
            ->get();
        return response()->json($event);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}

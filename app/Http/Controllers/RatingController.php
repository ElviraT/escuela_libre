<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grade;
use App\Models\Matter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('teachers', 'users.id', '=', 'teachers.id_user')
            ->where('roles.name', 'Profesor')
            ->where('users.status', 1)
            ->select('teachers.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        $grades = Grade::all();

        return view('ratings.index', compact('teachers', 'grades'));
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
    public function getData($data)
    {
        $array = explode(',', $data);

        $alumno = User::join('alumnos', 'users.id', 'alumnos.id_user')
            ->where('alumnos.id_grade', $array[0])
            ->where('alumnos.id_group', $array[1])
            ->select('alumnos.id as ID', DB::raw('CONCAT(users.name, " ", users.last_name) AS NOMBRE'))
            ->get();
        return response()->json($alumno);
    }
}

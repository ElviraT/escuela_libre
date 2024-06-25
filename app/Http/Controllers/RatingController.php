<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grade;
use App\Models\Matter;
use App\Models\Rating;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
            ->select('users.id as user', 'teachers.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        $grades = Grade::all();

        return view('ratings.index', compact('teachers', 'grades'));
    }


    public function store(Request $request)
    {
        try {
            $ratingData = [
                'id_teacher' => $request->id_teacher,
                'id_student' => $request->id_student,
                'id_matter' => $request->id_matter,
                'id_grade' => $request->id_grade,
                'id_group' => $request->id_group,
                'rating' => $request->rating,
                'absence' => $request->absence,
                'comment' => $request->comment,
            ];

            // Define the unique criteria for identifying an existing rating
            $uniqueCriteria = [
                'id_teacher' => $request->id_teacher,
                'id_student' => $request->id_student,
                'id_matter' => $request->id_matter,
                'id_grade' => $request->id_grade,
                'id_group' => $request->id_group,
            ];

            $rating = Rating::updateOrCreate($uniqueCriteria, $ratingData);
            Toastr::success(__('added successfully'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

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
<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Group;
use App\Models\Relationship;
use App\Models\Sex;
use App\Models\Status;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::where('id_representative', $_GET['id'])->get();
        $status = Status::all();
        $relacion = Relationship::all();
        $genders = Sex::all();
        $groups = Group::where('id_status', 1)->get();
        $id_representative = $_GET['id'];
        $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'Alumno')
            ->where('users.status', 1)
            ->select('users.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        return view('representatives.alumno.index', compact('groups', 'users', 'alumnos', 'status', 'relacion', 'genders', 'id_representative'));
    }

    public function store(Request $request)
    {
        if ($request->is_alergy == 'on') {
            $request['is_alergy'] = '1';
        } else {
            $request['is_alergy'] = '0';
        }
        if ($request->is_disability == 'on') {
            $request['is_disability'] = '1';
        } else {
            $request['is_disability'] = '0';
        }

        try {
            $resultado = ($request->post());
            Alumno::create($resultado);

            Toastr::success(__('added successfully'),  __('Alumno'));
        } catch (\Illuminate\Database\QueryException $e) {

            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    public function edit(string $id)
    {
        $alumno = Alumno::find($id);
        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->is_alergy == 'on') {
            $request['is_alergy'] = '1';
        } else {
            $request['is_alergy'] = '0';
        }
        if ($request->is_disability == 'on') {
            $request['is_disability'] = '1';
        } else {
            $request['is_disability'] = '0';
        }

        $input = $request->all();

        try {
            $alumno = Alumno::find($id);
            $alumno->update($input);

            Toastr::success(__('Updated registration'),  __('Alumno'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->idStatus = "2";
        $alumno->update();
        Toastr::success(__('Registration Successfully Disabled'), 'Disabled');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Modality;
use App\Models\Status;

class ControlsController extends Controller
{
    public function index()
    {
        return view('controls.index');
    }

    public function grades()
    {
        $grades = Grade::all();
        $status = Status::all();
        return view('controls.grades.index', compact('grades', 'status'));
    }

    public function groups()
    {
        $groups = Group::all();
        $grades = Grade::where('id_status', 1)->get();
        $status = Status::all();
        return view('controls.groups.index', compact('groups', 'grades', 'status'));
    }
    public function matters()
    {
        $matters = Matter::all();
        $grades = Grade::where('id_status', 1)->get();
        $status = Status::all();
        return view('controls.matters.index', compact('matters', 'grades', 'status'));
    }

    public function modalities()
    {
        $modalities = Modality::all();
        $status = Status::all();
        return view('controls.modalities.index', compact('modalities', 'status'));
    }
}

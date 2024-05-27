<?php

namespace App\Http\Controllers\Shedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('shedules.teacher.index');
    }
}

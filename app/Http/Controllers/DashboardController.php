<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Teacher;
use App\Models\Ticket;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get()->count();
        $tickets = Ticket::where('state_id', '3')->get()->count();
        $teachers = Teacher::get()->count();
        $students = Alumno::get()->count();

        return view('dashboard', compact('user', 'tickets','teachers', 'students'));
    }
}
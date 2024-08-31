<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanySettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = CompanySettings::first();
        return view('welcome', compact('setting'));
    }
    public function contact()
    {
        $setting = CompanySettings::first();
        return view('contacto', compact('setting'));
    }

    public function about()
    {
        $setting = CompanySettings::first();
        return view('about', compact('setting'));
    }

    public function project()
    {
        $setting = CompanySettings::first();
        return view('project', compact('setting'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\State;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function state($country)
    {
        $states = State::select(['id', 'name'])->where('idCountry', $country)->get();
        return response()->json($states);
    }

    public function city($state)
    {
        $cities = City::select(['id', 'name'])->where('idState', $state)->get();
        return response()->json($cities);
    }

    public function municipality($state)
    {
        $municipalities = Municipality::select(['id', 'name'])->where('idState', $state)->get();
        return response()->json($municipalities);
    }

    public function parish($municipality)
    {
        $municipalities = Parish::select(['id', 'name'])->where('idMunicipality', $municipality)->get();
        return response()->json($municipalities);
    }

    public function group($grade)
    {
        $groups = Group::select(['id', 'name'])->where('id_grade', $grade)->get();
        return response()->json($groups);
    }

    public function matter($grade)
    {
        $matters = Matter::select(['id', 'name'])
            ->where('id_grade', $grade)
            ->where('id_status', 1)
            ->get();
        return response()->json($matters);
    }
}

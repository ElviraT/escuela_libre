<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Brian2694\Toastr\Facades\Toastr;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $regiones = State::all();
        return view('regiones.index', compact('countries','regiones'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=> 'required',
        ]);
        try{
            $regiones= State::create($request->post());
            Toastr::success(__('Added successfully'), __('State') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    
    public function edit($id)
    {
     $region = State::find($id);
     return response()->json($region);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $region = State::find($id);
            $region->name = $request->input('name');
            $region->idCountry = $request->input('idCountry');
            // $bank->titular = $request->input('titular');
            $region->save();
            Toastr::success(__('Updated registration'), __('State') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $region)
    {
        $region->delete();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}

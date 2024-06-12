<?php

namespace App\Http\Controllers\Direction;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $regiones = State::all();
        $cities = City::all();
        return view('cities.index', compact('countries', 'regiones','cities'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $cities= City::create($request->post());
            Toastr::success(__('Added successfully'), __('City') . ': ' . $request->input('name'));
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
        $city = City::find($id);
        return response()->json($city);
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
            $city = City::find($id);
            $city->name = $request->input('name');
            $city->idCountry = $request->input('idCountry');
            $city->idState = $request->input('idState');
            // $bank->titular = $request->input('titular');
            $city->save();
            Toastr::success(__('Updated registration'), __('City') . ': ' . $request->input('name'));
        } catch (\Illuminate\Database\QueryException $e) {
            Toastr::error(__('An error occurred please try again'), 'error');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        Toastr::success(__('Registry successfully deleted'), 'Delete');
        return redirect()->back();
    }
}
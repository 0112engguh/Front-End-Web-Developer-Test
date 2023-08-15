<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function index() {
        $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/country')->json();
            
        return view('management.country', compact('country'));
    }

    public function store(Request $request)
    {
        $submit_country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->post('http://backend-dev.cakra-tech.co.id/api/country', [
                'country_code' => $request->country_code,
                'country_name' => $request->country_name,
            ])->body();


            return redirect('country');
    }

    public function update($id)
    {
        $getCountry = $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/country/'. $id)->json();

        $countrys = json_encode($getCountry);

        return view('management.editCountry')
        ->with('countrys', $countrys)
        ->with('country', $getCountry);
    }

    public function edit(Request $request, $id)
    {
        $edit_country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->put('http://backend-dev.cakra-tech.co.id/api/country', [
                'id' => $id,
                'country_code' => $request->country_code,
                'country_name' => $request->country_name,
            ]);

            return redirect('country');
    }

    public function delete($id)
    {
        $deleteCountry = $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->delete('http://backend-dev.cakra-tech.co.id/api/country/'. $id)->json();

        $del_country = json_encode($deleteCountry);

        return redirect('country');
    }

    public function country() {
        $data = "Data All country";
        return response()->json($data, 200);
    }

    public function countryAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
}
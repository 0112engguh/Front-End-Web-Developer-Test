<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function index() {
        $city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/city')->json();

        $province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/province')->json();
            // dd($city);
        return view('management.city', compact('city', 'province'));
    }

    public function store(Request $request)
    {
        $submit_city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->post('http://backend-dev.cakra-tech.co.id/api/city', [
                'city_code' => $request->city_code,
                'city_name' => $request->city_name,
                'province_id' => $request->province_id,
            ])->body();


        return redirect('provinsi');
    }

    public function update($id)
    {

        $getCity = $city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/city/'. $id)->json();

        $province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/province')->json();

        $citys = json_encode($getCity);
    
        return view('management.editCity')
        ->with('city', $getCity)
        ->with('province', $province)
        ->with('citys', $citys);
    }

    public function edit(Request $request, $id)
    {

        $edit_city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->put('http://backend-dev.cakra-tech.co.id/api/city', [
                'id' => $id,
                'city_code' => $request->city_code,
                'city_name' => $request->city_name,
                'province_id' => $request->province_id,
            ]);

            return redirect('city');
    }

    public function delete($id)
    {
        $deleteCity = $city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->delete('http://backend-dev.cakra-tech.co.id/api/city/'. $id)->json();

        $del_city = json_encode($deleteCity);

        return redirect('city');
    }
}

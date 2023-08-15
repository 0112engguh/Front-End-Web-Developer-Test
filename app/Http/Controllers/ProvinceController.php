<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProvinceController extends Controller
{
    public function index()
    {
        $province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/province')->json();

        $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/country')->json();
        
        return view('management.province', compact('province', 'country'));
    }

    public function store(Request $request)
    {
        $submit_province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->post('http://backend-dev.cakra-tech.co.id/api/province', [
                'province_code' => $request->province_code,
                'province_name' => $request->province_name,
                'country_id' => $request->country_id,
            ])->body();


            return redirect('provinsi');
    }

    public function update($id)
    {

        $getProvince = $province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/province/'. $id)->json();

        $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/country')->json();

        $provinces = json_encode($getProvince);

        return view('management.editProvince')
        ->with('province', $getProvince)
        ->with('country', $country)
        ->with('provinces', $provinces);

        // $submit_province = Http::post('http://backend-dev.cakra-tech.co.id/api/province', [
        //     'province_code' => $request->province_code,
        //     'province_name' => $request->province_name,
        //     'country_id' => $request->country_id,
        // ])->body();
        // session(['token' => json_decode ($submit_province)->token]);
        // return redirect('provinsi');

        // $edit_province = Http::withHeaders([
        //     'Authorization' => "Bearer ". $token
        // ])->put('http://backend-dev.cakra-tech.co.id/api/province' . $request->input('id'), [
        //         'province_code' => $request->province_code,
        //         'province_name' => $request->province_name,
        //         'country_id' => $request->country_id,
        //     ]);
        //     dd($edit_province);
        //     return redirect('provinsi');
    }

    public function edit(Request $request, $id)
    {

        // $submit_province = Http::post('http://backend-dev.cakra-tech.co.id/api/province', [
        //     'province_code' => $request->province_code,
        //     'province_name' => $request->province_name,
        //     'country_id' => $request->country_id,
        // ])->body();
        // session(['token' => json_decode ($submit_province)->token]);
        // return redirect('provinsi');

        $edit_province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->put('http://backend-dev.cakra-tech.co.id/api/province', [
                'id' => $id,
                'province_code' => $request->province_code,
                'province_name' => $request->province_name,
                'country_id' => $request->country_id,
            ]);

            return redirect('provinsi');
    }

    public function delete($id)
    {
        $deleteProvince = $province = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->delete('http://backend-dev.cakra-tech.co.id/api/province/'. $id)->json();

        $del_province = json_encode($deleteProvince);

        return redirect('provinsi');
    }
}

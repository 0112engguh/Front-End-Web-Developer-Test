<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ManagementController extends Controller
{
    public function index()
    {

        $country = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/country')->json();

        $city = Http::withHeaders([
            'Authorization' => "Bearer ".session('token')
        ])->get('http://backend-dev.cakra-tech.co.id/api/city')->json();

        // dd($);
        return view('dashboard', compact( 'city', 'country'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CountryController extends Controller
{
    public function country() {
        $data = "Data All country";
        return response()->json($data, 200);
    }

    public function countryAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
}
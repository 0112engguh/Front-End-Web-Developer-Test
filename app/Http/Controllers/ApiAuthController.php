<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Http;

class ApiAuthController extends Controller
{
    Public Function Register(Request $request) 
    {
        $register = Http::post('http://backend-dev.cakra-tech.co.id/api/register', [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'password_confirmation' => $request->password_confirmation,
        ])->body();
        session(['token' => json_decode ($register)->token]);
        return redirect('province'); ;
    }

    public function viewLogin()
    {
        return view('login_user');
        
    }

    Public Function Login(Request $request) 
    {
        $login = Http::post('http://backend-dev.cakra-tech.co.id/api/login', [
        'email' => $request->email,
        'password' => $request->password,
        ])->body();
        session(['token' => json_decode ($login)->token]);
        return redirect('province');    
    }
}

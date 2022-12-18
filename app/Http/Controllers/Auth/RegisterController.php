<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $req){
        //validate req
            $this->validate($req, [
                'name' => 'required|max:255',
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:8'
            ]);


        //store user

        User::create([
            'name' => $req -> name,
            'email' => $req -> email,
            'username' => $req -> username,
            'password' => Hash::make($req -> password)
        ]);
        //sign the user in
        
        auth()->attempt($req->only('email','password'));
        
        //redirect

        return redirect() ->route('dashboard');
    }
}
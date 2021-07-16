<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\register;

class RegistrationController extends Controller
{
    public function __construct(register $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('index');
    }

    public function signUp(Request $request)
    {
        $user = $this->user->create($request->all());
        return redirect()->route('sign-in');
    }

    public function signIn()
    {
        return view('login');
    }

    public function home(Request $request)
    {
        $user = $this->user->where('email',$request->email)->where('password',$request->password)->first();
        if ($user == true){
        return redirect()->route('welcome');
        } else {
            return back();
        }
       
    }

    public function logout()
    {
        return redirect()->route('sign-in');
    }

    public function firstPage()
    {
        return view('firstpage');
    }
}

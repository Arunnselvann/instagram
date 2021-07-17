<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\register;
use Mail;

use App\Http\Mail\ForgotPasswordMail;

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

    public function firstPage()
    {
        return view('firstpage');
    }

    public function logout()
    {
        return redirect()->route('sign-in');
    }

    public function forgotPassword()
    {
        return view('forgotpassword');
    }

    public function passwordChange(Request $request)
    {
        $user = $this->user->where('email',$request->email)->first();
        if($user == TRUE){
            Mail::to($request->email)->send(new \App\Mail\forgotPasswordMail($user));
            return back();
        } else {
            return back();
        }
              
    }

    public function sendMail($id)
    {
        return view('changepassword',compact('id'));
        return back();
    }

    public function passwordChanged(Request $request)
    {
        if($request->password == $request->confirm_password) {    
            $user = $this->user->where('id',$request->id)->update(['password'=>$request->password]);
            return redirect()->route('sign-in');
        } else {
            return back();
        }
    }

}

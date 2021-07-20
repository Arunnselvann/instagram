<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\register;

use App\Models\followers;

use Mail;

use Session;

use App\Http\Mail\ForgotPasswordMail;

class RegistrationController extends Controller
{
    public function __construct(register $user, followers $followers)
    {
        $this->user = $user;
        $this->followers = $followers;
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
            $request->session()->put('user',$user['id']);
            if($request->session()->has('user')){
                return redirect()->route('welcome');
            } else {
                return back();
            }
           
        } else {
            return back();
        }
       
    }

    public function firstPage()
    {
        
        $table = $this->user->get();
        if(Session::has('user')){

        return view('firstpage',compact('table'));
       
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function logout()
    {
        Session::flush();
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

    public function follow($id)
    {
        followers::create([
            'user_id' => $id,
            'follower_id' => Session::get('user'),
            'status' => '0',
         ]);
         return back();
    }

    public function follower()
    {
        $follower = $this->followers->where('user_id',Session::get('user'))->where('status',0)->with('user')->get();
        return view('request',compact('follower'));
    }

    public function followBack($id)
    {
        
        $this->followers->where('user_id',Session::get('user'))->where('follower_id',$id)->update(['status'=>'1']);
        $this->followers->create([
            'user_id' => Session::get('user'),
            'follower_id' => $id,
        ]);
        return back();
    }

    public function followers()
    {
        $friends = $this->followers->where('status',1)->where('user_id',Session::get('user'))->get();
        return view('followerslist',compact('friends'));

    }

  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\register;
use App\Models\Uploads;
use App\Helpers\imageUpload;

use App\Models\followers;
use App\Mail\SendMailable;
use Carbon\Carbon;
use Mail;
use Session;

use App\Http\Mail\ForgotPasswordMail;
use App\Jobs\SendEmailJob;
class RegistrationController extends Controller
{
    use imageUpload;
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
      
        if(Session::has('user')){

        return view('firstpage');
       
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function upload()
    {
        return view('upload');
    }

    public function fileUpload(Request $request)
    {
        $image = new Uploads();
        $image->image_name = $this->commonImageUpload($request->file,'insta');

        $image->user_id = Session::get('user');
        $image->save();
        $image = Uploads::findOrFail($image_name);

        $image_file = Uploads::make($image->image_name);
   
        $response = Response::make($image_file->encode('jpeg'));
   
        $response->header('Content-Type', 'image/jpeg');
   
        return $response;
        
        return back();
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

    public function findFriends()
    {
        $table = $this->user->where('id','!=',Session::get('user'))->get();
        return view('find-friends',compact('table'));
    }

    public function follow($id)
    {
        $checkAlreadyRequested = followers::where('user_id',Session::get('user'))->where('follower_id', $id)->count();
        if ($checkAlreadyRequested < 1) {
            # code...
            followers::create([
                'user_id' => Session::get('user'),
                'follower_id' => $id,
                'status' => '0',
            ]);
            return back()->with('success','Follow request sent');
        } else {
            return back()->with('error','Already request sent');
        }
    }

    public function followRequest()
    {
        $follower = $this->followers->where('follower_id',Session::get('user'))->where('status',0)->with('follower')->get();
        return view('request',compact('follower'));
    }

    public function followBack($id)
    {
        
       $this->followers->where('user_id',$id)->update(['status' => 1]);
         return back()->with('message','Follow request sent');
    }

    public function followers()
    {
            
        $requested =$this->followers->where('follower_id',Session::get('user'))->with('follower')->get();
        return view('followerslist',compact('requested'));
        
    }

    public function following()
    {
        $following = $this->followers->where('user_id',Session::get('user'))->with('user')->get();
        return view('request',compact('following'));
    }

    public function unfollow($id)
    {
        $this->followers->where('follower_id',Session::get('user'))->where('user_id',$id)->where('status',1)->delete();
        return back();
    }

    public function emailQueue()
    {
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
        dispatch( $emailJob);
        echo 'email sent!';
    }

  
}

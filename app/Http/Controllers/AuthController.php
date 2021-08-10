<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

use Sentinel;
use Reminder;
use Mail;


class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }
    
    public function postlogin(request $request)
    {
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('/admin');
    	}
    	return redirect('/login');
    }

   	public function logout()
   	{
   		Session::flush();
   		Auth::logout();
   		return redirect('/');
   	}

   	public function create(request $request)
   	{
   		if (request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ])) 
        {
   			User::create([
        	'name' => $request['name'],
          'role' => "user",
        	'email' => $request['email'],
        	'password' => Hash::make($request['password'])
        	]);
        	return redirect('/login');
   		}
   		return redirect('/register');
    }

    public function forgot(){
      return view('auth.forgot');
    }

    public function password(Request $request){
        $user = User::whereEmail($request->email)->first();
        if($user == null){
          return redirect()->back()->with(['error' => 'Email not exist']);
        }
        $user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with(['success' => 'Reset code sent your email.']);
    }

    public function sendEmail($user, $code){
      Mail::send(
        'email.forgot',
        ['user' => $user, 'code' => $code],
        function($message) use($user){
          $message->to($user->email);
          $message->subject("$user->name, reset your password.");
        }
      );
    }
}
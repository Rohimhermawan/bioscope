<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; 

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
  
       return view('forget');
    }
  
   public function postEmail(Request $request)
    {
      $request->validate([
          'email' => 'required|email|exists:users',
      ]);
  
      $token = str::random(60);
  
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
  
        Mail::send('verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
  
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function getPassword($token) { 

        return view('forgot', ['token' => $token]);
     }
   
     public function updatePassword(Request $request)
     {
   
     $request->validate([
         'email' => 'required|email|exists:users',
         'password' => 'required|min:8|confirmed',
         'password_confirmation' => 'required',
   
     ]);
   
     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();
   
     if(!$updatePassword) {
         return back()->withInput()->with('error', 'Invalid token!');
     } else {
         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);
     
         DB::table('password_resets')->where(['email'=> $request->email])->delete();
     
         return redirect('/login')->with('message', 'Your password has been changed!');
     }
   
   
     }
}

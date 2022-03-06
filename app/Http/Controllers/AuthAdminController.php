<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restrict;
use App\Models\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function admin()
    {
        $data = controller::find(1);
        if (auth::user()->is_admin??'4' == 3) {
            return redirect('home/pembayaran');
        } else {
        return view('login', compact('data'));
        }
    }
    
    public function login(request $request)
    {
        $credentials = $request->only('email', 'password');
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
         ]);
         if (Auth::attempt($credentials)) {
             $userLogin = restrict::where('User_id', auth::user()->id)->first();
             $jumlah = $userLogin->jumlah??null;
            
            // khusus admin 
            if (auth::user()->is_admin == 1) {
                return redirect('admin');
            } 
            // panitia(2)/peserta(3) boleh masuk
            if(auth::user()->is_admin == controller::find(3)->nilai ) {
                if ($jumlah == null) {
                    restrict::create([
                        'User_id' => auth::user()->id,
                        'jumlah' => 1
                    ]);
                    $request->session()->regenerate();
                    return redirect('home/pembayaran');
                }
                if ($jumlah >= 0 && $jumlah <=2 ) {
                    $jumlah += 1;
                    restrict::where('User_id', auth::user()->id)
                    ->update([
                        'jumlah' => $jumlah
                    ]);
                    $request->session()->regenerate();
                    return redirect('home/pembayaran');
                }
                if ($jumlah >= 3) {
                    abort(403);
                }    
            } else {
                Auth::logout();
                abort(403);
            }
             
         }else{  
            return redirect('login')->withErrors([
            'email' => 'The email/password do not match our records.',
        ]);
        }
    }

    public function logout()
    {
        if (auth::user()->is_admin !== 1) {
            $userLogin = restrict::where('User_id', auth::user()->id)->first()->jumlah;
            restrict::where('User_id', auth::user()->id)
                        ->update([
                            'jumlah' => $userLogin-1
                        ]);
        }
        // session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function registrasi()
    {
        $data = controller::find(2);
        return view('registrasi', compact('data'));
    }

    public function register(request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => controller::find(3)->nilai,
            'password' => Hash::make($request->password),
            'remember_token' => str::random(60)
        ]);

        return redirect('login')->with('success', 'User berhasil ditambahkan');
    }

    public function forgot_password(request $request) 
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        if ($request->password !== $request->re_password) {
            return back()->with('error', 'Password tidak sesuai');
        }  

            $user = user::where('email', $request->email)->first();
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password)
                    ])->setRememberToken(Str::random(60));
        
                    $user->save();
        
                    event(new PasswordReset($user));
                }
            );
         return $status == Password::PASSWORD_RESET
                ? redirect('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }
}

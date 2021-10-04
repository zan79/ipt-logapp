<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nexmo\Laravel\Facade\Nexmo;

class AuthController extends Controller
{
    public function registrationForm(){
        return view('registrationView');
    }

    public function loginForm(){
        return view('loginView');
    }

    public function register(Request $request){
        $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'phone' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required'
        ]);
        
        $token = Str::random(24);

        $user = User::create([
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token
        ]);

        // Nexmo::message()->send([
        //     'to' => '63'.$request->phone,
        //     'from' => 'Prelim App',
        //     'text' => 'Thanks for signing up to Prelim App. To complete your registration please check your email for verification.
        //                                                                                                                             .'
        // ]);

        // Mail::send('verification-email', ['user'=>$user], function($mail) use ($user) {
        //     $mail->to($user->email);
        //     $mail->subject('Account Verification');
        //     $mail->from('dummyqwerty34@gmail.com', 'Prelim App');
        // });

        return redirect('/login')->with('Message_Success', 'Account created, you can now proceed to log in.');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        $user = User::where('email', $request->email)->first();

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); 

        if(!$login){
            return back()->with('Error', 'Invalid Credentials');
        }

        // if(!$user || $user->email_verified_at==null){
        //     return redirect('/login')->with('Error', 'Account not verified. Please check your email to verify your account.');
        // }

        return redirect('/items');
    }

    public function verify(User $user, $token){
        if($user->remember_token!==$token){
            return redirect('/login')->with('Error', 'Invalid Token');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('Message_Success', 'Account verification complete. You can now login.');        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}

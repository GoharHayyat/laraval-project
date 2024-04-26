<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function registerPost(Request $request)
    {

        //  $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     // Use PHP's password_hash function
        //     'password' => password_hash($request->password, PASSWORD_DEFAULT),
        // ]);

       


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $hashedPassword = Hash::make($request->password);
        Log::info('Hashed Password signup: '.$hashedPassword);
        $user->password = $hashedPassword;
        $user->save();
        return back()->with('success', 'Registration successful!');
    }
    
    public function loginPost(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('/'));
        }


        // Log::info('Email for user retrieval: ' . $request->email);
        // $user = User::where('email', $request->email)->first();
        // Log::info('Hashed Password from DB: ' . $user->password);
        // Log::info('Plaintext Password from Form: ' . $request->password);
        
        // if ($user && Hash::check($request->password, $user->password)) {
        //     return redirect()->intended('/')->with('success', 'Logged in');
        // }
    
        return back()->with('error', 'Incorrect email or password');
    }
    



    
// public function loginPost(Request $request)
// {

//     $user = User::where('email', $request->email)->first();

//     if ($user && password_verify($request->password, $user->password)) {
//         // The passwords match...

//         // Manually log in the user
//         // Auth::login($user, $request->filled('remember'));

//         // Redirect to the intended page
//         return redirect()->intended('/')->with('success', 'Logged in');
//     }
//     // $email = $request->input('email');
//     // $password = $request->input('password');

//     // if (empty($email) || empty($password)) {
//     //     return back()->with('error', 'Please provide both email and password');
//     // }
//     // $hashedPassword = Hash::make($password);
    
//     // Log::info('Hashed Password: '.$hashedPassword);

//     // $credentials = [
//     //     'email' => $email,
//     //     'password' => $hashedPassword,
//     // ];
    
    

//     // if (Auth::check($credentials)) {
//     //     return redirect()->intended('/')->with('success', 'Logged in');
//     // }
//     return back()->with('error', 'Incorrect email or password');
// }



// public function loginPost(Request $request)
// {
//     $email = $request->input('email');
//     $password = $request->input('password');

//     if (empty($email) || empty($password)) {
//         return back()->with('error', 'Please provide both email and password');
//     }
//     $credentials = [
//         'email' => $email,
//         'password' => $password,
//     ];

//     if (Auth::attempt($credentials)) {
//         return redirect()->intended('/')->with('success', 'Logged in');
//     }
//     return back()->with('error', 'Incorrect email or password');
// }


}
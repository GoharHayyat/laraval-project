<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetails;
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
        try {
            Log::info('Received request data:', $request->all());
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:user_details',
                'password' => 'required|string|min:8',
            ]);
            $hashedPassword = Hash::make($validatedData['password']);
            $userDetails = new User();
            $userDetails->name = $validatedData['name'];
            $userDetails->email = $validatedData['email'];
            // $userDetails->password = $validatedData['password'];
            $userDetails->password = $hashedPassword;
            $userDetails->save();
            Log::info('succcesss');
            return redirect()->intended('/login')->with('error', 'Account registered please login');
            // return back()->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $userDetails = User::where('email', $request->email)->first();
        if ($userDetails && password_verify($request->password, $userDetails->password)) {
            Auth::login($userDetails);
            return redirect()->intended('/home')->with('success', 'Logged in successfully');
        }
        Log::error('Login failed for email: ' . $request->email);
        return back()->with('error', 'Incorrect email or password');
    }
        



    // public function registerPost(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $hashedPassword = Hash::make($request->password);
    //     Log::info('Hashed Password signup: '.$hashedPassword);
    //     $user->password = $hashedPassword;
    //     $user->save();
    //     return back()->with('success', 'Registration successful!');
    // }
    
    // public function loginPost(Request $request)
    // {

    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('email','password');
    //     if(Auth::attempt($credentials)){
    //         return redirect()->intended(route('/'));
    //     }


    //     // Log::info('Email for user retrieval: ' . $request->email);
    //     // $user = User::where('email', $request->email)->first();
    //     // Log::info('Hashed Password from DB: ' . $user->password);
    //     // Log::info('Plaintext Password from Form: ' . $request->password);
        
    //     // if ($user && Hash::check($request->password, $user->password)) {
    //     //     return redirect()->intended('/')->with('success', 'Logged in');
    //     // }
    
    //     return back()->with('error', 'Incorrect email or password');
    // }
    
 

    
     

// public function loginPost(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $userDetails = UserDetails::where('email', $request->email)->first();

//       $credentials = [
//         'email' => $request->email,
//         'password' => $request->password,
//     ];
    
    

//     if (Auth::check($credentials)) {
//         return redirect()->intended('/')->with('success', 'Logged in');
//     }

//     // if ($userDetails && $userDetails->password === $request->password) {
//     //     return back()->with('error', 'ok');
//     // }
//     Log::error('Login failed for email: ' . $request->email);
//     return back()->with('error', 'Incorrect email or password');
// }




    
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
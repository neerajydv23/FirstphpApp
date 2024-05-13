<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('profile-posts',['username'=> $user->username,'posts'=>$user->posts()->latest()->get()]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','You have successfully logged out.');
    }

    public function showCorrectHomepage()
    {
        if(auth()->check()){
            return view('homepage-feed');
        }
        else{
            return view('homepage');
        }
    }
    public function login (Request $request){
        $incomingFields = $request->validate([
            'loginusername'=>'required',
            'loginpassword'=>'required'
        ]);

        if(auth()->attempt(['username'=>$incomingFields['loginusername'],'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/')->with('success','You have successfully logged in.');
        }
        else{
            return redirect('/')->with('failure','Invalid login credentials.');
        }


    }
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:25',Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:255', 'confirmed']
        ]);
        $user=  User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success','You have successfully registered.');
    }
}

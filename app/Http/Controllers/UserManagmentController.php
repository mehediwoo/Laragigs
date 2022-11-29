<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagment;

class UserManagmentController extends Controller
{
    public function index(Request $req)
    {
        if ($req->session()->has('email')) {
            return redirect('/');
        }
        return view('register');
    }

    //Registration managment systeam
    public function registration(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:35',
            'email' => 'required|email|unique:user_managments,email,',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $registration = new UserManagment;

        $registration->name = $req->input('name');
        $registration->email = $req->input('email');
        $registration->pass = md5($req->input('password'));

        $registration->save();

        return redirect('/login')->with('msg','Registration Successfully');
    }
    //Login
    public function login(Request $req)
    {
        if ($req->session()->has('email')) {
            return redirect('/');
        }
        return view('login');
    }
    //Logout
    public function logOUt(Request $req)
    {
        $req->session()->flush();
        return redirect('/');
    }

    //User Authentication
    public function userAuth(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        $email = $req->input('email');
        $pass  = md5($req->input('password'));



        $getUser = UserManagment::where('email',$email)->where('pass',$pass)->first();

        if ($getUser==true) {
            $req->session()->put('email',$email);
            $req->session()->put('name',$getUser->name);
            $req->session()->put('user_id',$getUser->id);
            return redirect()->back();
        }else{
            return session()->flash('msg', 'Error authentication');
        }
    }
}

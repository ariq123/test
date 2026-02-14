<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;   
use App\Http\Controllers\Controller; 
use Session;

class AuthController extends Controller {
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request)
    {
        if($request->username == 'aldmic' && $request->password == '123abc123'){
    
            session(['login' => true]);

            if($request->remember){
                Cookie::queue('remember_login', true, 10080);
            }
    
            return redirect('/movies')->with('success',__('app.login_success'));
        }
    
        return back()->with('error','Invalid Credentials');
    }
    

    public function showLogin() {
        if(session('login')) {
            return redirect('/movies');
        }

        return view('');
    }

    public function logout()
    {
        session()->flush();
        Cookie::queue(Cookie::forget('remember_login'));
        Session::flash('notification', __('app.logout_success'));
        return redirect('/')
        ->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','Sat, 01 Jan 1990 00:00:00 GMT');
    }

}
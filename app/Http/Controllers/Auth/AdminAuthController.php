<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\Admin;
use Dotenv\Exception\ValidationException;

class AdminAuthController extends Controller
{
    //

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/login';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        // if(!Auth::guard('admin')->attempt($request->only('email','password'), $request->filled('remember')))
        // {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid login details'
        //     ]);
        // }
        // return redirect()->intended(route('admin.home'));

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            
            // \Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.home');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        // //auth()->guard('admin')->logout();
        // // \Session::flush();
        // // \Sessioin::put('success','You are logout successfully');        
        return redirect(route('admin.login'));
    }
}

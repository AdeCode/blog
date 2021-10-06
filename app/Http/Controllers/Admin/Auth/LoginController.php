<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if($this->attemptLogin($request)){
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
    //     {
    //         $user = auth()->guard('admin')->user();
            
    //         \Session::put('success','You are Login successfully!!');
    //         return redirect()->route('dashboard');
            
    //     } else {
    //         return back()->with('error','your username and password are wrong.');
    //     }
    // }

    
    // public function logout()
    // {
    //     auth()->guard('admin')->logout();
    //     \Session::flush();
    //     \Sessioin::put('success','You are logout successfully');        
    //     return redirect(route('adminLogin'));
    // }


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    public function guard()
    {
        return Auth::guard('admin');
    }

    

}

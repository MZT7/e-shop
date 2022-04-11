<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use app\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showAdminLogin()
    {
        $url = 'admin.logon';
        return view('auth.login', ['url' => $url, 'name' => 'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $cred = $request->only('email', 'password');

        if (auth('admin')->attempt($cred)) {
            # code...
            //dd(auth('admin')->user());
            return redirect()->route('admin.create');
        }
        # code...
        //return back()->intended('/admin');
        return redirect()->back()->with('fail', 'incorrect credentials');

        // auth()->check();
        //Auth::check();

        //Auth::guard('admin')->attempt($cred);
        //
    }

    public function adminLogout()
    {

        auth('admin')->logout();

        return redirect()->route('admin.login');

    }
}

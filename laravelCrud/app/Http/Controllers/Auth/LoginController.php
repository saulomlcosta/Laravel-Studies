<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/tasks';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request) {
        $tries = $request->session()->get('login_tries', 3);

        return view('login', compact([
            'tries',
        ]));
    }

    public function authenticate(Request $request) {
        $creds = $request->only(['email', 'password']);
        $tries = intval($request->session()->get('login_tries', 3));

        $request->session()->forget('login_tries');

        if(Auth::attempt($creds)) {
            $request->session()->put('login_tries', 3);

            return redirect('tasks');
        } else {
            $request->session()->put('login_tries', --$tries);

            return redirect('login')->with(
                'warning', 'E-mail or password not exists'
            );
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}

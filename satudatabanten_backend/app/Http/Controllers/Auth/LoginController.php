<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Role;

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
    protected $redirectTo = '/home/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'nik';
    }

    protected function authenticated(Request $request, $user)
    {
        $role = Role::join('role_user','role_user.role_id','=','roles.id')
            ->where('role_user.user_id', $user->id)
            ->first();
        $request->session()->put('userId', $user->id);
        $request->session()->put('userName', $user->name);
        $request->session()->put('userNIK', $user->nik);
        $request->session()->put('roleId', $role->role_id);
        $request->session()->put('roleName', $role->display_name);
        $request->session()->put('loggedIn', true);
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use Tracker;

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

    public function check(Request $request)
    {
        $user = DB::select("select * from users where email = '$request->email'");
        foreach ($user as $key){
          $name = $key->name;
          $pswd = $key->password;
          $email = $key->email;
          $email_verified = $key->email_verified;
          $level = $key->level;
        }

        if($user)
        {
          if(password_verify($request->password,$pswd)){
            Session::put('name',$name);
            Session::put('email', $email);
            Session::put('level', $level);
            Session::put('LoggIN', 1);

              if($email_verified == 1)
              {
                return redirect('/loginIN');
              }
              else
              {
                Session::put('status','Email Not Verified');
                return redirect('/');
              }
          }
          else
          {
            Session::put('status','Incorrect Email or Password');
            return redirect('/');
          }
        }
        else
        {
          Session::put('status','Email not Found');
          return redirect('/');
        }
    }

    public function logOUT()
    {
      Session::flush();
      return redirect('/');
    }

    public function LoginIN()
    {
      return view('auth.home');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
<<<<<<< HEAD
        $password = sha1($request->password);
        $user = DB::select("select * from users where email = '$request->email' AND password = '$password'");
        foreach ($user as $key){
          $name = $key->name;
          $email = $key->email;
          $email_verified = $key->email_verified;
          $level = $key->level;
        }
=======
        $user = DB::select("select * from users where email = '$request->email' AND password = '$request->password'");
          foreach ($user as $key){
            $name = $key->name;
            $email = $key->email;
            $email_verified = $key->email_verified;
            $password = $key->password;
            $level = $key->level;
          }
>>>>>>> 27847e0bc2a4ad933f226859acf7fbdfbdf00dbe
        $userdata = array (
            'name' => $name,
            'email' => $email,
            'email_verified' => $email_verified,
            'level' => $level
        );

        if($user)
          if($email_verified == 1){
              return view('home',$user);
          } else {
              return redirect('/')->with('status','Email Not Verified');
          }
        else
          return redirect('/')->with('status','Incorrect Username or Password');
    }
}

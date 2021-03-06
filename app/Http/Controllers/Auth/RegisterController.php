<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     public function register(Request $request)
     {
       $check = DB::select("SELECT * FROM users where email = '$request->email'");

       if($check){
         return view('auth/register')->with(session()->flash('alert-danger', 'Email has been used'));
       } else {
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->verification_code = sha1(time());
         $user->level = 0;
         $user->save();

         if($user != null){
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect('/home')->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification.'));
        }
         return redirect('/')->with(session()->flash('alert-danger', 'Something went wrong!'));
       }
     }

       public function verifyUser(Request $request)
       {
         $verification_code = \Illuminate\Support\Facades\Request::get('code');
         $user = User::where(['verification_code' => $verification_code])->first();
         if($user != NULL)
         {
           $user->email_verified = 1;
           $user->save();
           return redirect('/')->with(session()->flash('alert-success', 'Your account is verified please login.'));
         }
         return redirect('/')->with(session()->flash('alert-danger', 'Invalid Verification code!'));
       }

}

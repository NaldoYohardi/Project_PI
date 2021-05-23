<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function forget()
    {
        return view('/auth/email');
    }

    public function home()
    {
        return view('home');
    }

    public function table()
    {
        return view('table');
    }

    public function profile($name)
    {
        $user = DB::select("select * from users where email = '$name'");
        $user1 = \App\Models\User::all();
        return view('profile', compact('user','user1'));
    }

    public function edit($id)
    {
      $user = \App\Models\user::find($id);
      return view('edit', compact('user'));
    }

    public function update(Request $req, \App\Models\User $user)
    {
      if (Session::get('level')== 1)
      {
      \App\Models\User::where('user_id', $user->user_id)
                      ->update([
                        'name'=>$req->name,
                        'email'=>$req->email,
                        'level'=>$req->level
                      ]);
                      if (Session::get('email')==$req->email)
                      {
                      Session::put('name',$req->name);
                      Session::put('email',$req->email);
                      Session::put('level',$req->level);
                      }
      }
      else {
        \App\Models\User::where('user_id', $user->user_id)
                        ->update([
                          'name'=>$req->name,
                          'email'=>$req->email
                        ]);

        Session::put('name',$req->name);
        Session::put('email',$req->email);
      }
      return redirect('/profile/'.$req->email)->with('status','Data Changed');
    }

    public function delete($id)
    {
      \App\Models\User::where('user_id',$id)->delete();
      return redirect('/profile/'.Session::get('email'))->with('status','deleted');
    }
}

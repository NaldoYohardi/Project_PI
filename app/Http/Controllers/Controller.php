<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Session;
use Auth;

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
      $category = DB::select("SELECT * FROM category");
      $inbox = DB::select("SELECT * FROM import_data");
      return view('table', compact('inbox'), compact('category'));
    }

    public function inbox()
    {
      $category = DB::select("SELECT * FROM category");
      $inbox = DB::select("SELECT * FROM import_data");
      return view('inbox', compact('inbox'), compact('category'));
    }

    public function history()
    {
      // $category = DB::select("SELECT * FROM category");
      // $inbox = DB::select("SELECT * FROM import_data");
      // return view('inbox', compact('inbox'), compact('category'));
        return view('history');
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

    public function add()
    {
      return view('amount');
    }

    public function tambahData(Request $req)
    {
      for ($i=0; $i <$req->n ; $i++) {
        $a = "name".$i;
        $b = "stok".$i;
        $c = "category".$i;
        $d = "harga".$i;
        $name[$i] = $req->$a;
        $stok[$i] = $req->$b;
        $category[$i] = $req->$c;
        $harga[$i] = $req->$d;
        $status[$i] = "0";
        $status1[$i] = "3";
      }
      $JSON1 = json_encode($name);
      $JSON2 = json_encode($stok);
      $JSONS = json_encode($status);
      $JSONM = json_encode($status1);
      $JSON3 = json_encode($category);
      $JSON4 = json_encode($harga);
      if (Session::get('level')==0)
      {
        DB::insert("INSERT INTO import_data (user_id, name, stok, status, category_id, harga_unit) VALUES ($req->user_id,
        '$JSON1','$JSON2','$JSONS','$JSON3','$JSON4')");
      }
      elseif (Session::get('level') == 2)
      {
        DB::insert("INSERT INTO import_data (user_id, name, stok, status, category_id, harga_unit) VALUES ($req->user_id,
          '$JSON1','$JSON2','$JSONM','$JSON3','$JSON4')");
      }
      return redirect('/table');
    }
    public function accpt($id,$index){
      $status = DB::select("SELECT status FROM import_data where id = $id");
      foreach ($status as $key) {
      for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
        if($key->status[$i] == ',')
        {
          $j+=1;
        }
        if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
        {
          $status2[$j][$i] = $key->status[$i];
        }
      }
    }
    for ($i=0; $i <=$j ; $i++) {
      if($i != $index)
      {
        if(implode("",$status2[$i]) == "0")
          $status1[$i] = "0";
        elseif(implode("",$status2[$i]) == "2")
          $status1[$i] = "2";
        elseif(implode("",$status2[$i]) == "1")
          $status1[$i] = "1";
        elseif(implode("",$status2[$i]) == "3")
          $status1[$i] = "3";
      }
      else {
        $status1[$i] = "2";
      }
    }
    $JSON = json_encode($status1);
    DB::update("UPDATE import_data SET status = '$JSON' WHERE ID = $id");
    return redirect('/inbox');
    }

    public function decline($id,$index){
      $status = DB::select("SELECT status FROM import_data where id = $id");
      foreach ($status as $key) {
      for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
        if($key->status[$i] == ',')
        {
          $j+=1;
        }
        if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
        {
          $status2[$j][$i] = $key->status[$i];
        }
      }
    }
    for ($i=0; $i <=$j ; $i++) {
      if($i != $index)
      {
        if(implode("",$status2[$i]) == "0")
          $status1[$i] = "0";
        elseif(implode("",$status2[$i]) == "2")
          $status1[$i] = "2";
        elseif(implode("",$status2[$i]) == "1")
          $status1[$i] = "1";
        elseif(implode("",$status2[$i]) == "3")
          $status1[$i] = "3";
      }
      else {
        $status1[$i] = "1";
      }
    }
    $JSON = json_encode($status1);
    DB::update("UPDATE import_data SET status = '$JSON' WHERE ID = $id");
    return redirect('/inbox');
    }

    public function done($id,$index){
      $status = DB::select("SELECT status FROM import_data where id = $id");
      foreach ($status as $key) {
      for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
        if($key->status[$i] == ',')
        {
          $j+=1;
        }
        if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
        {
          $status2[$j][$i] = $key->status[$i];
        }
      }
    }
    for ($i=0; $i <=$j ; $i++) {
      if($i != $index)
      {
        if(implode("",$status2[$i]) == "0")
          $status1[$i] = "0";
        elseif(implode("",$status2[$i]) == "2")
          $status1[$i] = "2";
        elseif(implode("",$status2[$i]) == "1")
          $status1[$i] = "1";
        elseif(implode("",$status2[$i]) == "3")
          $status1[$i] = "3";
      }
      else {
        $status1[$i] = "3";
      }
    }
    $JSON = json_encode($status1);
    DB::update("UPDATE import_data SET status = '$JSON' WHERE ID = $id");
    return redirect('/inbox');
    }

    public function addstok($id,$i)
    {
      return view('addstok', compact('id'), compact('i'));
    }

}

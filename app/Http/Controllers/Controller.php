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
      //cek add stok
      $cek = DB::select("SELECT * FROM import_data");
      $status = DB::select("SELECT * FROM import_data where id = $id");
      foreach ($status as $key) {

        for ($i=0, $j=0; $i<strlen($key->name) ; $i++) {
          if($key->name[$i] == ',')
          {
            $j+=1;
          }
          if ($key->name[$i] >= 'a' && $key->name[$i] <= 'z' || $key->name[$i] >= 'A' && $key->name[$i] <= 'Z' || ord($key->name[$i]) >= 48 && ord($key->name[$i]) <= 57)
          {
            $names[$j][$i] = $key->name[$i];
          }
        }

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
      $b = 0;
      $c = 0;
      $d = 0;
      for ($i=0; $i <=$j; $i++) {
        //cek add stock
        foreach ($cek as $key) {
          $ids[$d] = $key->id;
          for ($a = 0; $a<strlen($key->name) ; $a++) {
            if($b == 0)
              $ida = $key->id;
            if ($ida != $key->id)
              $b+=1;
            if($key->name[$a] == ',')
              $b+=1;
            if ($key->name[$a] >= 'a' && $key->name[$a] <= 'z' || $key->name[$a] >= 'A' && $key->name[$a] <= 'Z' || ord($key->name[$a]) >= 48 && ord($key->name[$a]) <= 57)
              $nama[$b][$a] = $key->name[$a];
            $ida = $key->id;
          }

          for ($a=0; $a<strlen($key->status) ; $a++) {
            if($c == 0)
            {
              $idb = $key->id;
            }
            if ($idb != $key->id)
            {
              $c+=1;
            }
            if($key->status[$a] == ',')
            {
              $c+=1;
            }
            if (ord($key->status[$a]) >= 48 && ord($key->status[$a]) <= 57)
            {
              $status3[$c][$a] = $key->status[$a];
            }
            $idb = $key->id;
          }
          $d++;
        }
        for ($k=$i; $k <=$b ; $k++) {
          if(implode("",$names[$i]) == implode("",$nama[$k]) && implode("",$status3[$k]) == "3")
          {
            $index1 = $k;
            dd($index1);
          }
        }
        //cek status
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

    public function addstoks(Request $req)
    {
      $id = $req->id;
      $index = $req->i;
      $amount = $req->amount;
      $stok = DB::select("SELECT * from import_data where id = $id");
      foreach ($stok as $key) {
        $user_id = $key->user_id;
        for ($i=0, $j=0; $i<strlen($key->name) ; $i++) {
          if($key->name[$i] == ',')
          {
            $j+=1;
          }
          if ($key->name[$i] >= 'a' && $key->name[$i] <= 'z' || $key->name[$i] >= 'A' && $key->name[$i] <= 'Z' || ord($key->name[$i]) >= 48 && ord($key->name[$i]) <= 57)
          {
            $names[$j][$i] = $key->name[$i];
          }
        }

        for ($i=0, $j=0; $i<strlen($key->stok) ; $i++) {
          if($key->stok[$i] == ',')
          {
            $j+=1;
          }
          if (ord($key->stok[$i]) >= 48 && ord($key->stok[$i]) <= 57)
          {
            $stoks[$j][$i] = $key->stok[$i];
          }
        }

        for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
          if($key->status[$i] == ',')
          {
            $j+=1;
          }
          if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
          {
            $statuss[$j][$i] = $key->status[$i];
          }
        }

        for ($i=0, $j=0; $i<strlen($key->category_id) ; $i++) {
          if($key->category_id[$i] == ',')
          {
            $j+=1;
          }
          if (ord($key->category_id[$i]) >= 48 && ord($key->category_id[$i]) <= 57)
          {
            $categorys[$j][$i] = $key->category_id[$i];
          }
        }

        for ($i=0, $j=0; $i<strlen($key->harga_unit) ; $i++) {
          if($key->harga_unit[$i] == ',')
          {
            $j+=1;
          }
          if (ord($key->harga_unit[$i]) >= 48 && ord($key->harga_unit[$i]) <= 57)
          {
            $hargas[$j][$i] = $key->harga_unit[$i];
          }
        }
      }
      for ($i=0; $i <$j ; $i++) {
        $nama[$i] = implode("",$names[$i]);
        $kategory[$i] = implode("", $categorys[$i]);
        $stock[$i] = implode("", $stoks[$i]);
        $harga5[$i] = implode("", $hargas[$i]);
        $status3[$i] = implode("", $statuss[$i]);
        if($i == $index)
        {
          $name1 = implode("", $names[$i]);
          $stok1 = implode("", $stoks[$i]);
          $category1 = implode("", $categorys[$i]);
          $harga1 = implode("", $hargas[$i]);
          $JSON = json_encode($name1);
          $JSON1 = json_encode($category1);
          $JSON2 = json_encode($harga1);
        }
      }
      //level 0
      $stok1 = (int)$stok1;
      $total = $stok1 + $req->amount;
      $stok1 = (string)$total;
      $stok10 = (string)$req->amount;
      $status = "0";
      $status1 = "3";
      $JSON3 = json_encode($req->amount);
      $JSONS = json_encode($status);
      $JSONM = json_encode($status1);

      //levl 1
      for ($i=0; $i <$j ; $i++) {
        if($i == $index)
        {
          $stock[$i] = $stok1;
        }
      }
      $JSONA = json_encode($nama);
      $JSONB = json_encode($stock);
      $JSONC = json_encode($harga5);
      $JSOND = json_encode($status3);
      $JSONE = json_encode($kategory);
      if(Session::get('level')==0)
        DB::insert("INSERT INTO import_data (user_id, name, stok, status, category_id, harga_unit) VALUES ($user_id, '$JSON', '$JSON3', '$JSONS', '$JSON1', '$JSON2')");
      elseif(Session::get('level')==2)
        DB::insert("UPDATE import_data SET name = '$JSONA', stok = '$JSONB', status = '$JSOND', category_id = '$JSONE', harga_unit = '$JSONC' WHERE id = $id");
      return redirect('/table');
    }
}

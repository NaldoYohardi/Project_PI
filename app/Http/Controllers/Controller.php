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
        Session::flush();
        return view('/auth/email');
    }

    public function home()
    {
      $category = DB::select("SELECT * FROM category");
      $inv_view = DB::table('inventory')->WHERE('stok', '<', '5')->get();
      $inv_count = DB::table('inventory')->WHERE('stok', '<', '5')->count();
      $emp_count = DB::table('users')->WHERE('level', '0')->count();
      $adm_count = DB::table('users')->WHERE('level', '1')->count();
      $mngr_count = DB::table('users')->WHERE('level', '2')->count();
      $inbox = DB::table('import_data')->orderBy('id','desc')->get();
      $user = DB::select("select * from users");
      return view('home')
        ->with(compact('category'))
        ->with(compact('user'))
        ->with(compact('inbox'))
        ->with(compact('inv_view'))
        ->with(compact('inv_count'))
        ->with(compact('emp_count'))
        ->with(compact('adm_count'))
        ->with(compact('mngr_count'));
    }

    public function home2()
    {
      $category = DB::select("SELECT * FROM category");
      $inv_view = DB::table('inventory')->WHERE('stok', '<', '5')->get();
      $user = DB::select("select * from users");
      $user1 = \App\Models\User::all();
      return view('home')
        ->with(compact('category'))
        ->with(compact('user'))
        ->with(compact('user1'));
    }

    public function table()
    {
      $user = DB::select("SELECT * FROM users");
      $category = DB::select("SELECT * FROM category");
      $inbox = DB::select("SELECT * FROM inventory");
      return view('table')
      ->with(compact('inbox'))
      ->with(compact('category'))
      ->with(compact('user'));
    }

    public function inbox()
    {
      $user = DB::select("SELECT * FROM users");
      $category = DB::select("SELECT * FROM category");
      $inbox = DB::select("SELECT * FROM import_data");
      return view('inbox')->with(compact('inbox'))->with(compact('category'))->with(compact('user'));
    }

    public function history()
    {
      $user = DB::select("SELECT * FROM users");
      $category = DB::select("SELECT * FROM category");
      $inbox = DB::select("SELECT * FROM import_data");
      return view('history')->with(compact('inbox'))->with(compact('category'))->with(compact('user'));
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
        $approval_id[$i] ="0";
      }
      $JSON1 = json_encode($name);
      $JSON2 = json_encode($stok);
      $JSONS = json_encode($status);
      $JSONM = json_encode($status1);
      $JSON3 = json_encode($category);
      $JSON4 = json_encode($harga);
      $JSON5 = json_encode($approval_id);
      if (Session::get('level')==0)
      {
        DB::insert("INSERT INTO import_data (req_id, approval_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($req->user_id,'$JSON5','$JSON1','$JSON2','$JSONS','$JSON3','$JSON4', '0')");
      }
      elseif (Session::get('level') == 2)
      {
        DB::insert("INSERT INTO import_data (req_id, approval_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($req->user_id,'$JSON5','$JSON1','$JSON2','$JSONM','$JSON3','$JSON4', '0')");
        for ($i=0; $i <$req->n ; $i++) {
        DB::insert("INSERT INTO inventory (name, stok, category_id, harga_unit) VALUES (
          '$name[$i]','$stok[$i]','$category[$i]','$harga[$i]')");
        }
      }
      return redirect('/table');
    }
    public function accpt($id,$index){
      $approval_ida = Session::get('user_id');
      $status = DB::select("SELECT * FROM import_data where id = $id");
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
      for ($i=0, $j=0; $i<strlen($key->approval_id) ; $i++) {
        if($key->approval_id[$i] == ',')
        {
          $j+=1;
        }
        if (ord($key->approval_id[$i]) >= 48 && ord($key->approval_id[$i]) <= 57)
        {
          $approval_ids[$j][$i] = $key->approval_id[$i];
        }
      }
    }
    for ($i=0; $i <=$j ; $i++) {
      if($i != $index)
      {
        $approval_id1[$i] = implode("",$approval_ids[$i]);
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
        $approval_id1[$i] = (string)$approval_ida;
        $status1[$i] = "2";
      }
    }
    $JSON1 = json_encode($approval_id1);
    $JSON = json_encode($status1);
    DB::update("UPDATE import_data SET status = '$JSON', approval_id = '$JSON1' WHERE ID = $id");
    return redirect('/inbox');
    }

    public function decline($id,$index){
      $approval_ida = Session::get('user_id');
      $status = DB::select("SELECT * FROM import_data where id = $id");
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
      for ($i=0, $j=0; $i<strlen($key->approval_id) ; $i++) {
        if($key->approval_id[$i] == ',')
        {
          $j+=1;
        }
        if (ord($key->approval_id[$i]) >= 48 && ord($key->approval_id[$i]) <= 57)
        {
          $approval_ids[$j][$i] = $key->approval_id[$i];
        }
      }
    }
    for ($i=0; $i <=$j ; $i++) {
      if($i != $index)
      {
        $approval_id1[$i] = implode("",$approval_ids[$i]);
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
        $approval_id1[$i] = (string)$approval_ida;
        $status1[$i] = "1";
      }
    }
    $JSON = json_encode($status1);
    $JSON1 = json_encode($approval_id1);
    DB::update("UPDATE import_data SET status = '$JSON', approval_id = '$JSON1' WHERE ID = $id");
    return redirect('/inbox');
    }

    public function done($id,$index){
      //cek add stok
      $status = DB::select("SELECT * FROM import_data where id = $id");
      foreach ($status as $key) {
        $id123 = $key->id;
        $req_id = $key->req_id;
        $approval_id = $key->approval_id;
        $keterangan = $key->keterangan;
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
      // $b = 0;
      // $c = 0;
      // $d = 0;
      // if($d==0)
      //   $s[$d] = 1;
      for ($i=0; $i <=$j; $i++) {
      //   //cek add stock
      //   foreach ($cek as $key) {
      //     $ids[$d] = $key->id;
      //     for ($a = 0; $a<strlen($key->name) ; $a++) {
      //       if($b == 0)
      //         $ida = $key->id;
      //       if ($ida != $key->id)
      //       {
      //         $s[$d] = 1;
      //         $b+=1;
      //       }
      //       if($key->name[$a] == ',')
      //       {
      //         $s[$d] =$s[$d] + 1;
      //         $b+=1;
      //       }
      //       if ($key->name[$a] >= 'a' && $key->name[$a] <= 'z' || $key->name[$a] >= 'A' && $key->name[$a] <= 'Z' || ord($key->name[$a]) >= 48 && ord($key->name[$a]) <= 57)
      //         $nama[$b][$a] = $key->name[$a];
      //       $ida = $key->id;
      //     }
      //     for ($a=0; $a<strlen($key->status) ; $a++) {
      //       if($c == 0)
      //       {
      //         $idb = $key->id;
      //       }
      //       if ($idb != $key->id)
      //       {
      //         $c+=1;
      //       }
      //       if($key->status[$a] == ',')
      //       {
      //         $c+=1;
      //       }
      //       if (ord($key->status[$a]) >= 48 && ord($key->status[$a]) <= 57)
      //       {
      //         $status3[$c][$a] = $key->status[$a];
      //       }
      //       $idb = $key->id;
      //     }
      //     $d++;
      //   }
      //   for ($k=$i; $k <=$b ; $k++) {
      //     if(implode("",$names[$i]) == implode("",$nama[$k]) && implode("",$status3[$k]) == "3")
      //     {
      //       $index1 = $k;
      //       $e = 0;
      //       while($index1 > 0)
      //       {
      //         $index1 -= $s[$e];
      //         $e++;
      //       }
      //       if ($index1 != 0)
      //       {
      //         $index1 = $index1 + $s[$e-1];
      //       }
      //       dd($index1);
      //     }
      //   }
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
    if($keterangan == 0)
    {
      for ($i=0; $i <=$j ; $i++) {
        if($i == $index){
        $name1 = implode("",$names[$i]);
        $stok1 = implode("",$stoks[$i]);
        $category1 = implode("",$categorys[$i]);
        $harga1 = implode("",$hargas[$i]);
        DB::insert("INSERT INTO inventory (name, stok, category_id, harga_unit) VALUES ('$name1','$stok1','$category1','$harga1')");
        }
      }
    }
    elseif($keterangan == 1)
    {
      for ($i=0; $i <=$j ; $i++) {
        if($i == $index)
        {
          $stok1 = implode("",$stoks[$i]);
          $name1 = implode("",$names[$i]);
          $inventory = DB::select("SELECT stok FROM inventory WHERE name = '$name1'");
          foreach ($inventory as $key)
            $stok2 = $key->stok;
          $total = $stok1+$stok2;
          DB::update("UPDATE inventory SET stok = $total WHERE name = '$name1'");
        }
      }
    }
    elseif($keterangan == 2)
    {
      for ($i=0; $i <=$j ; $i++) {
        if($i == $index)
        {
          $stok1 = implode("",$stoks[$i]);
          $name1 = implode("",$names[$i]);
          $inventory = DB::select("SELECT stok FROM inventory WHERE name = '$name1'");
          foreach ($inventory as $key)
            $stok2 = $key->stok;
          $total = $stok2-$stok1;
          DB::update("UPDATE inventory SET stok = $total WHERE name = '$name1'");
        }
      }
    }
    return redirect('/inbox');
    }

    public function addstok($id)
    {
      return view('addstok', compact('id'));
    }

    public function addstoks(Request $req)
    {
      $request_id = Session::get('user_id');
      $id = $req->id;
      $amount = $req->amount;
      $stok = DB::select("SELECT * from inventory where id = $id");
      foreach ($stok as $key) {
        $name = $key->name;
        $stok = $key->stok;
        $category_id = $key->category_id;
        $harga = $key->harga_unit;
      }
      $status = "0";
      $status1 = "3";
      $JSON = json_encode($name);
      $total = $amount+$stok;
      $amount = (string)$amount;
      $JSON1 = json_encode($amount);
      $category_id = (string)$category_id;
      $JSON2 = json_encode($category_id);
      $harga = (string)$harga;
      $JSON3 = json_encode($harga);
      $JSONS = json_encode($status);
      $JSONM = json_encode($status1);
      if(Session::get('level')==0)
        DB::insert("INSERT INTO import_data (req_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($request_id, '$JSON', '$JSON1', '$JSONS', '$JSON2', '$JSON3','1')");
      elseif(Session::get('level')==2)
      {
        DB::insert("INSERT INTO import_data (req_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($request_id, '$JSON', '$JSON1', '$JSONM', '$JSON2', '$JSON3','1')");
        DB::insert("UPDATE inventory SET stok = '$total' WHERE id = $id");
      }
      return redirect('/table');
    }

    public function out($id)
    {
      $inventory = DB::select("SELECT * FROM inventory where id = $id");
      return view('outstok', compact('inventory'), compact('id'));
    }

    public function outstok(Request $req)
    {
      $request_id = Session::get('user_id');
      $id = $req->id;
      $amount = $req->amount;
      $stok = DB::select("SELECT * from inventory where id = $id");
      foreach ($stok as $key) {
        $name = $key->name;
        $stok = $key->stok;
        $category_id = $key->category_id;
        $harga = $key->harga_unit;
      }
      $status = "0";
      $status1 = "3";
      $JSON = json_encode($name);
      $total = $stok - $amount;
      $amount = (string)$amount;
      $JSON1 = json_encode($amount);
      $category_id = (string)$category_id;
      $JSON2 = json_encode($category_id);
      $harga = (string)$harga;
      $JSON3 = json_encode($harga);
      $JSONS = json_encode($status);
      $JSONM = json_encode($status1);
      if(Session::get('level')==0)
        DB::insert("INSERT INTO import_data (req_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($request_id, '$JSON', '$JSON1', '$JSONS', '$JSON2', '$JSON3','2')");
      elseif(Session::get('level')==2)
      {
        DB::insert("INSERT INTO import_data (req_id, name, stok, status, category_id, harga_unit, keterangan) VALUES ($request_id, '$JSON', '$JSON1', '$JSONM', '$JSON2', '$JSON3','2')");
        DB::insert("UPDATE inventory SET stok = '$total' WHERE id = $id");
      }
      return redirect('/table');
    }

    public function editI($id)
    {
      $inventory = DB::select("SELECT * FROM inventory where id = $id");
      $category = DB::select("SELECT * FROM category");
      return view('editInventory')->with(compact('inventory'))->with(compact('category'))->with(compact('id'));
    }

    public function updateI(Request $req)
    {
      $id = $req->id;
      $name = $req->name;
      $category = $req->category;
      $harga = $req->harga;
      DB::update("UPDATE inventory SET name = '$name', category_id = $category, harga_unit = $harga WHERE id = $id");
      return redirect('/table');
    }

    public function deleteI($id)
    {
      DB::delete("DELETE FROM inventory where id = $id");
      return redirect('/table');
    }
}

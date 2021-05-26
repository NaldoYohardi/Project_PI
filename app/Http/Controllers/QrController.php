<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QrController extends Controller
{

      public function generateQrCode()
      {
        $image = QrCode::format('png')->merge(public_path('laravel.PNG'), 0.3, true)
                       ->size(200)->errorCorrection('H')
                       ->generate('W3Adda Laravel Tutorial');
        return response($image)->header('Content-type','image/png');

      }
      public function get()
      {
          $inven = DB::select("select * from import_data where approval_id = '2'");
          foreach ($inven as $key) {
          $name = array($key->name);
          $amount = array($key->amount);
          $category = array($key->category_id);
          $brand = array($key->brand_id);
          $edisi = array($key->edisi);
          $harga = array($key->harga);
        }
          return view('test', compact('name','amount','category','brand','edisi','harga'));
      }
}

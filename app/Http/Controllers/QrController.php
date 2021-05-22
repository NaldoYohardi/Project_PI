<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
}

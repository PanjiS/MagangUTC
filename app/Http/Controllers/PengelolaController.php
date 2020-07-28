<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelola;

class PengelolaController extends Controller
{
    public function index()
  {
    $pengelola = Pengelola::all();
            return view('pengelola', ['pengelola' => $pengelola]);
  }
}

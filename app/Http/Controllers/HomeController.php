<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view ('home');
    }
    
    public function pengelola(){
        return view ('pengelola');
    }
     
    public function pengelolamatkul(){
        return view ('pengelolamatkul');
    }
    

    public function prodi(){
        return view ('prodi');
    }
}

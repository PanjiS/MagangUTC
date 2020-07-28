<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'rekap_dosen';
    protected $fillable = ['Lecture_Id','Lecture_Name'];  
    
}

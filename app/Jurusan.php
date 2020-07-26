<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'data_nilai';
    protected $fillable = ['Department_Id','TermYear_Id','Course_Id'];  
}

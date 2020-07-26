<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'data_nilai';
    protected $fillable = ['Department_Id','TermYear_Id','Course_Id','Class_Id','Student_Id','Grade','Weight'];  
    
}

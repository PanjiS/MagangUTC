<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelola;
use DB;

class PengelolaController extends Controller
{
    public function getdatarekap_dosen()
    {
      $pengelola = DB::table('data_dosen_kelas')
      ->leftJoin('hasil_rekap_dosen','hasil_rekap_dosen.datadosenkelas_Id','=','data_dosen_kelas.datadosenkelas_Id')
      ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','data_dosen_kelas.TermYear_Id')
      ->leftJoin('master_dosen','master_dosen.Lecture_Id','=','data_dosen_kelas.Lecture_Id')
      ->select('data_dosen_kelas.Department_Id', 'master_dosen.Lecture_Id', 'master_dosen.Lecture_Name', 'master_term_year.TermYear_Name', 'data_dosen_kelas.Course_Id', 'hasil_rekap_dosen.Status', 
        'hasil_rekap_dosen.Mean_IPK', 'hasil_rekap_dosen.nFailed', 'hasil_rekap_dosen.nBorderline', 'hasil_rekap_dosen.nStudents')
      ->distinct('data_dosen_kelas.Department_Id', 'master_dosen.Lecture_Id', 'master_dosen.Lecture_Name', 'master_term_year.TermYear_Name', 'data_dosen_kelas.Course_Id', 'hasil_rekap_dosen.Status', 
      'hasil_rekap_dosen.Mean_IPK', 'hasil_rekap_dosen.nFailed', 'hasil_rekap_dosen.nBorderline', 'hasil_rekap_dosen.nStudents')
      
      ->get();
      
      return view('/pengelola/pengeloladosen', ['pengelola' => $pengelola]);
    }

    public function getdatarekap_matkul()
    {
      $pengelola = DB::table('data_nilai')
      ->leftJoin('hasil_rekap_matkul','hasil_rekap_matkul.Course_Id','=','data_nilai.Course_Id')
      ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','data_nilai.TermYear_Id')
      ->select('data_nilai.Department_Id', 'data_nilai.Course_Id', 'master_term_year.TermYear_Name', 'hasil_rekap_matkul.Min', 'hasil_rekap_matkul.Max', 
        'hasil_rekap_matkul.Median', 'hasil_rekap_matkul.Mean', 'hasil_rekap_matkul.Standard_Deviation', 'hasil_rekap_matkul.Average_IPK')
      ->distinct('data_nilai.Department_Id', 'data_nilai.Course_Id', 'master_term_year.TermYear_Name', 'hasil_rekap_matkul.Min', 'hasil_rekap_matkul.Max', 
      'hasil_rekap_matkul.Median', 'hasil_rekap_matkul.Mean', 'hasil_rekap_matkul.Standard_Deviation', 'hasil_rekap_matkul.Average_IPK')
      
      ->get();
      
      return view('/pengelola/pengelolamatkul', ['pengelola' => $pengelola]);

      

    }
}

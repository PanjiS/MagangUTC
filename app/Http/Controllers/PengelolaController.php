<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    public function index()
  {
    $dataPengelola = Pengelola::select(DB::raw("kurId, prodiNama,jurNama, kurTahun, kurNoSkRektor, kurNama"))
        ->join('program_studi', 'program_studi.prodiKode', '=', 'kurikulum.kurProdiKode')
        ->join('jurusan','prodiKodeJurusan','=','jurusan.jurKode')
        ->orderBy(DB::raw("kurId, kurProdiKode"))        
        ->get();
        
    $data = array('kurikulum' => $dataKurikulum);   
    return view('admin.dashboard.kurikulum.kurikulum',$data);
  }
}

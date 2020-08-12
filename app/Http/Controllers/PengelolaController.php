<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelola;
use DB;

class PengelolaController extends Controller
{
    public function getdatarekap_dosen(Request $request)
    {
      $sort=10;
      if($request->nampil != null )
      {
          $sort= $request->nampil;
      }
      $termyears=DB::table('master_term_year')->get();
      $departments=DB::table('master_prodi')->get();

      $pengelola = DB::table('data_dosen_kelas')
        ->leftJoin('hasil_rekap_dosen','hasil_rekap_dosen.datadosenkelas_Id','=','data_dosen_kelas.datadosenkelas_Id')
        ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','data_dosen_kelas.TermYear_Id')
        ->leftJoin('master_dosen','master_dosen.Lecture_Id','=','data_dosen_kelas.Lecture_Id')
        ->select('data_dosen_kelas.Department_Id', 'master_dosen.Lecture_Id', 'master_dosen.Lecture_Name', 'master_term_year.TermYear_Name', 'data_dosen_kelas.Course_Id', 'hasil_rekap_dosen.Status', 
        'data_dosen_kelas.datadosenkelas_Id','data_dosen_kelas.Class_Id','master_term_year.TermYear_Id')
        ->groupBy('data_dosen_kelas.Department_Id', 'master_dosen.Lecture_Id', 'master_dosen.Lecture_Name', 'master_term_year.TermYear_Name', 'data_dosen_kelas.Course_Id', 'hasil_rekap_dosen.Status', 'data_dosen_kelas.datadosenkelas_Id','data_dosen_kelas.Class_Id','master_term_year.TermYear_Id');

      if($request->thnsm != null)
      {
        $pengelola = $pengelola->where('data_dosen_kelas.TermYear_Id','=',$request->thnsm);
      }
      if($request->dpt != null)
      {
        $pengelola = $pengelola->where('data_dosen_kelas.Department_Id','=',$request->dpt);
      }
      $pengelola = $pengelola->simplePaginate($sort);
      // dd($pengelola);
      $i=0;
      $data=[];
      foreach($pengelola as $pn)
      {
        $data[$i]=[];
        $data[$i]['Department_Id']=$pn->Department_Id;
        $data[$i]['Lecture_Id']=$pn->Lecture_Id;
        $data[$i]['Lecture_Name']=$pn->Lecture_Name;
        $data[$i]['TermYear_Name']=$pn->TermYear_Name;
        $data[$i]['Course_Id']=$pn->Course_Id;
        $mean = DB::table('data_nilai')->where([['Class_Id',$pn->Class_Id],['TermYear_Id',$pn->TermYear_Id],['Department_Id',$pn->Department_Id],['Course_Id',$pn->Course_Id]])->select(DB::raw('AVG(CAST(Weight AS float))AS AVG_Weight'))->first();
        if($mean != null){
          $data[$i]['Mean_IPK']=number_format($mean->AVG_Weight, 2, ',', '.');
        }else{
          $data[$i]['Mean_IPK'] = 0;
        }
        $data[$i]['nFailed']=count(DB::table('data_nilai')->where([['Class_Id',$pn->Class_Id],['TermYear_Id',$pn->TermYear_Id],['Department_Id',$pn->Department_Id],['Course_Id',$pn->Course_Id]])->where('Weight','<',2.00)->get());
        $data[$i]['nBorderline']=count(DB::table('data_nilai')->where([['Class_Id',$pn->Class_Id],['TermYear_Id',$pn->TermYear_Id],['Department_Id',$pn->Department_Id],['Course_Id',$pn->Course_Id]])->where('Weight','>=',2.00)->get());
        $data[$i]['nStudents']=count(DB::table('data_nilai')->where([['Class_Id',$pn->Class_Id],['TermYear_Id',$pn->TermYear_Id],['Department_Id',$pn->Department_Id],['Course_Id',$pn->Course_Id]])->get());
        $data[$i]['Status']="orange";
        if($data[$i]['nFailed'] > $data[$i]['nBorderline']){
          $data[$i]['Status']="red";
        }else if($data[$i]['nFailed'] < $data[$i]['nBorderline']){
          $data[$i]['Status']="green";
        }
        $i++;
  
  
      }
      
      return view('/pengelola/pengeloladosen', ['pengelola' => $pengelola, 'data' => $data])
        ->with('sort',$sort)
        ->with('thnsm',$request->thnsm)
        ->with('dpt',$request->dpt)
        ->with('departments',$departments)
        ->with('termyears',$termyears);
    }

    public function getdatarekap_matkul(Request $request)
    {
      $sort=10;
      if($request->nampil != null )
      {
          $sort= $request->nampil;
      }
      $termyears=DB::table('master_term_year')->get();
      $departments=DB::table('master_prodi')->get();

      $pengelola = DB::table('data_nilai')
        ->leftJoin('hasil_rekap_matkul','hasil_rekap_matkul.Course_Id','=','data_nilai.Course_Id')
        ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','data_nilai.TermYear_Id')
        ->select(DB::raw('data_nilai.Department_Id, data_nilai.Course_Id, data_nilai.TermYear_Id, master_term_year.TermYear_Name, MIN(Weight) AS MIN_Weight, MAX(Weight) AS MAX_Weight, AVG(CAST(Weight AS float)) AS AVG_Weight, STDEV(CAST(Weight AS float)) AS STDEV_Weight'))
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Course_Id', 'data_nilai.TermYear_Id', 'master_term_year.TermYear_Name');
      if($request->thnsm != null)
      {
        
        $pengelola = $pengelola->where('data_nilai.TermYear_Id','=',$request->thnsm);
        
      }
      if($request->dpt != null)
      {
        $pengelola = $pengelola->where('data_nilai.Department_Id','=',$request->dpt);
      }
      $pengelola = $pengelola->simplePaginate($sort);

    $i=0;
    $data=[];
    foreach($pengelola as $pn)
    {
      $data[$i]=[];
      $data[$i]['Department_Id']=$pn->Department_Id;
      $data[$i]['Course_Id']=$pn->Course_Id;
      $data[$i]['TermYear_Name']=$pn->TermYear_Name;
      $data[$i]['Min']=$pn->MIN_Weight;
      $data[$i]['Max']=$pn->MAX_Weight;
      $data[$i]['Mean_IPK'] = number_format($pn->AVG_Weight, 2, ',', '.');
      $md = DB::table('data_nilai')
          ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
          ->select('Weight')
          ->orderBy('Weight','ASC')
          ->where([['data_nilai.Department_Id', '=', $pn->Department_Id],['master_term_year.TermYear_Id',$pn->TermYear_Id],['data_nilai.Course_Id',$pn->Course_Id]])
          ->get();
      $mdl=count($md);
      $median=0;
      if($mdl %2==0){
          $median=($md[($mdl/2)-1]->Weight + $md[$mdl/2]->Weight)/2;
      }
      else{
          $median=$md[Floor($mdl/2)]->Weight;
      }
      $data[$i]['Median'] = number_format($median, 2, ',', '.');
      $data[$i]['Stdev'] = number_format($pn->STDEV_Weight, 2, ',', '.');
      $i++;


    }


      return view('/pengelola/pengelolamatkul', ['pengelola' => $pengelola, 'data' => $data])
        ->with('sort',$sort)
        ->with('thnsm',$request->thnsm)
        ->with('termyears',$termyears)
        ->with('dpt',$request->dpt)
        ->with('departments',$departments);
  }
}

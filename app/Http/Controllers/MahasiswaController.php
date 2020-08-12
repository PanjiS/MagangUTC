<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Mahasiswa;
use DataTables;
use DB;



class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function sd_square($x, $mean) { return pow($x - $mean,2); }
    // function sd($array) {
    //     // square root of sum of squares devided by N-1
    //     return sqrt(array_sum(array_map("sd_square", $array, array_fill(0,count($array), (array_sum($array) / count($array)) ) ) ) / (count($array)-1) );
    // }
    // function sd($aValues)
    // {
    //     $fMean = array_sum($aValues) / count($aValues);
    //     //print_r($fMean);
    //     $fVariance = 0.0;
    //     foreach ($aValues as $i)
    //     {
    //         $fVariance += pow($i - $fMean, 2);

    //     }       
    //     $size = count($aValues) - 1;
    //     return (float) sqrt($fVariance)/sqrt($size);
    // }

//     function sd(array $array): float
// {
//     $size = count($array);
//     $mean = array_sum($array) / $size;
//     $squares = array_map(function ($x) use ($mean) {
//         return pow($x - $mean, 2);
//     }, $array);

//     if(array_sum($squares)==0 || ($size-1)==0)
//     {
//         return 0;
//     }
//     else{
//         return sqrt(array_sum($squares) / ($size - 1));

//     }
// }
    // function sd(array $a, $sample = false){
    //     $n = count($a);
    //     if ($n === 0) {
    //         trigger_error("The array has zero elements", E_USER_WARNING);
    //         return false;
    //     }
    //     if ($sample && $n === 1) {
    //         trigger_error("The array has only 1 element", E_USER_WARNING);
    //         return false;
    //     }
    //     $mean = array_sum($a) / $n;
    //     $carry = 0.0;
    //     foreach ($a as $val) {
    //         $d = ((double) $val) - $mean;
    //         $carry += $d * $d;
    //     };
    //     if ($sample) {
    //     --$n;
    //     }
    //     return sqrt($carry / $n);
    // }

    public function getdata(Request $request)
    {
        $head=[];
        $data = [];


        $sort=10;
        if($request->nampil != null )
        {
            $sort= $request->nampil;
        }
        $termyears=DB::table('master_term_year')->get();

        
        if($request->thnsm != null)
        {
            $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_nilai.datanilai_Id','=','data_hasil_nilai.datanilai_Id')
        ->leftJoin('master_term_year','data_nilai.TermYear_Id','=','master_term_year.TermYear_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->where([['data_nilai.Department_Id', '=', 11],['data_nilai.TermYear_Id','=',$request->thnsm]])
        ->simplePaginate($sort);
        }
        else{
            $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->where('data_nilai.Department_Id', '=', 11)
        ->simplePaginate($sort);
        }

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Name;
            $head[0]='ID Prodi';
            $head[1]='NIM';
            $head[2]='Tahun Ajaran';

            $nilai = DB::table('data_nilai')
            ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
            ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
            ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
            ->where([['data_nilai.Department_Id', '=', 11],['data_nilai.Student_Id','=',$mhs->Student_Id],['master_term_year.TermYear_Name',$mhs->TermYear_Name]])
            ->get();

            $ii=3;
            $iii=3;
            foreach($nilai as $nl){
                $data[$i][$ii]=$nl->Weight;
                $data[$i][$ii+1]=$nl->Grade;
                $data[$i][$ii+2]=$nl->Status;
                $head[$iii][0]=$nl->Course_Id;
                $head[$iii][1]='Score';
                $head[$iii][2]='Grade';
                $head[$iii][3]='Status';

                $ii = $ii+3;
                $iii++;
            }
            $i++;
        }

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Name;

            for($ii=3;$ii<count($head);$ii=$ii+3){
                $nl = DB::table('data_nilai')
                ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
                ->where([['data_nilai.Department_Id', '=', 11],['data_nilai.Student_Id','=',$mhs->Student_Id],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->first();
                if($nl != null){
                    $data[$i][$ii]=$nl->Weight;
                    $data[$i][$ii+1]=$nl->Grade;
 
                        if($nl->Weight>=3){
                            $data[$i][$ii+2]='Pass';

                        }
                        else if($nl->Weight>=2){
                            $data[$i][$ii+2]='Borderline';
                        }
                        else{
                            $data[$i][$ii+2]='Failed';
                        }

                }else{
                    $data[$i][$ii]='';
                    $data[$i][$ii+1]='';
                    $data[$i][$ii+2]='';
                }

            }
            $i++;
        }
        $foot=[];
        for($ii=3;$ii<count($head);$ii=$ii+1){
            $nl = DB::table('data_nilai')
                
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select(DB::raw('MIN(data_nilai.Weight) AS MIN_Weight, MAX(data_nilai.Weight)AS MAX_Weight, AVG(CAST(data_nilai.Weight AS float))AS AVG_Weight, STDEV(CAST(data_nilai.Weight AS float)) AS STDEV_Weight'))
                ->where([['data_nilai.Department_Id', '=', 11],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->first();
            $foot['min'][$ii] = $nl->MIN_Weight;
            $foot['max'][$ii] = $nl->MAX_Weight;
            $foot['avg'][$ii] = number_format($nl->AVG_Weight, 2, ',', '.');
            $foot['stdev'][$ii] = number_format($nl->STDEV_Weight, 2, ',', '.');

            $md = DB::table('data_nilai')
                
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select('Weight')
                ->orderBy('Weight','ASC')
                ->where([['data_nilai.Department_Id', '=', 11],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->get();
            $mdl=count($md);
            $median=0;
            if($mdl %2==0){
                $median=($md[($mdl/2)-1]->Weight + $md[$mdl/2]->Weight)/2;
            }
            else{
                $median=$md[Floor($mdl/2)]->Weight;
            }
            $q1=0;
            if($mdl %2==0){
                if(((($mdl+2)/4)-1)%1!=0){
                    $q1=($md[(Floor(($mdl+2)/4) - 1)]->Weight + $md[(Floor(($mdl+2)/4))]->Weight)/2;
                }
                
            }
            else{
                $q1=$md[Floor($mdl/4)]->Weight;
            }
            $q3=0;
            if($mdl %2==0){
                if(((($mdl+2)*3/4)-1)%1!=0){
                    $q3=($md[(Floor(($mdl+2)*3/4) - 1)]->Weight + $md[(Floor(($mdl+2)*3/4))]->Weight)/2;
                }
                
            }
            else{
                $q3=$md[Floor($mdl*3/4)]->Weight;
            }
            $foot['median'][$ii]=$median;
            $foot['q1'][$ii]=$q1;
            $foot['q3'][$ii]=$q3;

        } 



        return view('prodi/sipilprodi', ['mahasiswas' => $mahasiswa,'data'=>$data,'head'=>$head])
        ->with('sort',$sort)
        ->with('thnsm',$request->thnsm)
        ->with('termyears',$termyears)
        ->with('foot',$foot);
    }

   
    public function getdatapbi(Request $request)
    {
        $head=[];
        $data = [];


        $sort=10;
        if($request->nampil != null )
        {
            $sort= $request->nampil;
        }
        $termyears=DB::table('master_term_year')->get();

        
        if($request->thnsm != null)
        {
            $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_nilai.datanilai_Id','=','data_hasil_nilai.datanilai_Id')
        ->leftJoin('master_term_year','data_nilai.TermYear_Id','=','master_term_year.TermYear_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->where([['data_nilai.Department_Id', '=', 81],['data_nilai.TermYear_Id','=',$request->thnsm]])

        ->simplePaginate($sort);
        }
        else{
            $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'master_term_year.TermYear_Name')
        ->where('data_nilai.Department_Id', '=', 81)
        ->simplePaginate($sort);
        }

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Name;
            $head[0]='ID Prodi';
            $head[1]='NIM';
            $head[2]='Tahun Ajaran';

            $nilai = DB::table('data_nilai')
            ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
            ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
            ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
            ->where([['data_nilai.Department_Id', '=', 81],['data_nilai.Student_Id','=',$mhs->Student_Id],['master_term_year.TermYear_Name',$mhs->TermYear_Name]])
            ->get();

            $ii=3;
            $iii=3;
            foreach($nilai as $nl){
                $data[$i][$ii]=$nl->Weight;
                $data[$i][$ii+1]=$nl->Grade;
                $data[$i][$ii+2]=$nl->Status;
                $head[$iii][0]=$nl->Course_Id;
                $head[$iii][1]='Score';
                $head[$iii][2]='Grade';
                $head[$iii][3]='Status';

                $ii = $ii+3;
                $iii++;
            }
            $i++;
        }

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Name;

            for($ii=3;$ii<count($head);$ii=$ii+3){
                $nl = DB::table('data_nilai')
                ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
                ->where([['data_nilai.Department_Id', '=', 81],['data_nilai.Student_Id','=',$mhs->Student_Id],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->first();
                if($nl != null){
                    $data[$i][$ii]=$nl->Weight;
                    $data[$i][$ii+1]=$nl->Grade;
 
                        if($nl->Weight>=3){
                            $data[$i][$ii+2]='Pass';

                        }
                        else if($nl->Weight>=2){
                            $data[$i][$ii+2]='Borderline';
                        }
                        else{
                            $data[$i][$ii+2]='Failed';
                        }

                }else{
                    $data[$i][$ii]='';
                    $data[$i][$ii+1]='';
                    $data[$i][$ii+2]='';
                }
            }
            $i++;
        }
        $foot=[];
        for($ii=3;$ii<count($head);$ii=$ii+1){
            $nl = DB::table('data_nilai')
                
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select(DB::raw('MIN(data_nilai.Weight) AS MIN_Weight, MAX(data_nilai.Weight)AS MAX_Weight, AVG(CAST(data_nilai.Weight AS float))AS AVG_Weight, STDEV(CAST(data_nilai.Weight AS float)) AS STDEV_Weight'))
                ->where([['data_nilai.Department_Id', '=', 81],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->first();
            $foot['min'][$ii] = $nl->MIN_Weight;
            $foot['max'][$ii] = $nl->MAX_Weight;
            $foot['avg'][$ii] = number_format($nl->AVG_Weight, 2, ',', '.');
            $foot['stdev'][$ii] = number_format($nl->STDEV_Weight, 2, ',', '.');

            $md = DB::table('data_nilai')
                
                ->leftJoin('master_term_year','master_term_year.TermYear_Id','=','master_term_year.TermYear_Id')
                ->select('Weight')
                ->orderBy('Weight','ASC')
                ->where([['data_nilai.Department_Id', '=', 81],['master_term_year.TermYear_Name',$mhs->TermYear_Name],['data_nilai.Course_Id',$head[$ii][0]]])
                ->get();
            $mdl=count($md);
            $median=0;
            if($mdl %2==0){
                $median=($md[($mdl/2)-1]->Weight + $md[$mdl/2]->Weight)/2;
            }
            else{
                $median=$md[Floor($mdl/2)]->Weight;
            }
            $q1=0;
            if($mdl %2==0){
                if(((($mdl+2)/4)-1)%1!=0){
                    $q1=($md[(Floor(($mdl+2)/4) - 1)]->Weight + $md[(Floor(($mdl+2)/4))]->Weight)/2;
                }
                
            }
            else{
                $q1=$md[Floor($mdl/4)]->Weight;
            }
            $q3=0;
            if($mdl %2==0){
                if(((($mdl+2)*3/4)-1)%1!=0){
                    $q3=($md[(Floor(($mdl+2)*3/4) - 1)]->Weight + $md[(Floor(($mdl+2)*3/4))]->Weight)/2;
                }
                
            }
            else{
                $q3=$md[Floor($mdl*3/4)]->Weight;
            }
            $foot['median'][$ii]=$median;
            $foot['q1'][$ii]=$q1;
            $foot['q3'][$ii]=$q3;

        } 


        return view('prodi/pbiprodi', ['mahasiswas' => $mahasiswa,'data'=>$data,'head'=>$head])
        ->with('sort',$sort)
        ->with('thnsm',$request->thnsm)
        ->with('termyears',$termyears)
        ->with('foot',$foot);;
    }
    public function ipk()
    {
        $mahasiswa = Mahasiswa::all();
        return view('prodi/ipksipilprodi', ['mahasiswas' => $mahasiswa]);
    }
    public function ipkpbi()
    {
        $mahasiswa = Mahasiswa::all();
        return view('prodi/ipkpbiprodi', ['mahasiswas' => $mahasiswa]);
    }
   
<<<<<<< HEAD
   
=======
  

>>>>>>> 70a7162fcfe0ee0803d386b765acd0ab157426ee


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

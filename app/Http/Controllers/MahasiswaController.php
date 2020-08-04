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
    public function getdata()
    {
        $head=[];
        $data = [];

        $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id')
        ->where('data_nilai.Department_Id', '=', 11)
        ->simplePaginate(10);

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Id;
            $head[0]='Department Id';
            $head[1]='Student Id';
            $head[2]='TermYear_Id';

            $nilai = DB::table('data_nilai')
            ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
            ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
            ->where([['data_nilai.Department_Id', '=', 11],['data_nilai.Student_Id','=',$mhs->Student_Id],['data_nilai.TermYear_Id',$mhs->TermYear_Id]])
            ->get();

            $ii=3;
            $iii=3;
            foreach($nilai as $nl){
                $data[$i][$ii]=$nl->Weight;
                $data[$i][$ii+1]=$nl->Grade;
                $data[$i][$ii+2]=$nl->Status;
                $head[$iii][0]=$nl->Course_Id;
                $head[$iii][1]='Weight';
                $head[$iii][2]='Grade';
                $head[$iii][3]='Status';

                $ii = $ii+3;
                $iii++;
            }
            $i++;
        }
        // dd($data);
        // $mahasiswa = Mahasiswa::all();
        return view('prodi/sipilprodi', ['mahasiswas' => $mahasiswa,'data'=>$data,'head'=>$head])
        ->with('listsipil;', $mahasiswa)    
        ->with('Smtsipil_terpilih','');
    }

   
    public function getdatapbi()
    {
        $head=[];
        $data = [];
        $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id')
        ->groupBy('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id')
        ->where('data_nilai.Department_Id', '=', 81)
        ->simplePaginate(10);

        $i = 0;
        foreach($mahasiswa as $mhs){
            $data[$i][0]=$mhs->Department_Id;
            $data[$i][1]=$mhs->Student_Id;
            $data[$i][2]=$mhs->TermYear_Id;
            $head[0]='Department Id';
            $head[1]='Student Id';
            $head[2]='TermYear_Id';

            $nilai = DB::table('data_nilai')
            ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
            ->select('data_nilai.Course_Id','data_nilai.Weight', 'data_nilai.Grade', 'data_hasil_nilai.Status')
            ->where([['data_nilai.Department_Id', '=', 81],['data_nilai.Student_Id','=',$mhs->Student_Id],['data_nilai.TermYear_Id',$mhs->TermYear_Id]])
            ->get();

            $ii=3;
            $iii=3;
            foreach($nilai as $nl){
                $data[$i][$ii]=$nl->Weight;
                $data[$i][$ii+1]=$nl->Grade;
                $data[$i][$ii+2]=$nl->Status;
                $head[$iii][0]=$nl->Course_Id;
                $head[$iii][1]='Weight';
                $head[$iii][2]='Grade';
                $head[$iii][3]='Status';

                $ii = $ii+3;
                $iii++;
            }
            $i++;
        }
        
        // $mahasiswa = Mahasiswa::all();
        return view('prodi/pbiprodi', ['mahasiswas' => $mahasiswa,'data'=>$data,'head'=>$head]);
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

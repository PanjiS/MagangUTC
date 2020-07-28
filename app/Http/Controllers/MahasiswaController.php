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
        $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id', 'data_nilai.Course_Id', 'data_nilai.Grade',
            'data_hasil_nilai.Status')
        ->where('data_nilai.Department_Id', '=', 11)
        ->simplePaginate(10);
            
        // $mahasiswa = Mahasiswa::all();
        return view('prodi/sipilprodi', ['mahasiswas' => $mahasiswa]);
    }

    public function getdatapbi()
    {
        $mahasiswa = DB::table('data_nilai')
        ->leftJoin('data_hasil_nilai','data_hasil_nilai.datanilai_Id','=','data_hasil_nilai.hasilnilai_Id')
        ->select('data_nilai.Department_Id', 'data_nilai.Student_Id', 'data_nilai.TermYear_Id', 'data_nilai.Course_Id', 'data_nilai.Grade',
            'data_hasil_nilai.Status')
        ->where('data_nilai.Department_Id', '=', 81)
        ->simplePaginate(10);
        // $mahasiswa = Mahasiswa::all();
        return view('prodi/pbiprodi', ['mahasiswas' => $mahasiswa]);
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

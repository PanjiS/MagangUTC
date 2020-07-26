<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
<<<<<<< HEAD
use DataTables;
=======
use DB;

>>>>>>> e67e2d1ebf552c40323402c85d6da1b9712226eb
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
            ->select('Department_Id','TermYear_Id','Course_Id','Class_Id','Student_Id','Grade','Weight')
            ->where('Department_Id', '=', 11)
            ->get();
        // $mahasiswa = Mahasiswa::all();
        return view('prodi', ['mahasiswas' => $mahasiswa]);
    }
    public function ipk()
    {
        $mahasiswa = Mahasiswa::all();
        return view('ipkprodi', ['mahasiswas' => $mahasiswa]);
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

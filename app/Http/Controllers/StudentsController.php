<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::with('role')->latest()->paginate(100);
        //$students = Student::all();
        $tittle = "Daftar Data Player Squad PUBG MOBILE";
        return view('admin.student',compact('tittle','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $tittle = "Input Data Player";
        return view('admin.input',compact('tittle','role'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validasi = $request->validate([
            'nama'=> 'required',
            'role_id'=> 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'telp' => 'required'

        ],);

        Student::create($validasi);
        return redirect('student')->with('succes','Data Player Berhasil Disimpan');
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
        $role = Role::all();
        $students=Student::with('role')->find($id);
        $tittle = "Edit Data Player";
        return view('admin.input',compact('tittle','students','role'));

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
       // return $request;
        $validasi = $request->validate([
            'nama'=> 'required',
            'role_id'=> 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'telp' => 'required'

        ],);

        Student::where('id',$id)->update($validasi);
        return redirect('student')->with('succes','Data Player Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();
        return redirect('student')->with('succes','Data Player Berhasil Di Hapus');
    }

    public function cari(Request $request){

        $cari = $request->search;

        $students = Student::where('nama','like','%'.$cari.'%')->get();
        return view('admin.student', ['students' => $students]);
    }
}

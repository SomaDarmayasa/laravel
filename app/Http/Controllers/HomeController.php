<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $tittle ="Data Mahasiswa";
        $data['mahasiswa']= array(
            'nim'=>'1915101017',
            'nama'=>'Soma Darmayasa'
        );
        $data['user']='';
        return view('admin.beranda', compact('tittle','data'));
    }
    public function dashboard(){

        $tittle ="Data Dashboard";
        $data['mahasiswa']= array(
            'nim'=>'1915101017',
            'nama'=>'Soma Darmayasa'
        );
        $data['user']='';
        return view('admin.dashboard', compact('tittle'));
    }
}

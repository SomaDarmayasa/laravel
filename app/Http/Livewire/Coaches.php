<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Coach;
use App\Models\Role;

class Coaches extends Component
{
    public $coaches,$coaches_id,$nama,$gender,$telp,$role,$search;
    public $isModal;
    use WithPagination;
    public function render()
    {
        $roles = Role::all();
        $search = '%'.$this->search.'%';
        $this->coaches = Coach::where('nama','LIKE',$search)
        ->orWhere('gender','LIKE',$search)
        ->orWhere('telp','LIKE',$search)
        ->orWhere('role','LIKE',$search)
        ->orderBy('created_at','DESC')->get();


        return view('livewire.coach.coaches',compact('roles'))->layout('layouts.template');
    }

    public function createcoach(){


        $this->resetFields();

        $this->openModal();

    }
    public function resetFields()
    {
        $this->nama = '';
        $this->gender = '';
        $this->telp = '';
        $this->role = '';
        $this->coaches_id = '';
    }
    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    public function store()
    {
         //MEMBUAT VALIDASI
         $this->validate([
            'nama' => 'required',
            'gender' => 'required',
            'telp' => 'required|numeric',
            'role'=> 'required'

        ]);


          //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Coach::updateOrCreate(
            ['id' => $this->coaches_id],
            [
            'nama' => $this->nama,
            'gender' => $this->gender,
            'telp' => $this->telp,
            'role'=> $this->role,
            ]
        );

        session()->flash('message', $this->coaches_id ? $this->nama .' Diperbaharui': $this->nama . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD

    }
    public function edit($id)
    {
        $coaches = Coach::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->coaches_id = $id;
        $this->nama =  $coaches->nama;
        $this->gender =  $coaches->gender;
        $this->telp =  $coaches->telp;
        $this->role = $coaches->role;


        $this->openModal(); //LALU BUKA MODAL
    }

    public function delete($id)
    {
        $coaches = Coach::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $coaches->delete(); //LALU HAPUS DATA
        session()->flash('message', $coaches->nama . 'Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }
}


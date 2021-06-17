<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Student;


class Customers extends Component
{
    public $customers, $idplayer, $telp, $status, $item, $member_id, $nama, $search;
    public $isModal;
    public function render()
    {
        $students = Student::all();
        $search = '%'.$this->search.'%';
        $this->customers = Customer::where('idplayer','LIKE',$search)
        ->orWhere('nama','LIKE',$search)
        ->orWhere('telp','LIKE',$search)
        ->orWhere('status','LIKE',$search)
        ->orWhere('item','LIKE',$search)
        ->orderBy('created_at','DESC')->get();
        return view('livewire.customers',compact('students'))->layout('layouts.template');

    }

    public function create(){

        $this->resetFields();

        $this->openModal();
    }

    public function resetFields()
    {
        $this->idplayer = '';
        $this->nama = '';
        $this->telp = '';
        $this->status = '';
        $this->item = '';
        $this->member_id = '';
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
            'idplayer' => 'required|string',
            'nama' => 'required',
            'telp' => 'required|numeric',
            'status' => 'required',
            'item' => 'required',
        ]);


          //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Customer::updateOrCreate(
            ['id' => $this->member_id],
            [
            'idplayer' => $this->idplayer,
            'nama' => $this->nama,
            'telp' => $this->telp,
            'status' => $this->status,
            'item' => $this->item,
            ]
        );

        session()->flash('message', $this->member_id ? $this->idplayer .' Diperbaharui': $this->idplayer . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    public function edit($id)
    {
        $customer = Customer::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->member_id = $id;
        $this->idplayer = $customer->idplayer;
        $this->nama = $customer->nama;
        $this->telp = $customer->telp;
        $this->status = $customer->status;
        $this->item = $customer->item;

        $this->openModal(); //LALU BUKA MODAL
    }

    public function delete($id)
    {
        $customer = Customer::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $customer->delete(); //LALU HAPUS DATA
        session()->flash('message', $customer->idplayer . 'Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }
}

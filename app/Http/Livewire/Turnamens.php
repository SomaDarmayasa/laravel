<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Turnamen;
use App\Models\Role;
use App\Models\Coach;
use Illuminate\Support\Facades\Storage;

class Turnamens extends Component
{
    use WithFileUploads;
    public $turnamens, $namaturnamen, $gambar, $tgl, $turnamen_id,$role,$nama, $search;
    public $isModal;
    public function render()
    {
        $coaches = Coach::all();
        $roles = Role::all();
        $search = '%'.$this->search.'%';
        $this->turnamens = Turnamen::where('namaturnamen','LIKE',$search)
        ->orWhere('role','LIKE',$search)
        ->orWhere('nama','LIKE',$search)
        ->orWhere('tgl','LIKE',$search)
        ->orderBy('created_at','DESC')->get();
        return view('livewire.turnamen.turnamens',compact('roles','coaches'))->layout('layouts.template');
    }

    public function previewGambar(){
        $this->validate([
            'gambar'=> 'image|max:2048'
        ]);
    }

    public function createturnamen(){

        $this->resetFields();

        $this->openModal();
    }

    public function resetFields()
    {
        $this->namaturnamen = '';
        $this->gambar = '';
        $this->role ='';
        $this->nama ='';
        $this->tgl = '';
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
        $this->validate([
            'namaturnamen' => 'required',
            'gambar' => 'image|max:2048|required',
            'role' => 'required',
            'nama' => 'required',
            'tgl' => 'required',
        ]);

        $NamaGambar = md5($this->gambar.microtime().'.'.$this->gambar->extension());

        Storage::putFileAs(
            'public/gambar',
            $this->gambar,
            $NamaGambar
        );

        Turnamen::updateorCreate([
            'namaturnamen' => $this->namaturnamen,
            'gambar' => $NamaGambar,
            'role'=> $this->role,
            'nama'=> $this->nama,
            'tgl' => $this->tgl,
            ]);

        session()->flash('Info','Turnamen Sukses Ditambahkan');
        $this->closeModal();
        $this->resetFields();


    }

    public function edit($id)
    {
        $turnamen = Turnamen::find($id);
        $this->turnamen_id = $id;
        $this->namaturnamen = $turnamen->namaturnamen;
        $this->gambar = $turnamen->gambar;
        $this->role = $turnamen->role;
        $this->nama = $turnamen->nama;
        $this->tgl = $turnamen->tgl;

        $this->openModal();
    }
    public function delete($id)
    {
        $turnamen = Turnamen::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $turnamen->delete(); //LALU HAPUS DATA
        session()->flash('message', $turnamen->namaturnamen . 'Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

}

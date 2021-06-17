<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;

class Product extends Component
{
    use WithFileUploads;
    public $nama,$gambar,$deskripsi,$harga,$product_id,$search;
    public $isModal;
    public function render()
    {
        $search = '%'.$this->search.'%';
        $products = ProductModel::where('nama','LIKE',$search)
        ->orWhere('gambar','LIKE',$search)
        ->orWhere('deskripsi','LIKE',$search)
        ->orWhere('harga','LIKE',$search)
        ->orderBy('created_at','DESC')->get();
        return view('livewire.product',[
            'products'=> $products
        ])->layout('layouts.template');
    }
    public function previewGambar(){
        $this->validate([
            'gambar'=> 'image|max:2048'
        ]);
    }

    public function createproduct(){

        $this->resetFields();

        $this->openModal();
    }

    public function resetFields()
    {
        $this->nama = '';
        $this->gambar = '';
        $this->deskripsi = '';
        $this->harga = '';
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
            'nama' => 'required',
            'gambar' => 'image|max:2048|required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $NamaGambar = md5($this->gambar.microtime().'.'.$this->gambar->extension());

        Storage::putFileAs(
            'public/gambar',
            $this->gambar,
            $NamaGambar
        );

        ProductModel::updateorCreate([
            'nama' => $this->nama,
            'gambar' => $NamaGambar,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            ]);

        session()->flash('Info','Produk Sukses Ditambahkan');
        $this->closeModal();
        $this->resetFields();


    }
    public function edit($id)
    {
        $product = ProductModel::find($id);
        $this->product_id = $id;
        $this->nama = $product->nama;
        $this->gambar = $product->gambar;
        $this->deskripsi = $product->deskripsi;
        $this->harga= $product->harga;

        $this->openModal();
    }
    public function delete($id)
    {
        $product = ProductModel::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $product->delete(); //LALU HAPUS DATA
        session()->flash('message', $product->idplayer . 'Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

}


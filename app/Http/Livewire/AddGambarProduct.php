<?php

namespace App\Http\Livewire;

use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\Penjual;
use App\Models\Produk;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddGambarProduct extends Component
{
        use WithFileUploads;
        public  $produks, $namaproduk, $files, $deskripsi, $stok, $harga, $idkategori, $kdproduk, $produk_id;
        public $updateMode = false;
        public $inputs = [];
        public $i = 1;
    
        public function add($i)
        {
            $i = $i + 1;
            $this->i = $i;
            array_push($this->inputs ,$i);
        }
    
        public function remove($i)
        {
            unset($this->inputs[$i]);   
        }
    
        private function resetInputFields(){
            $this->namaproduk = '';
            $this->deskripsi = '';
            $this->stok = '';
            $this->harga = '';
            $this->idkategori = '';
            $this->kdproduk = '';
            $this->files = '';
            $this->i = 1;
        }
    
        public function store()
        {
            $validatedDate = $this->validate([
                    'namaproduk.0' => 'required',
                    'deskripsi.0' => 'required',
                    'stok.0' => 'required',
                    'harga.0' => 'required',
                    'idkategori.0' => 'required',
                    'files.0' => 'required',
                    'kdproduk.0' => 'required',
                    'namaproduk.*' => 'required',
                    'deskripsi.*' => 'required',
                    'stok.*' => 'required',
                    'harga.*' => 'required',
                    'idkategori.*' => 'required',
                    'files.*' => 'required',
                    'kdproduk.*' => 'required',
                ],
                [
                    'namaproduk.0.required' => 'nama field is required',
                    'deskripsi.0.required' => 'deskripsi field is required',
                    'stok.0.required' => 'stok field is required',
                    'harga.0.required' => 'harga field is required',
                    'idkategori.0.required' => 'kategori field is required',
                    'files.0.required' => 'image field is required',
                    'kdproduk.0.required' => 'kode product field is required',
                    'namaproduk.*.required' => 'name product field is required',
                    'deskripsi.*.required' => 'deskripsi field is required',
                    'stok.*.required' => 'stok field is required',
                    'harga.*.required' => 'harga field is required',
                    'idkategori.*.required' => 'kategori field is required',
                    'files.*.required' => 'image field is required',
                    'kdproduk.*.required' => 'kode produk field is required',
                ]
            );
            foreach ($this->namaproduk as $key => $value) {
            $produk['member'] = Produk::create([
                    'nmproduk' => $this->namaproduk[$key],
                    'deskripsi' => $this->deskripsi[$key],
                    'stok' => $this->stok[$key],
                    'harga' => $this->harga[$key],
                    'idkategori' => $this->idkategori[$key],
                    'idpenjual' => "1",
                    'kdproduk' => $this->kdproduk[$key]
                ]);
                
    
                   foreach($this->files as $keyy => $file)
                   {
                       $path = $file->store('penjual.product');
                       $name = $file->getClientOriginalName();
                       $plus = $path.'/'.$name;
                       $insert[$keyy]['nama_gambar'] = $plus;
                       $insert[$keyy]['kdproduk'] = $produk['member']['id'];
        
                   }
                    Gambar::insert($insert);

            }
      
            $this->inputs = [];
       
            $this->resetInputFields();
       
            session()->flash('message', 'Products Added Successfully.');
        }
    
        public function render()
        {
            $data['data'] = Produk::all();
            $data['kat'] = Kategori::all();
            $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
            return view('livewire.add-gambar-product',$data);
        }
}



?>
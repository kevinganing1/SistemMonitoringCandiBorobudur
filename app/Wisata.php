<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = ['nama_wisata', 'deskripsi', 'lokasi', 'waktu', 'harga', 'gambar'];

    public function getGambar()
    {
    	if(!$this->gambar){
    		return asset('images/default.jpg');
    	}
    	return asset('images/'.$this->gambar);
    }
}

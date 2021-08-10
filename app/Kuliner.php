<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliner';
    protected $fillable = ['nama_kuliner', 'deskripsi', 'lokasi', 'waktu', 'harga', 'gambar'];

    public function getGambar()
    {
    	if(!$this->gambar){
    		return asset('images/default.jpg');
    	}
    	return asset('images/'.$this->gambar);
    }
}

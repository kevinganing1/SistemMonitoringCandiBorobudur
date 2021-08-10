<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = ['nama_event', 'deskripsi', 'lokasi', 'waktu', 'harga', 'gambar'];

    public function getGambar()
    {
    	if(!$this->gambar){
    		return asset('images/default.jpg');
    	}
    	return asset('images/'.$this->gambar);
    }
}

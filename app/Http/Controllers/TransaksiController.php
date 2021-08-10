<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaksi;
use App\Event;

class TransaksiController extends Controller
{
	public function buyevent(Request $request)
	{
	    DB::table('transaksi')->insert([
	    'nama_menu' => $request->nama_event,
	    'tanggal_tiket' => $request->tanggal_tiket,
	    'jumlah_tiket' => $request->jumlah_tiket,
	    'waktu' => $request->waktu,
	    'harga' => $request->harga,
	}
}

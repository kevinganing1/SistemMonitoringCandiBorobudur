<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function pengunjung()
    {
    	return view('admin.pengunjung');
    }

    public function penjualan()
    {
    	return view('admin.penjualan');
    }

    public function review()
    {
    	return view('admin.review');
    }
}

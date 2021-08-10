<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	return view('home');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function index()
    {
        //$data_event = \App\Event::all();
        //$data_kuliner = \App\Kuliner::all();
    	return view('index');
        //['data_event' => $data_event],['data_kuliner' => $data_kuliner]);
    }

    public function kuliner()
    {
    	return view('event2');
    }

     public function adminHome()
    {
        return view('admin');
    }
}

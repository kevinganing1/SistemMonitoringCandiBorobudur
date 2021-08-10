<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_event = \App\Event::all();
        return view('event.index',['data_event' => $data_event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->hasFile('gambar')){

            $file = $request->file('gambar');
            $nama_file = $file->getClientOriginalName();
            $file->move('images',$nama_file);
            
            DB::table('event')->insert([
                'nama_event' => $request->nama_event,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => $file->getClientOriginalName()
            ]);
        }
        return redirect('/eventAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data_event = \App\Event::all();
        return view('event.page', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$event = DB::table('event')->where('id',$id)->get();
        //return view('event.edit',['event' => $event]);
        $event = \App\Event::find($id);
        return view('event.edit',['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('gambar')){

            $file = $request->file('gambar');
            $nama_file = $file->getClientOriginalName();
            $file->move('images',$nama_file);
            
            DB::table('event')->where('id',$request->id)->update([
                'nama_event' => $request->nama_event,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => '/images/'.$file->getClientOriginalName()
            ]);
        }
        return redirect('/eventAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $event = \App\Event::find($id);
        $event->delete($event);
        return redirect('/eventAdmin');
    }

    public function eventAdmin()
    {
        $data_event = \App\Event::all();
        return view('event.indexAdmin',['data_event' => $data_event]);
    }

    public function showAdmin(Event $event)
    {
        $data_event = \App\Event::all();
        return view('event.pageAdmin', compact('event'));
    }

    public function hidden(Request $request, $id)
    {
        
        $event = \App\Event::find($id);
        $event->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('/images/', $request->file('gambar')->getClientOriginalName());
            $event->gambar = $request->file('gambar')->getClientOriginalName();
            $event->save();
        }
        return redirect('/eventAdmin');
    }
}

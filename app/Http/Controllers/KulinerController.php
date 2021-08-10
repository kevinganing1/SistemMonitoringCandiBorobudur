<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kuliner;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kuliner = \App\Kuliner::all();
        return view('kuliner.index',['data_kuliner' => $data_kuliner]);
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
            
            DB::table('kuliner')->insert([
                'nama_kuliner' => $request->nama_kuliner,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => $file->getClientOriginalName()
            ]);
        }
        return redirect('/kulinerAdmin');
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
    public function show(Kuliner $kuliner)
    {
        $data_kuliner = \App\Kuliner::all();
        return view('kuliner.page', compact('kuliner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$kuliner = DB::table('kuliner')->where('id',$id)->get();
        //return view('kuliner.edit',['kuliner' => $kuliner]);
        $kuliner = \App\Kuliner::find($id);
        return view('kuliner.edit',['kuliner' => $kuliner]);
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
            
            DB::table('kuliner')->where('id',$request->id)->update([
                'nama_kuliner' => $request->nama_kuliner,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => '/images/'.$file->getClientOriginalName()
            ]);
        }
        return redirect('/kulinerAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $kuliner = \App\Kuliner::find($id);
        $kuliner->delete($kuliner);
        return redirect('/kulinerAdmin');
    }

    public function kulinerAdmin()
    {
        $data_kuliner = \App\Kuliner::all();
        return view('kuliner.indexAdmin',['data_kuliner' => $data_kuliner]);
    }

    public function showAdmin(Kuliner $kuliner)
    {
        $data_kuliner = \App\Kuliner::all();
        return view('kuliner.pageAdmin', compact('kuliner'));
    }

    public function hidden(Request $request, $id)
    {
        
        $kuliner = \App\Kuliner::find($id);
        $kuliner->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('/images', $request->file('gambar')->getClientOriginalName());
            $kuliner->gambar = $request->file('gambar')->getClientOriginalName();
            $kuliner->save('/images');
        }
        return redirect('/kulinerAdmin');
    }
}

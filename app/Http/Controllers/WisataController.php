<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Wisata;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_wisata = \App\Wisata::all();
        return view('wisata.index',['data_wisata' => $data_wisata]);
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
            
            DB::table('wisata')->insert([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => $file->getClientOriginalName()
            ]);
        }
        return redirect('/wisataAdmin');
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
    public function show(Wisata $wisata)
    {
        $data_wisata = \App\Wisata::all();
        return view('wisata.page', compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$wisata = DB::table('wisata')->where('id',$id)->get();
        //return view('wisata.edit',['wisata' => $wisata]);
        $wisata = \App\Wisata::find($id);
        return view('wisata.edit',['wisata' => $wisata]);
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
            
            DB::table('wisata')->where('id',$request->id)->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
                'gambar' => '/images/'.$file->getClientOriginalName()
            ]);
        }
        return redirect('/wisataAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $wisata = \App\Wisata::find($id);
        $wisata->delete($wisata);
        return redirect('/wisataAdmin');
    }

    public function wisataAdmin()
    {
        $data_wisata = \App\Wisata::all();
        return view('wisata.indexAdmin',['data_wisata' => $data_wisata]);
    }

    public function showAdmin(Wisata $wisata)
    {
        $data_wisata = \App\Wisata::all();
        return view('wisata.pageAdmin', compact('wisata'));
    }

    public function hidden(Request $request, $id)
    {
        
        $wisata = \App\Wisata::find($id);
        $wisata->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('/images', $request->file('gambar')->getClientOriginalName());
            $wisata->gambar = $request->file('gambar')->getClientOriginalName();
            $wisata->save('/images');
        }
        return redirect('/wisataAdmin');
    }
}

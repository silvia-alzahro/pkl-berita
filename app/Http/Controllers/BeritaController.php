<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $berita = Berita::all();
        $berita = Berita::orderBy('created_at', 'DESC')->get();
        $kategories = Kategori::all();
        return view('berita.index', compact('berita', 'kategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $berita = Berita::all();
        $kategori = Kategori::all();
        return view('berita.create', compact('berita', 'kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'poto'=>'image|mimes:jpg,png,jpeg',
            'judul' => 'required',
            'isi' => 'required',
            'nama_penulis' => 'required',
            'tanggal' => 'required'
        ]);
        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->id_kategori = $request->id_kategori;
        $berita->poto = $request->poto;
        if ($request->hasFile('poto')){
            $image = $request->file('poto');
            $name = rand(1000,9999) . $image->getClientOriginalName();
            $image->move('image/berita/', $name);
            $berita->poto = $name;
        }
        $berita->nama_penulis = $request->nama_penulis;
        $berita->tanggal = $request->tanggal;

        $berita->save();
        return redirect()->route('berita.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = Kategori::all();
        return view('berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poto'=>'image|mimes:jpg,png,jpeg',
            'judul' => 'required',
            'isi' => 'required',
            'nama_penulis' => 'required',
            'tanggal' => 'required'

        ]);
        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->id_kategori = $request->id_kategori;
        if ($request->hasFile('poto')) {
            $berita->deleteImage();
            $image = $request->file('poto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/berita/', $name);
            $berita->poto = $name;
        }
        $berita->nama_penulis = $request->nama_penulis;
        $berita->tanggal = $request->tanggal;

        $berita->save();
        return redirect()->route('berita.index')->with('success', 'Data Berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->deleteImage();

        $berita->delete();

        return redirect()->route('berita.index');

    }
    public function beritaKategori(Kategori $kategori)
    {
        $berita = Berita::where('id_kategori', $kategori->id)->get();
        $kategories = Kategori::all();
        return view('berita.tampilan', compact('berita', 'kategori', 'kategories'));
    }
}

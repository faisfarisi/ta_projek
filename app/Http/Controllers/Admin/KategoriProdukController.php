<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KategoriProduk::all();
        // dd($data);
        return view('admin.pages.kategori-produk.kategori', ['type_menu' => ''], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kategori-produk.createkategori', ['type_menu' => '']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:255'

        ]);

        KategoriProduk::create($validateData);

        return redirect('/admin/kategori-produk')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = KategoriProduk::find($id);
        return view('admin.pages.kategori-produk.editkategori', ['type_menu' => ''], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:255'
        ]);

        KategoriProduk::where('id', $id)->update($validateData);

        return redirect('/admin/kategori-produk')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KategoriProduk::destroy($id);
        return redirect('/admin/kategori-produk')->with('delete', 'data berhasil dihapus');
    }
}

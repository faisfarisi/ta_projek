<?php

namespace App\Http\Controllers;

use App\Models\Kopi;
use Illuminate\Http\Request;

class KopiController extends Controller
{
    public function index() {
        $data = Kopi::all();
    return view('admin.pages.produk.product', compact('data'));
    }

    public function create()
    {
        return view('admin.pages.produk.createproduct',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'Kategori' => 'required',
            'satuan' => 'required',
            'harga_kopi' => 'required',
            'stok' => 'required',
            'gambar' => 'required'

        ]);




        Kopi::create($validateData);

        return redirect('/produk')->with('success', 'data berhasil ditambahkan');
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
        $data = User::find($id);
        return view('admin.pages.produk.editproduct', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validateData = $request->validate([
            'jenis_kopi' => 'required',
            'harga_kopi' => 'required',
            'stok' => 'required',
            'gambar' => 'required'
        ]);


        Kopi::where('id', $id)->update($validateData);

        return redirect('/produk')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect('/produk')->with('delete', 'data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('updated_at', 'desc')->get();
        return view('admin.pages.user-module.admin', ['type_menu' => 'user-module'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user-module.createadmin', ['type_menu' => 'user-module']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:5|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/user-admin')->with('success', 'data berhasil ditambahkan');
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
        return view('admin.pages.user-module.editadmin', ['type_menu' => 'user-module'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'username' => 'required|min:5|max:255',
        ]);
        if ($request->password == null) {
            $validateData['password'] = $user->password;
        } else {
            $validateData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email:dns',
                'username' => 'required|min:5|max:255',
                'password' => 'required|min:5|max:255'
            ]);
            $validateData['password'] = Hash::make($validateData['password']);
        }
        User::where('id', $id)->update($validateData);

        return redirect('/user-admin')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect('/user-admin')->with('delete', 'data berhasil dihapus');
    }
}

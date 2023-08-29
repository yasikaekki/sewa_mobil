<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCar;
use App\Models\User;
use Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = "Sewa Mobil";
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        $post = PostCar::all();

        return view('mobil.index', compact('judul','akun','post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = "Tambahkan Kendaraan";
        $uid = Auth::user()->id;
        $akun = User::find($uid);

        return view('mobil.create',compact('judul','akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $uid = Auth::user()->id;
        $user = User::find($uid);
        $newCar = New PostCar;
        $newCar->role_id= $user->role_id;
        if ($request->hasFile('foto_profil')) {
            $file_foto = $request->file('foto_profil');
            $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
            $upload_foto = 'assets/foto profil/';
            $file_foto->move($upload_foto, $nama_foto);
            $newCar->foto_profil = $nama_foto;
        }
        $newCar->nama_mobil = $request->nama_mobil;
        $newCar->no_kendaraan = $request->no_kendaraan;
        $newCar->no_stnk = $request->no_stnk;
        $newCar->created_at = \Carbon\Carbon::now();
        $newCar->save();

        return redirect()->route('sewa_mobil.index')->with('sukses', 'Akun '. $user->name .' berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

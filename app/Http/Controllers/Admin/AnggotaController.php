<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = "Data Anggota";
        $uid = Auth::user()->id;
        $no =1;
        $akun = User::find($uid);
        $user = User::all(); 
        return view('admin.anggota.index',compact('judul','akun','no','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = "Tambah Akun";
        $uid = Auth::user()->id;
        $akun = User::find($uid);

        return view('admin.anggota.create',compact('judul','akun'));
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
        $judul = "Ubah Akun";
        $data = Crypt::decrypt($id);
        $akun = User::find($data);

        return view('admin.anggota.edit',compact('judul','akun'));
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
        $user = PostCar::find($id);
        
        $user->name= $request->name;
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir= $request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->alamat=$request->alamat;
        $user->no_ktp=$request->no_ktp;
        $user->no_sim=$request->no_sim;
        $user->no_npwp=$request->no_npwp;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('admin.anggota.index')->with('sukses', 'Akun '. $user->name .' berhasil dibuat');
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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('sewa_mobil.index')->with('sukses', 'Akun "'. $user->name .'" berhasil dihapus');
    }
}

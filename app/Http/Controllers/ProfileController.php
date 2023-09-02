<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Akun';
        $uid = Auth::id();
        $akun = User::find($uid);

        return view('profile.index',compact('judul','akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $judul = 'Ubah Akun';
        $data = Crypt::decrypt($id);
        $akun = User::find($data);

        return view('profile.edit', compact('judul', 'akun'));
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
        $this->validate($request, [
            'foto_profil' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'no_ktp' => 'required',
        ],
        [
            'foto_profil.required'=>'Foto profil harus harus diisi',
            'tempat_lahir.required'=>'Tempat lahir harus diisi',
            'tanggal_lahir.required'=>'Tanggal lahir harus diisi',
            'jenis_kelamin.required'=>'Jenis kelamin harus diisi',
            'no_ktp.required'=>'No. KTP harus diisi',
        ]);

        $user=User::find($id);
        $user->name = $request->name;

        if ($request->hasFile('foto_profil')) {
            $file_foto = $request->file('foto_profil');
            $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
            $upload_foto = 'assets/foto profil/';
            $file_foto->move($upload_foto, $nama_foto);
            $user->foto_profil = $nama_foto;
        }

        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir= $request->tanggal_lahir;
        $user->jenis_kelamin=$request->jenis_kelamin;
        $user->telepon=$request->telepon;
        $user->alamat=$request->alamat;
        $user->no_ktp=$request->no_ktp;
        $user->no_sim=$request->no_sim;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('profile.index')->with('sukses', 'Akun '. $user->name .' berhasil diubah');
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

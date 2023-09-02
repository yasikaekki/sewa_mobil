<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\PostCar;
use App\Models\Terpinjam;
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
        $judul = "Data Kendaraan";
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        $post = PostCar::all();
        $data = count($post);
        
        return view('sewaMobil.index', compact('judul','akun','post','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $judul = "Tambah Kendaraan";
        $uid = Auth::user()->id;
        $akun = User::find($uid);

        return view('sewaMobil.create',compact('judul','akun'));
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
        $this->validate($request, [
            'foto_profil' => 'required',
            'nama_kendaraan' => 'required|string|max:255',
            'no_kendaraan' => 'required|string|max:255',
            'harga' => 'required',
            'no_stnk' => 'required',
        ],
        [
            'foto_profil.required'=>'Foto kendaraan harus harus diisi',
            'nama_kendaraan.required'=>'Nama Kendaraan harus harus diisi',
            'no_kendaraan.required'=>'No. Kendaraan harus diisi',
            'harga.required'=>'Harga Sewa harus diisi',
        ]);

        $uid = Auth::user()->id;
        $user = User::find($uid);
        $newCar = new PostCar;
        $newCar->user_id= $uid;
        if ($request->hasFile('foto_profil')) {
            $file_foto = $request->file('foto_profil');
            $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
            $upload_foto = 'assets/foto mobil/';
            $file_foto->move($upload_foto, $nama_foto);
            $newCar->foto_profil = $nama_foto;
        }
        $newCar->nama_kendaraan = $request->nama_kendaraan;
        $newCar->harga = $request->harga;
        $newCar->no_kendaraan = $request->no_kendaraan;
        $newCar->no_stnk = $request->no_stnk;
        $newCar->created_at = \Carbon\Carbon::now();
        $newCar->save();

        return redirect()->route('sewa_mobil.index')->with('sukses', 'Jenis Kendaraan '. $newCar->nama_kendaraan .' berhasil disimpan');
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
        $judul = "Ubah Data Kendaraan";
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        $data = Crypt::decrypt($id);
        $post = PostCar::find($data);

        return view('sewaMobil.edit', compact('judul', 'post', 'akun'));
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
        $uid = Auth::id();
        $akun = User::find($uid);

        if ($akun->role->jenis_role == "Seller"){
            $post=PostCar::find($id);
            $post->nama_kendaraan = $request->nama_kendaraan;

            if ($request->hasFile('foto_profil')) {
                $file_foto = $request->file('foto_profil');
                $nama_foto = time() . "." . $file_foto->getClientOriginalExtension();
                $upload_foto = 'assets/foto mobil/';
                $file_foto->move($upload_foto, $nama_foto);
                $post->foto_profil = $nama_foto;
            }

            $post->harga = $request->harga;
            $post->no_kendaraan = $post->no_kendaraan;
            $post->no_stnk = $post->no_stnk;
            $post->created_at=\Carbon\Carbon::now();
            $post->save();

            return redirect()->route('sewa_mobil.index')->with('sukses', 'Jenis Kendaraan '. $post->nama_kendaraan .' berhasil diubah');
        }elseif($akun->role->jenis_role == "User"){
            $pinjam = PostCar::find($id);
        
            $pinjam->status= "Terpinjam";
            $pinjam->masa_akhir = $request->masa_akhir;
            $pinjam->save();

            $terpinjam = new Terpinjam;
            $terpinjam->user_id = Auth::user()->id;
            $terpinjam->post_car_id = $pinjam->id;
            $terpinjam->save();

            return redirect()->route('sewa_mobil.index')->with('sukses', 'Jenis Kendaraan '. $pinjam->nama_kendaraan .' berhasil dipinjam');
        }
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
        $post = PostCar::find($id);
        $namapost = $post->nama_kendaraan;
        $post->delete();

        return redirect()->route('sewa_mobil.index')->with('sukses', 'Postingan "'. $namapost .'" berhasil dihapus');
    }
}

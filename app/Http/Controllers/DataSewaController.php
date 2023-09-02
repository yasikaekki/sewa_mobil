<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCar;
use App\Models\Terpinjam;
use App\Models\User;
use Auth;

class DataSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $judul = "Data Sewa";
        $uid = Auth::user()->id;
        $no = 1;
        $akun = User::find($uid);
        
        if ($akun->role->jenis_role == "User" || $akun->role->jenis_role == "Seller") {

            if($request->search){
                $post=  PostCar::where('nama_kendaraan','like','%'.$request->search.'%')
                ->orWhere('no_kendaraan','like','%'.$request->search.'%')
                ->paginate(6);
            }else{
                $post = PostCar::paginate(6);
                $pinjam = Terpinjam::paginate(6);
                $data = count($pinjam);
            }

            if($request->sort == 'asc'){
                $pinjam = Terpinjam::orderBy('created_at', 'asc')->paginate(6);
            }elseif ($request->sort == 'desc') {
                $pinjam = Terpinjam::orderBy('created_at', 'desc')->paginate(6);
            }
        } else {

            if($request->search){
                $post=  PostCar::where('nama_kendaraan','like','%'.$request->search.'%')
                ->orWhere('no_kendaraan','like','%'.$request->search.'%')
                ->paginate(6);
            }else{
                $post = PostCar::paginate(6);
                $data = count($post);
            }

            if($request->sort == 'asc'){
                $post = PostCar::orderBy('created_at', 'asc')->paginate(6);
            }elseif ($request->sort == 'desc') {
                $post = PostCar::orderBy('created_at', 'desc')->paginate(6);
            }
        }

        return view('dataSewa.index', compact('judul', 'akun', 'post', 'no', 'data'));
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
        $lapor = new Keluhan;
        $lapor->user_id = $request->user_id;
        $lapor->post_car_id = $request->post_car_id;
        $lapor->jenis_keluhan = $request->jenis_keluhan;
        $lapor->save();

        return redirect()->route('data_sewa.index')->with('sukses', 'berhasil dilaporkan');

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
    public function destroy(Request $request ,$id)
    {
        //
        $post = Terpinjam::findOrFail($id);
        $post->delete();
        $kembali = PostCar::find($id);
        $kembali->status= null;
        $kembali->masa_akhir = null;
        $kembali->save();

        return redirect()->route('data_sewa.index')->with('sukses', $post->nama_kendaraan.'berhasil dikembalikan');
    }
}

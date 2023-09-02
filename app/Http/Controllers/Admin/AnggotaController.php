<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Hash;
use Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        if ($akun->role->jenis_role == "Admin") {
            $judul = "Data Akun";
            $no =1;
            if($request->has('search')){
                $user=  User::where('name','like','%'.$request->search.'%')
                ->orWhere('alamat','like','%'.$request->search.'%')
                ->paginate(6);
            }else{
                $user = User::paginate(6);
            }
            return view('admin.anggota.index',compact('judul','akun','no','user'));
        } else {
            return view('errors.404');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        if ($akun->role->jenis_role == "Admin") {
            $judul = "Tambah Akun";

            return view('admin.anggota.create',compact('judul','akun'));
        } else {
            return view('errors.404');
        }
        
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
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'no_sim' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:8|confirmed',
        ],
        [
            'name.required'=>'Nama harus harus diisi',
            'alamat.required'=>'Alamat harus diisi',
            'telepon.required'=>'No. Telepon harus diisi',
            'no_sim.required'=>'No. SIM harus diisi',
            'email.required'=>'Email harus diisi',
        ]);
        $user = new User;
        
        $user->name= $request->name;
        $user->alamat=$request->alamat;
        $user->telepon=$request->telepon;
        $user->no_sim=$request->no_sim;
        $user->role_id=$request->role_id;
        $user->no_npwp=$request->no_npwp;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('admin.anggota.index')->with('sukses', 'Akun '. $user->name .' berhasil dibuat');
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
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        if ($akun->role->jenis_role == "Admin") {
            $judul = "Ubah Akun";
            $data = Crypt::decrypt($id);
            $user = User::find($data);

            return view('admin.anggota.edit',compact('judul','user','akun'));
        } else {
            return view('errors.404');
        }
        
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
        $user = User::find($id);
        
        $user->name= $request->name;
        $user->alamat=$request->alamat;
        $user->telepon=$request->telepon;
        $user->no_ktp=$request->no_ktp;
        $user->no_sim=$request->no_sim;
        $user->role_id=$request->role_id;
        $user->no_npwp=$request->no_npwp;
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect()->route('admin.anggota.index')->with('sukses', 'Akun '. $user->name .' berhasil diubah');
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

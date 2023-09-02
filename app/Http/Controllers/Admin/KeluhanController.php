<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\User;
use Auth;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid = Auth::user()->id;
        $akun = User::find($uid);
        if ($akun->role->jenis_role == "Admin") {
            $judul = "Data Keluhan";
            $no =1;
            if($request->has('search')){
                $lapor=  User::where('name','like','%'.$request->search.'%')
                ->paginate(6);
            }else{
                $lapor = Keluhan::paginate(6);
                $data = count($lapor);
            }
    
            return view('admin.keluhan.index',compact('judul','akun','no','lapor','data'));
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
        $akun = User::find($id);
        if ($akun->role->jenis_role == "Admin") {
            $judul = "Profil Terlapor";
            $data = Crypt::decrypt($id);
            $lapor = Keluhan::find($data);

            return view('admin.keluhan.show',compact('judul','akun','lapor'));
        } else {
            return view('errors.404');
        }
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

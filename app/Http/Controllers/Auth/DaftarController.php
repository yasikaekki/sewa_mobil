<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.daftar');
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
            'name'=> 'required|string|max:255',
            'alamat'=> 'required|string|max:255',
            'telepon'=> 'required|string|max:255',
            'no_npwp'=> 'required|integer',
            'no_sim'=> 'required|integer',
            'email'=> 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            ]
        );

        $user = new User();
        $user->role_id = 2;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->alamat=$request->alamat;
        $user->telepon=$request->telepon;
        $user->no_npwp=$request->no_npwp;
        $user->no_sim=$request->no_sim;
        $user->password=Hash::make($request->password);
        $user->created_at=\Carbon\Carbon::now();
        $user->save();

        return redirect('home');
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

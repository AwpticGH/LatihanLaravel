<?php

namespace App\Http\Controllers;

use App\Models\ModelKontak;
use Illuminate\Http\Request;

class Kontak extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelKontak::all();
        return view('kontak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ModelKontak();
        $data -> Name = $request -> name;
        $data -> Email = $request -> email;
        $data -> PhoneNumber = $request -> phoneNumber;
        $data -> Address = $request -> address;
        $data -> save();
        return redirect() -> route('kontak.index') -> with('alert-success', 'Data Berhasil Dibikin');
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
        $data = ModelKontak::where('ID', $id) -> get();
        return view('kontak_edit', compact('data'));
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
        $data = ModelKontak::where('ID', $id) -> first();
        $data -> Name = $request -> name;
        $data -> Email = $request -> email;
        $data -> PhoneNumber = $request -> phoneNumber;
        $data -> Address = $request -> address;
        $data -> save();

        return redirect() -> route('kontak.index') -> with('alert-success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelKontak::where('ID',$id);
        $data -> delete();
        return redirect() -> route('kontak.index')->with('alert-success', 'Data Berhasil Dihapus!');
    }
}

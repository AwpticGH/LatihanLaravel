<?php

namespace App\Http\Controllers;

use App\Models\ModelFile;
use Illuminate\Http\Request;

class Files extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelFile::all();
        return view('file', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ModelFile();
        $data -> Name = $request -> name;
        $file = $request -> file;
        $ext = $file -> getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file -> move('uploads/file', $newName);
        $data -> file = $newName;
        $data -> save();

        return redirect() -> route('file.index') -> with('alert-success', 'File Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelFile  $modelFile
     * @return \Illuminate\Http\Response
     */
    public function show(ModelFile $modelFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelFile  $modelFile
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelFile $modelFile, int $id)
    {
        $data = ModelFile::findOrFail($id);
        return view('file_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelFile  $modelFile
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelFile $modelFile, int $id)
    {
        $data = ModelFile::findOrFail($id);
        $data->Name = $request->input('name');
        if (empty($request->file('file'))){
            $data->File = $data->File;
        }
        else{
            unlink('uploads/file/'.$data->File); //menghapus file lama
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $data->File = $newName;
        }
        $data -> update();
        $data -> save();

        return redirect() -> route('file.index') -> with('alert-success', 'File Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelFile  $modelFile
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelFile $modelFile, int $id)
    {
        $data = ModelFile::where('ID', $id);
        $file = ModelFile::findOrFail($id);
        unlink('uploads/file/'.$file->File);
        $data -> delete();
        return redirect() -> route('file.index') -> with('alert-success', 'Data Berhasil Dihapus');
    }
}

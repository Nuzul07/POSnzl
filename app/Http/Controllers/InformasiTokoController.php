<?php

namespace App\Http\Controllers;

use App\InformasiToko;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class InformasiTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = InformasiToko::first();
        return view('app.infoToko.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiToko $informasiToko)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function edit(InformasiToko $informasiToko)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $u = InformasiToko::find($id);
        $u->name = $r->input('name');
        $u->alamat = $r->input('alamat');
        $u->telepon = $r->input('telepon');
        $u->keterangan = $r->input('keterangan');
        $u->kode_pos = $r->input('kode_pos');

        if ($photo = $r->file('photo')) {
            $destinationPath = public_path('image/upload/toko'); // upload path
            $profilephoto = uniqid() . "." . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profilephoto);
            $u->photo = $profilephoto;
        }
        
        $u->save();
        alert()->success('Success', 'Data successfully updated');
        return redirect()->route('informasiToko.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformasiToko $informasiToko)
    {
        abort(404);
    }
}

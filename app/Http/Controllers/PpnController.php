<?php

namespace App\Http\Controllers;

use App\Ppn;
use Illuminate\Http\Request;

class PpnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppn = Ppn::orderBy('id', 'DESC')->get();
        return view('app.ppn.index', compact('ppn'));
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
    public function store(Request $r)
    {
        $ppn = new Ppn;
        $ppn->stok_minimum = $r->input('stok_minimum');
        $ppn->ppn = $r->input('ppn');
        $ppn->save();
        alert()->success('Success', 'Data successfully added');
        return redirect()->route('ppn.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function show(Ppn $ppn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppn $ppn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $ppn = Ppn::find($id);
        $ppn->stok_minimum = $r->input('stok_minimum');
        $ppn->ppn = $r->input('ppn');
        $ppn->save();
        alert()->success('Success', 'Data successfully updated');
        return redirect()->route('ppn.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppn = Ppn::find($id);
        $ppn->delete();
        alert()->success('Success', 'Data successfully deleted');
        return redirect()->route('ppn.index');
    }
}

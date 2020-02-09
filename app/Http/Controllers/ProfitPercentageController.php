<?php

namespace App\Http\Controllers;

use App\ProfitPercentage;
use Illuminate\Http\Request;

class ProfitPercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profit = ProfitPercentage::orderBy('id', 'DESC')->get();
        return view('app.profit.index', compact('profit'));
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
        $pft = new ProfitPercentage;
        $pft->profit = $r->input('profit');
        $pft->save();
        alert()->success('Success', 'Data successfully added');
        return redirect()->route('profit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfitPercentage  $profitPercentage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitPercentage $profitPercentage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfitPercentage  $profitPercentage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitPercentage $profitPercentage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfitPercentage  $profitPercentage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $p = ProfitPercentage::find($id);
        $p->profit = $r->input('profit');
        $p->save();
        alert()->success('Success', 'Data successfully updated');
        return redirect()->route('profit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfitPercentage  $profitPercentage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profit = ProfitPercentage::find($id);
        $profit->delete();
        alert()->success('Success', 'Data successfully deleted');
        return redirect()->route('profit.index');
    }
}

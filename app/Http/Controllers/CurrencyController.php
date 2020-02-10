<?php

namespace App\Http\Controllers;

use App\Currency;
use PDF;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr = Currency::orderBy('id', 'DESC')->get();
        return view('app.currency.index', compact('curr'));
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
        $curr = new Currency;
        $curr->currency = $r->input('currency');
        $curr->save();
        alert()->success('Success', 'Data successfully added');
        return redirect()->route('currencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $curr = Currency::find($id);
        $curr->currency = $r->input('currency');
        $curr->save();
        alert()->success('Success', 'Data successfully updated');
        return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curr = Currency::find($id);
        $curr->delete();
        alert()->success('Success', 'Data successfully deleted');
        return redirect()->route('currencies.index');
    }

    public function pdf()
    {
        $pdf = PDf::loadView('app.currency.pdf');
        return $pdf->download('ReportCurrency.pdf');
    }
}

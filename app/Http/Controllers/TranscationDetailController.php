<?php

namespace App\Http\Controllers;

use App\TranscationDetail;
use App\Product;
use App\InformasiToko;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranscationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tctn = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->orderBy('id', 'DESC')->get();
        $total_tctn = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->sum('sub_total');
        $info = InformasiToko::first();
        return view('app.transactionDetail.index', compact('tctn','total_tctn','info'));
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
        $td = new TranscationDetail;
        $td->total = $r->input('total');
        $td->user_id = Auth::user()->id;
        $td->pay = $r->input('pay');

        if ($r->input('pay') < $r->input('total')) {
            alert()->warning('Warning', 'Pay with money according to price !');
            return redirect()->route('transactionDetail.index');
        }

        $td->kembalian = $r->input('pay') - $r->input('total');
        $td->metode_pay = $r->input('metode_pay');
        $kode_unik = rand(1, 100000000);
        $td->kode_unik = $kode_unik;

        $td->save();

        Transaction::where('user_id', \Auth::user()->id)->where('status', 0)->update(['kode_unik' => $kode_unik,'status' => 1]);

        $tctn = Transaction::where('kode_unik', $kode_unik)->get();
        foreach ($tctn as $t) {
            $product = Product::find($t->product_id);
            if ($product->stock - $t->jumlah < 0) {
                $product->stock = 0;
                $product->save();
            } else {
                $product->stock = $product->stock - $t->jumlah;
                $product->save();
            }
        }

        return redirect()->route('invoice.show', $kode_unik);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranscationDetail  $transcationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TranscationDetail $transcationDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranscationDetail  $transcationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TranscationDetail $transcationDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranscationDetail  $transcationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranscationDetail $transcationDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranscationDetail  $transcationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranscationDetail $transcationDetail)
    {
        //
    }
}

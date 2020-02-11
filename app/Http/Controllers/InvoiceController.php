<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TranscationDetail;
use App\Transaction;
use App\InformasiToko;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout = TranscationDetail::where("user_id", Auth::user()->id)->orderBy("id", "DESC")->get();
        return view('app.invoice.index', compact('checkout'));
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
        $kode = TranscationDetail::where('kode_unik', $id)->first();
        $tctn = Transaction::where('user_id', Auth::user()->id)->where("status", 1)->where('kode_unik', $kode->kode_unik)->orderBy("id", "DESC")->get();
        $total_tctn = Transaction::where("user_id", Auth::user()->id)->where("status", 1)->where('kode_unik', $kode->kode_unik)->sum('sub_total');
        $info = InformasiToko::first();
        $checkout = TranscationDetail::where('kode_unik', $id)->first();
        return view('app.invoice.show', compact('kode', 'tctn', 'total_tctn', 'info', 'checkout'));
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

    public function pdf()
    {
        $pdf = PDf::loadView('app.invoice.pdf');
        return $pdf->download('ReportHistoryTransaction.pdf');
    }
}

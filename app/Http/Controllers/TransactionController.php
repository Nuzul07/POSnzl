<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('name', 'ASC')->get();
        $tctn = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->orderBy('id', 'DESC')->get();
        $total_tctn = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->sum('sub_total');
        return view('app.transaction.index', compact('product','tctn','total_tctn'));
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
        $p_id = Product::find($r->input('product_id'));

        $tctn = new Transaction;
        $tctn->product_id = $r->input('product_id');

        if($p_id->stock < $r->input('jumlah')) {
            alert()->warning('Warning','Only Remaining Stock '.$p_id->stock);
            return redirect()->route('transaction.index');
        }
        
        if($r->input('jumlah') < 1) {
            alert()->warning('Warning','Enter the number of items you want to buy!');
            return redirect()->route('transaction.index');
        }

        $tctn->jumlah = $r->input('jumlah');
        $tctn->user_id = Auth::user()->id;
        $tctn->status = 0;
        $tctn->kode_unik = rand(0, PHP_INT_MAX);
        $tctn->sub_total = $r->input('jumlah') * $p_id->selling_price;
        $tctn->save();
        alert()->success('Success', 'Data successfully added');
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tctn = Transaction::find($id);
        $product_id = $tctn->product_id;
        $tctn->delete();
        alert()->success('Successfully deleted');
        return redirect()->route('transaction.index')->with('alertDestroy', $product_id);
    }

    public function clean()
    {
        Transaction::where('user_id', Auth::user()->id)->where('status', 0)->delete();
        alert()->success('Successfully deleted');
        return redirect()->route('transaction.index');
    }
}

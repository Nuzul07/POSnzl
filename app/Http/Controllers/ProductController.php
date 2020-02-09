<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Unit;
use App\Currency;
use App\ProfitPercentage;
use App\Ppn;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->get();
        return view('app.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $unit = Unit::orderBy('id', 'DESC')->get();
        $currency = Currency::orderBy('id', 'DESC')->get();
        $profit = ProfitPercentage::orderBy('id', 'DESC')->get();
        $ppn = Ppn::orderBy('id', 'DESC')->get();
        return view('app.product.create', compact('category','unit','currency','profit','ppn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $p = new Product;
        $barcode = rand(0, PHP_INT_MAX);
        $p->barcode = $barcode;
        $p->category_id = $r->input('category_id');
        $p->currency_id = $r->input('currency_id');
        $p->unit_id = $r->input('unit_id');
        $p->name = $r->input('name');
        $p->stock = $r->input('stock');
        $p->selling_price = $r->input('selling_price');
        $p->purchase_price = $r->input('purchase_price');
        $p->keterangan = $r->input('keterangan');
        $p->discount = $r->input('discount');
        $p->laba = $r->input('laba');
        $p->ppn = $r->input('ppn');
        if ($r->discount != null) {
            $discount = $r->selling_price * $r->discount / 100;
            $minus = $r->purchase_price - $discount;
            $persen = $minus * ($r->laba + $r->ppn) / 100;
            $p->selling_price = $persen + $minus;
        }
        else {
            $persen = $r->purchase_price * ($r->laba + $r->ppn) / 100;
            $p->selling_price = $r->purchase_price + $persen;
        }

        $p->save();
        return redirect()->route('product.index')->with('alertStore', $r->input('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = Product::find($id);
        return response()->json($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $unit = Unit::orderBy('id', 'DESC')->get();
        $currency = Currency::orderBy('id', 'DESC')->get();
        $profit = ProfitPercentage::orderBy('id', 'DESC')->get();
        $ppn = Ppn::orderBy('id', 'DESC')->get();
        $product = Product::find($id);
        return view('app.product.edit', compact('category', 'unit', 'currency', 'profit', 'ppn','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $p = Product::find($id);
        $barcode = rand(0, PHP_INT_MAX);
        $p->barcode = $barcode;
        $p->category_id = $r->input('category_id');
        $p->currency_id = $r->input('currency_id');
        $p->unit_id = $r->input('unit_id');
        $p->name = $r->input('name');
        $p->stock = $r->input('stock');
        $p->selling_price = $r->input('selling_price');
        $p->purchase_price = $r->input('purchase_price');
        $p->keterangan = $r->input('keterangan');
        $p->discount = $r->input('discount');
        $p->laba = $r->input('laba');
        $p->ppn = $r->input('ppn');
        if ($r->discount != null) {
            $discount = $r->selling_price * $r->discount / 100;
            $minus = $r->purchase_price - $discount;
            $persen = $minus * ($r->laba + $r->ppn) / 100;
            $p->selling_price = $persen + $minus;
        } else {
            $persen = $r->purchase_price * ($r->laba + $r->ppn) / 100;
            $p->selling_price = $r->purchase_price + $persen;
        }

        $p->save();
        return redirect()->route('product.index')->with('alertUpdate', $r->input('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index'); 
    }
}

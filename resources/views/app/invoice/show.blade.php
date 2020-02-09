@extends('layouts.parent')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Invoice</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Transaction</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Checkout</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Invoice</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-area">
                            <div class="invoice-head">
                                <div class="row">
                                    <div class="iv-left col-6">
                                        <strong>INVOICE</strong>
                                    </div>
                                    <hr>
                                    <div class="iv-right col-6 text-md-right">
                                        <span>No Referensi : {{ $kode->kode_unik }} </span>
                                    </div>
                                </div>
                                <hr>
                                <br>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="invoice-address">
                                        <address>
                                            <strong>Kasir :</strong><br>
                                            {{ Auth::user()->name }}
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <ul class="invoice-date">
                                        <li>Tanggal : </li>
                                        @include('function.tglIndo')
                                        {{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th colspan="2">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tctn as $t)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                            $t->product->barcode, 'C39')}}" height="20" width="100">
                                                    <span class="text-barcode">{{ $t->product->barcode }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $t->product->name }}</td>
                                            <td>IDR {{ number_format($t->product->selling_price,2,',','.') }}</td>
                                            <td>{{ $t->jumlah }}</td>
                                            <td>IDR {{ number_format($t->sub_total,2,',','.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Metode Pembayaran : Tunai</div>
                                    <div class="images">
                                    </div>
                                    <br>
                                    <span><i>Harga sudah termasuk PPN dan diskon toko kami.</i></span>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($total_tctn,2,',','.') }}</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Bayar</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($checkout->pay,2,',','.') }}</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Kembalian</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($checkout->kembalian,2,',','.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="invoice-buttons text-right">
                            <a href="#" class="btn btn-rounded btn-warning" onclick="window.print();"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
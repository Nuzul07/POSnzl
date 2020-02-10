@extends('layouts.parent')
@section('content')
<div class="page-wrapper">
    @include('sweetalert::alert')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Invoice</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Transaction</a></li>
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
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="invoice-buttons text-right">
                            <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modalCreate"><i class="fas fa-credit-card"></i> Pembayaran</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog confirm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('transactionDetail.store') }}" class="needs-validation" novalidate="">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total_tctn }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="hidden" name="metode_pay" value="Cash" class="selectgroup-input">
                                        <span class="selectgroup-button"><b>CASH</b></span>
                                </div>
                            </div>
                            <div id="cashContent">
                                <div class="form-group">
                                    <label>Bayar</label>
                                    <input type="text" class="form-control" name="pay" required="" placeholder="Bayar">
                                    <div class="invalid-feedback">
                                        Form Bayar harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
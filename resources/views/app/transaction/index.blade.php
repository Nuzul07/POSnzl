@extends ('layouts.parent')
@section ('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    @include('sweetalert::alert')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('transaction.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                <div class="col-lg-4 col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Choose Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Name Product</label>
                                <select class="custom-select mr-sm-2" id="selectProduct" name="product_id">
                                    <option value="">&mdash;</option>
                                    @foreach ($product as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="trDetailProduk" class="tr-detail-produk">
                                <p>Stok Tersisa : <b id="tr_stok">0</b></p>
                                <p>Harga : <b id="tr_harga">IDR 101011</b></p>
                                <span><i>Sudah termasuk PPN & Diskon toko</i></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div class="row">
                                <div class="col-11">
                                    <input type="number" class="form-control" value="1" name="jumlah" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Cart</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Barcode</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount</th>
                                            <th colspan="2">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tctn as $t)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                        $t->product->barcode, 'C39')}}" height="40" width="180">
                                                    <span class="text-barcode">{{ $t->product->barcode }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $t->product->name }}</td>
                                            <td>{{ $t->jumlah }}</td>
                                            <td>{{ $t->product->currency->currency }} {{ number_format($t->sub_total,2,',','.') }}</td>
                                            <td>
                                                <a href="#" data-uri="{{ route('transaction.destroy', $t->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="text-right">
                                <p class="h5">Total Price : <b>IDR {{ number_format($total_tctn,2,',','.') }}</b></p>
                            </div>
                            <hr>
                        </div>
                        <div class="card-footer text-right">
                            @if($total_tctn != 1)
                            <a class="btn btn-rounded btn-warning text-white" href="{{ route('clean') }}"><i class="fas fa-trash"></i> Clean Cart</a>&nbsp;
                            <a href="{{ route('transactionDetail.index') }}" class="btn btn-rounded btn-success btn-primary"><i class="fas fa-shopping-cart"> Checkout</i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section("scriptCustom")
<script>
    $('#trDetailProduk').hide()
    $('#selectProduct').change(function() {
        let _id = $(this).val()
        if (_id != "") {
            $.ajax({
                url: "{{ url('product') }}/" + _id,
                method: "GET",
                success: function(data) {
                    $('#tr_stok').html(data.stock)
                    $('#tr_harga').html("IDR " + data.selling_price)
                    $('#trDetailProduk').slideDown("slow")
                }
            })
        } else {
            $('#trDetailProduk').slideUp("slow")
        }
    })
</script>
@endsection
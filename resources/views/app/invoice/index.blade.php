@extends ('layouts.parent')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    @include('sweetalert::alert')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">History Transactions</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 c-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">History Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">History Transaction Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barcode</th>
                                        <th>Total Purchase</th>
                                        <th>Pay Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkout as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                 $c->kode_unik, 'C39')}}" height="20" width="100">
                                                <span class="text-barcode">{{ $c->kode_unik }}</span>
                                            </div>
                                        </td>
                                        <td>{{ number_format($c->total,2,',','.') }}</td>
                                        <td>
                                            <div class="badge badge-pill badge-primary">{{ $c->metode_pay }}</div>
                                        </td>
                                        <td><a href="{{ route('invoice.show', $c->kode_unik) }}" class="btn btn-success btn-sm">Show Detail</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
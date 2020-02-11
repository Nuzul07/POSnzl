@extends ('layouts.parent')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Products In</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Product In</li>
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
                        <h4 class="mb-0 text-white">Product In Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barcode</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                    $p->barcode, 'C39')}}" height="40" width="180">
                                                <span class="text-barcode">{{ $p->barcode }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->category->category }}</td>
                                        <td>{{ $p->stock }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('pdfproductIn') }}" class="btn btn-rounded btn-primary" style="color:#fff"><i class="far fa-file-pdf"></i> Export</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
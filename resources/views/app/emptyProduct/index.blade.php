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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Empty Stock</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Empty Stock</li>
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
                        <h4 class="mb-0 text-white">Empty Stock Data</h4>
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
                                        <th>Action</th>
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
                                        <td>{{ $p->category->id }}</td>
                                        <td>{{ $p->stock }}</td>
                                        <td style="text-align:center"><a href="#modalEdit{{$p->id}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{$p->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('pdfemptyProduct') }}" class="btn btn-rounded btn-primary" style="color:#fff"><i class="far fa-file-pdf"></i> Export</a>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($product as $p)
        <div id="modalEdit{{$p->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('emptyProduct.update', $p->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add Stock
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <label>Stock</label>
                            <div class="form-group">
                                <input type="text" name="stock" class="form-control" value="{{ $p->stock }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
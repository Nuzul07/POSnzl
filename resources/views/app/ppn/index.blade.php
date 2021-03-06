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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">PPN</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">PPN</li>
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
                        <h4 class="mb-0 text-white">PPN Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Minimum Stock</th>
                                        <th>PPN(%)</th>
                                        <th>Created at</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include("function.tglIndo")
                                    @foreach ($ppn as $p)
                                    @php
                                    $d = $p->created_at;
                                    $t = $d->format('Y-m-d');
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->stok_minimum }}</td>
                                        <td>{{ $p->ppn }}</td>
                                        <td>
                                            <div class="badge badge-pill badge-primary">{{ tgl_indo($t) }}</div>
                                        </td>
                                        <td style="text-align:center"><a href="#modalEdit{{$p->id}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{$p->id}}"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-uri="{{ route('ppn.destroy', $p->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#modalCreate" style="color:#fff">Add</a>
                        &nbsp;&nbsp;
                        <a href="{{ route('pdfppn') }}" class="btn btn-rounded btn-primary" style="color:#fff"><i class="far fa-file-pdf"></i> Export</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalCreate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('ppn.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add PPN
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <label>Minimum Stock</label>
                            <div class="form-group">
                                <input type="number" name="stok_minimum" class="form-control">
                            </div>
                            <label>PPN</label>
                            <div class="form-group">
                                <input type="number" name="ppn" class="form-control">
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
        @foreach ($ppn as $p)
        <div id="modalEdit{{$p->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('ppn.update', $p->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Edit PPN
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <label>Minimum Stock</label>
                            <div class="form-group">
                                <input type="text" name="stok_minimum" class="form-control" value="{{ $p->stok_minimum }}">
                            </div>
                            <label>PPN</label>
                            <div class="form-group">
                                <input type="text" name="ppn" class="form-control" value="{{ $p->ppn }}">
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
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Store Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Store Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('informasiToko.update', $info->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Photo</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                @if(!empty($info->photo))
                                <img class="card-img-top img-fluid" src="{{ asset('image/upload/toko/'. $info->photo) }}" id="blah1" alt="Card image cap">
                                @else
                                <img class="card-img-top img-fluid" src="{{ asset('image/upload/toko/noimage.png') }}" id="blah1" alt="Card image cap">
                                @endif
                                <br>
                                <br>
                                <div class="custom-file">
                                    <input type="file" class="form-control-file" id="exampleInputFile" name="photo" onchange="readURL1(this);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Store Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Store Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{ $info->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>POS Code</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="kode_pos" value="{{ $info->kode_pos }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="telepon" value="{{ $info->telepon }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Explanation</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keterangan" value="{{ $info->keterangan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="alamat" rows="5">{!! $info->alamat !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends ('layouts.parent')
@section ('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add User</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Users</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                <div class="col-lg-4 col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Photo</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img class="card-img-top img-fluid" src="{{ asset('image/upload/toko/noimage.png') }}" id="blah1" alt="Card image cap">
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
                            <h4 class="mb-0 text-white">User Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Level</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level_id">
                                                <option selected>Choose...</option>
                                                <option value="1">Admin Utama</option>
                                                <option value="2">Admin Gudang</option>
                                                <option value="3">Kasir</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="alamat" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
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
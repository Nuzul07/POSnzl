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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">My Profile</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Photo</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                @if(!empty($user->photo))
                                <img class="card-img-top img-fluid" src="{{ asset('image/upload/user/'. $user->photo) }}" id="blah1" alt="Card image cap">
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
                                        <label>Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Level</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level_id" disabled>
                                                <option selected value="{{ $user->level->id }}">{{ $user->level->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                            <textarea class="form-control" name="alamat" rows="5">{!! $user->alamat !!}</textarea>
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
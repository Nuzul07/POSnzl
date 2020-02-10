@extends ('layouts.parent')

@section ('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning &mdash; {{Auth::user()->name}}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                @php
                                $p = \App\Product::all()->count();
                                @endphp
                                <h2><span class="badge badge-dark">{{ $p }}</span></h2>
                            </div>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Products</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-box"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            @php
                            $u = \App\User::all()->count();
                            @endphp
                            <h2><span class="badge badge-success">{{ $u }}</span></h2>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Users</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-user"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                @php
                                $ep = \App\Product::where('stock', 0)->count();
                                @endphp
                                <h2><span class="badge badge-danger">{{ $ep }}</span></h2>
                            </div>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Empty Stock</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-ban"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            @php
                            $c = \App\Currency::all()->count();
                            @endphp
                            <h2><span class="badge badge-warning text-white">{{ $c }}</span></h2>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Currencies</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
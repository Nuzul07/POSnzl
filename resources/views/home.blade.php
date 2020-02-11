@extends ('layouts.parent')

@section ('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome &mdash; {{Auth::user()->name}}</h3>
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
                            $c = \App\TranscationDetail::all()->sum('total');
                            @endphp
                            <h2><span class="badge badge-warning text-white">IDR {{ number_format($c,2,',','.') }}</span></h2>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Sales</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->level_id == 1)
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $user = \App\User::all();
                                    @endphp
                                    @foreach ($user as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!empty($u->photo))
                                            <img src="{{ asset('image/upload/user/'.$u->photo) }}" alt="photo" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $u->name }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                                            @else
                                            <img src="{{ asset('image/upload/user/noneimage.png') }}" alt="photo" width="30" height="30" data-toggle="tooltip" data-original-title="None" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                                            @endif
                                        </td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->alamat }}</td>
                                        <td><span class="badge badge-pill badge-primary">{{ $u->level->name }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->level_id == 2)
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Product Data</h4>
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
                                        <th>Selling Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $product = \App\Product::all();
                                    @endphp
                                    @foreach ($product as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                 $p->barcode, 'C39')}}" height="20" width="100">
                                                <span class="text-barcode">{{ $p->barcode }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->category->id }}</td>
                                        <td>{{ $p->stock }}</td>
                                        <td>IDR {{ number_format($p->selling_price,2,',','.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->level_id == 3)
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $checkout = \App\TranscationDetail::all();
                                    @endphp
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
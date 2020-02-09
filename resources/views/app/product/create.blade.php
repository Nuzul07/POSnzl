@extends ('layouts.parent')
@section ('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cards</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                <div class="col-12">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Add Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name Product</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_id">
                                                <option selected>Choose...</option>
                                                @foreach($category as $c)
                                                <option value="{{ $c->id }}">{{ $c->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Stock</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="stock">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Currency</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="currency_id">
                                                <option selected>Choose...</option>
                                                @foreach ($currency as $curr)
                                                <option value="{{ $curr->id }}">{{ $curr->currency }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Unit</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="unit_id">
                                                <option selected>Choose...</option>
                                                @foreach ($unit as $u)
                                                <option value="{{ $u->id }}">{{ $u->unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Purchase Price</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="purchase_price">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Laba</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="laba">
                                                <option selected>Laba Percentage</option>
                                                @foreach ($profit as $pft)
                                                <option value="{{ $pft->id }}">{{ $pft->profit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-4">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">PPN</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="ppn">
                                                <option selected>Choose...</option>
                                                @foreach ($ppn as $ppnn)
                                                <option value="{{ $ppnn->id }}">{{ $ppnn->ppn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Discount</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="discount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Explanation</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="keterangan" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submiit</button>
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
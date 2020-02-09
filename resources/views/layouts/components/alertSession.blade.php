@if (session('alertStore'))
<center>
    <div style="position: absolute; top: 0; right: 0;">
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil menambah data</strong> {{ session('alertStore') }}
        </div>
    </div>
</center>
@elseif (session('alertUpdate'))
<div style="position: absolute; top: 0; right: 0;">
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Berhasil mengubah data</strong> {{ session('alertUpdate') }}
    </div>
</div>
@elseif (session('alertDelete'))
<center>
    <div class="col-md-4">
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil menghapus data</strong> {{ session('alertDelete') }}
        </div>
    </div>
</center>
@endif
@include("layouts.components.head")
<style>
    body {
        background-color: #fff !important;
    }

    .img-print img {
        width: 100px;
    }
</style>
<section class="section">
    <div class="print-padding d-flex flex-column text-left">
        <div class="text-center mt-3">
            <h1><span class="badge badge-primary">Report User Data</span></h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $user = \App\User::all();
                    @endphp
                    @foreach($user as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(!empty($u->photo))
                            <img src="{{ asset('image/upload/user/'.$u->photo) }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $u->name }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                            @else
                            <img src="{{ asset('image/upload/user/noneimage.png') }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="None" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                            @endif
                        </td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $u->level->name }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    window.print()
</script>
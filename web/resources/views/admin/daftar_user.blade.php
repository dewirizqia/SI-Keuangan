@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($suser->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($suser as $user)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $user->nama }}</a></td>
	                    @if($user->nip = 0)
	                    <td>{{ $user->nip }}</td>
	                    @else
	                    <td>-</td>
	                    @endif
	                    <td>{{ $user->jabatan }}</td>
	                    <td>{{ $user->email }}</td>
	                    <td>{{ $user->name }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Pagu Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
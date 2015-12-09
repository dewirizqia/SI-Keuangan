@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($sakun->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Akun</th>
                    <th>Uraian</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($sakun as $akun)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $akun->kode_akun }}</a></td>
	                    <td>{{ $akun->uraian_akun }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Akun Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
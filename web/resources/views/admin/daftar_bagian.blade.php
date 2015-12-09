@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($daftar_bagian->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($daftar_bagian as $bagian)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $bagian->bagian }}</a></td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Bagian Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
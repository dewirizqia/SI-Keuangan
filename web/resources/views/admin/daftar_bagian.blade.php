@extends('@layout.base_admin')

@section('isi')

<br>
<form role="form" method="POST" action="{{ route('tambah_bagian') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-md-3">
               <select class="form-control" name="bagian">
                    <option value="prodi">Prodi</option>
                    <option value="subbag">Sub Bagian</option>
                </select>
            </div>
            <div class="col-md-3">
               <input class="form-control" name="detail">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tambah Prodi/Bagian</button>
            </div>
        </div>
</form>
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
	                    <td><a href="">{{ $bagian->detail }}</a></td>
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
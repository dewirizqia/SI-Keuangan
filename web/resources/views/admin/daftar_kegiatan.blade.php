@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_kegiatan') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    

    <div class="form-group input-group">
        <label>Kode Kegiatan</label>
        <input class="form-control" name="kode_kegiatan">
    </div>

      <div class="form-group input-group">
        <label>Sumber Dana Kegiatan</label>
        <input class="form-control" name="sumberdana_kegiatan">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Kegiatan</b></h3>

	@if ($skegiatan->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Kegiatan</th>
                    <th>Sumber Dana Kegiatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($skegiatan as $kegiatan) 
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $kegiatan->kode_kegiatan}}</a></td>
	                    <td>{{ $kegiatan->sumberdana_kegiatan }}</td>
                          <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_kegiatan', $kegiatan->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_kegiatan', $kegiatan->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                                </td>
                            </table>
                        </td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Kegiatan Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')
<br>

<form role="form" method="POST" action="{{ route('simpan_akun')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
     
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group input-group">
        <label>Akun</label>
        <input class="form-control" name="kode_akun">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian_akun">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Akun</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Akun</b></h3>

	@if ($sakun->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Akun</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($sakun as $akun)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $akun->kode_akun }}</a></td>
	                    <td>{{ $akun->uraian_akun }}</td>
                        
                        <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_akun', $akun->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_akun', $akun->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
    <div class="panel-heading"><h3><center>Data Akun Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
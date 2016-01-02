@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_input')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
  
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
    <div class="form-group input-group">
        <label>Kode Input</label>
        <input class="form-control" name="kode_input">
    </div> 

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Komponen Input </button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Komponen Input</b></h3>

	@if ($sinput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Input</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($sinput as $input)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $input->kode_input }}</a></td>
	                    <td>{{ $input->uraian }}</td>

                        <td> 
                             <table> 
                                <td>
                                    <a href="{{ route('edit_input', $input->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_input', $input->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
    <div class="panel-heading"><h3><center>Data Input Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
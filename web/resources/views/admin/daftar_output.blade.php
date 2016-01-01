@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_output') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
   
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group input-group">
        <label>Kode Output</label>
        <input class="form-control" name="kode_output">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Output</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Output</b></h3>

	@if ($soutput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Output</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($soutput as $output)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $output->kode_output }}</a></td>
	                    <td>{{ $output->uraian }}</td>
                          <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_output', $output->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_output', $output->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
    <div class="panel-heading"><h3><center>Data Output Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
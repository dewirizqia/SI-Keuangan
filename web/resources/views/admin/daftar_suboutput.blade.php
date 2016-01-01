@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_suboutput')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group input-group">
        <label>Output</label>
        <input class="form-control" name="output">
    </div>

    <div class="form-group input-group">
        <label>Kode Sub Output</label>
        <input class="form-control" name="suboutput">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Sub Output</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Sub Output</b></h3>

	@if ($ssuboutput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Output</th>
                    <th>Kode Sub Output</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($ssuboutput as $suboutput)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $suboutput->output->uraian }}</a></td>
	                    <td><a href="">{{ $suboutput->kode_suboutput }}</a></td>
	                    <td>{{ $suboutput->uraian }}</td>

                        <td> 
                            <table> 
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="#" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Hapus">
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
    <div class="panel-heading"><h3><center>Data Sub Output Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_subinput')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group input-group">
        <label>Output</label>
        <input class="form-control" name="output">
    </div>

    <div class="form-group input-group">
        <label>Sub Output</label>
        <input class="form-control" name="suboutput">
    </div>

    <div class="form-group input-group">
        <label>Input</label>
        <input class="form-control" name="input">
    </div>

    <div class="form-group input-group">
        <label>Kode Sub Input</label>
        <input class="form-control" name="subinput">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Sub Komponen Input</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Sub Input</b></h3>

	@if ($ssubinput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Output</th>
                    <th>Sub Output</th>
                    <th>Input</th>
                    <th>Kode Sub Input</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($ssubinput as $subinput)
	                <tr>
	                    <td>{{ $no++ }}</td>
                        <td><a href="">{{ $subinput->input->sub_output->output->uraian }}</a></td>
                        <td><a href="">{{ $subinput->input->sub_output->uraian }}</a></td>
	                    <td><a href="">{{ $subinput->input->uraian }}</a></td>
	                    <td><a href="">{{ $subinput->kode_subinput }}</a></td>
	                    <td>{{ $subinput->uraian }}</td>
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
    <div class="panel-heading"><h3><center>Data Sub Input Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
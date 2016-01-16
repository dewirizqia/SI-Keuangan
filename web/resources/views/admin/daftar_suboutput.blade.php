@extends('@layout.base_admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')
<br>
@if($errors->count())
    <div class="col-md-12 alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    &nbsp
@endif
    
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Sub Output
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_suboutput') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  -->   
            {{ csrf_field() }}
            <div class="form-group">
                <label>Ouput</label>
                    <select class="form-control" name="id_output" id="output">
                        <option value="">--</option>
                        @foreach($soutput as $u_output)
                        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label class="col-md-1" background="">Satuan</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="satuan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1" background="">Kode Sub Ouput</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="kode_suboutput">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Uraian</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="uraian">
                </div>
            </div><br><br><br><br>
            <div class="form-group">
                <div  class="col-md-3">
                    <input type="submit" value="Tambahkan" class="form-control btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar Sub Output
    </div>
    <div class="panel-body">
    	@if ($ssuboutput->count())
    	<div class="dataTable_wrapper">                
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Output</th>
                        <th>Kode Sub Output</th>
                        <th>Uraian</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($ssuboutput as $suboutput)
    	                <tr>
    	                    <td>{{ $no++ }}</td>
    	                    <td>{{ $suboutput->output->uraian }}</td>
    	                    <td>{{ $suboutput->kode_suboutput }}</td>
                            <td>{{ $suboutput->uraian }}</td>
                            <td>{{ $suboutput->satuan }}</td>
                            <td> 
                                <table> 
                                    <td>
                                        <a href="{{ route('edit_suboutput', $suboutput->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>&nbsp</td>
                                    <td>
                                        <form method="POST" action="{{route('delete_suboutput', $suboutput->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token();?>"> -->
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
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
            <div class="panel-heading"><h3><center>Data Sub Output Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>


@stop

@section('script')
@parent
@stop
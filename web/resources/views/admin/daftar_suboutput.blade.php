@extends('@layout.base_admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')
<br>    
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Sub Output
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_suboutput') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label class="col-md-1" background="">Ouput</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_output" id="output">
                        <option value="">--</option>
                        @foreach($soutput as $u_output)
                        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1" background="">Kode Sub Ouput</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="Kode_suboutput">
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
                                        <a href="{{ route('edit_suboutput', $suboutput->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>&nbsp</td>
                                    <td>
                                        <form method="POST" action="{{route('delete_suboutput', $suboutput->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
            <div class="panel-heading"><h3><center>Data Sub Output Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>


@stop

@section('script')
@parent
@stop
@extends('@layout.base_admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')
<br>    
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Kode Output
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_output') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
            <div class="form-group">
                <label>Kegiatan</label>
                <select class="form-control" name="id_kegiatan" id="kegiatan">
                    <option value="">--</option>
                    @foreach($skegiatan as $kegiatan)
                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->sumberdana_kegiatan }}</option>
                    @endforeach
                </select>
            </div>  
            <div class="form-group">
                <label class="col-md-2" background="">Kode Ouput</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="kode_output">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Uraian</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="uraian">
                </div>
            </div><br><br><br>
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
        Daftar Kode Output
    </div>
    <div class="panel-body">
    	@if ($soutput->count())
    	<div class="dataTable_wrapper">                
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kegiatan</th>
                        <th>Kode Output</th>
                        <th>Uraian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($soutput as $output)
    	                <tr>
    	                    <td>{{ $no++ }}</td>
                            <td>{{ $output->kegiatan->sumberdana_kegiatan }}</td>
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
            <div class="panel-heading"><h3><center>Data Output Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>



@stop

@section('script')
@stop
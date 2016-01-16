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
        Tambah Kode Akun
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_akun') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label class="col-md-2" background="">Kode Akun</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="kode_akun">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Uraian</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="uraian_akun">
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
        Daftar Kode Akun
    </div>
    <div class="panel-body">
    	@if ($sakun->count())
            <div class="dataTable_wrapper">                
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
            <div class="panel-heading"><h3><center>Data Akun Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>
@stop

@section('script')
@stop
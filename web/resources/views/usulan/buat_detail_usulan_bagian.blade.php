@extends('@layout.base_keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop


@section('isi')
<br>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <strong>Whoops!</strong> Sepertinya ada kesalahan.<br><br>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

<form role="form" method="POST" action="" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

    <div class="form-group">
    	<label>Komponen</label>
    <select class="form-control" name="komponen">
        <option value="utama">Utama</option>
        <option value="pendukung">Pendukung</option>
    </select>
    </div>

    <div class="form-group">
        <label>Detail</label>
        <input class="form-control" name="detail">
    </div>

    <div class="form-group">
    	<label>Harga Satuan</label>
         <input class="form-control" name="harga">
    </div>

    <div class="form-group">
    	<label>KOMPONEN INPUT</label>
    <select class="form-control" name="input">
    	@foreach($input as $u_input)
        <option value="{{ $u_input->id }}">{{ $u_input->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB KOMPONEN INPUT</label>
    <select class="form-control" name="sub_input">
    	@foreach($subinput as $u_subinput)
        <option value="{{ $u_subinput->id }}">{{ $u_subinput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>AKUN</label>
    <select class="form-control" name="akun">
    	@foreach($akun as $u_akun)
        <option>{{ $u_akun->uraian_akun }}</option>
        @endforeach
    </select>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Tambah Detail</button>
</form>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop


@section('script')
<!-- jQuery -->
<script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- DataTables JavaScript -->
    <script src="{{ asset('css/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

 
@stop

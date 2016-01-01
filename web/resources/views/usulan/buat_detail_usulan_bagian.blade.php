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
    <select class="form-control" name="jenis_komponen">
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
         <input class="form-control" name="harga_satuan">
    </div>

    <div class="form-group">
        <div class="col-md-3">
    	   <label>Nominal</label>
           <input class="form-control" name="nom1">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Satuan</label>
           <input class="form-control" name="sat1">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Nominal</label>
           <input class="form-control" name="nom2">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Satuan</label>
           <input class="form-control" name="sat2">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Nominal</label>
           <input class="form-control" name="nom3">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Satuan</label>
           <input class="form-control" name="sat3">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Nominal</label>
           <input class="form-control" name="nom4">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
           <label>Satuan</label>
           <input class="form-control" name="sat4">
        </div>
    </div>
    <div class="form-group">
        <label>Jumlah Rincian</label>
        <input class="form-control" name="jumlah_rincian">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input class="form-control" name="jumlah">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Tambah Detail</button>
</form>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Detail Usulan Tahun:
                            <br>Akun: {{ $d_akun->uraian_akun }}, 
                            <br>Sub Komponen Input: {{ $d_subinput->uraian }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Komponen</th>
                                            <th>Detail</th>
                                            <th>Harga Satuan</th>
                                            <th>Nominal x Satuan</th>
                                            <th>Jumlah Rincian</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail as $data)
                                        <tr class="odd gradeX">
                                            <td>{{ $data->jenis_komponen }}</td>
                                            <td>{{ $data->detail }}</td>
                                            <td>{{ $data->harga_satuan }}</td>
                                            <td class="center">
                                                @foreach ($data->rincian as $rincian)
                                                        {{ $rincian->nominal }} {{ $rincian->satuan }}  
                                                @endforeach
                                            </td>
                                            <td class="center">{{ $data->jumlah_rincian }}</td>
                                            <td class="center">{{ $data->jumlah }}</td>
                                        </tr>
                                        @endforeach
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

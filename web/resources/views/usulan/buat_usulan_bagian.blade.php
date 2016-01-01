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

<form role="form" method="POST" action="{{ route('nilai_detail', $usulan->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

	<div class="form-group">
        <label>Tahun</label>
        <input class="form-control" name="tahun" value="{{ $usulan->tahun }}" disabled>
    </div>

    <div class="form-group">
    	<label>OUTPUT</label>
    <select class="form-control" name="output">
    	@foreach($output as $u_output)
        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB OUTPUT</label>
     <select id="suboutput" class="form-control" name="sub_output">
    	@foreach($suboutput as $u_suboutput)
        <option value="{{ $u_suboutput->id }}">{{ $u_suboutput->uraian }}</option>
        @endforeach
    </select>
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
        <option value="{{ $u_akun->id }}">{{ $u_akun->uraian_akun }}</option>
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
                            Daftar Detail Usulan Tahun:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sub Input</th>
                                            <th>Akun</th>
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
                                            <td>{{ $data->sub_input->uraian }}</td>
                                            <td>{{ $data->akun->uraian_akun }}</td>
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

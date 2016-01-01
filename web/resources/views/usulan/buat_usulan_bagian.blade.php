@extends('home.keuangan')

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
    <select class="form-control" name="output" id="output">
        <option value="">--</option>
    	@foreach($output as $u_output)
        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB OUTPUT</label>
     <select class="form-control" name="sub_output" id="sub_output">
        <option value="">--</option>
    	@foreach($suboutput as $u_suboutput)
        <option value="{{ $u_suboutput->id }}" class="{{ $u_suboutput->id_output }}">{{ $u_suboutput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>KOMPONEN INPUT</label>
    <select class="form-control" name="input" id="input">
        <option value="">--</option>
    	@foreach($input as $u_input)
        <option value="{{ $u_input->id }}" class="{{ $u_input->id_suboutput }}">{{ $u_input->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB KOMPONEN INPUT</label>
    <select class="form-control" name="sub_input" id="sub_input">
        <option value="">--</option>
    	@foreach($subinput as $u_subinput)
        <option value="{{ $u_subinput->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>AKUN</label>
    <select class="form-control" name="akun">
        <option value="">--</option>
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
                                            <th>Output</th>
                                            <th>Sub Output</th>
                                            <th>Input</th>
                                            <th>Sub Input</th>
                                            <th>Akun</th>
                                            <th>Komponen</th>
                                            <th>Detail</th>
                                            <th>Harga Satuan</th>
                                            <th>Nominal</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail as $data)
                                        <tr class="odd gradeX">
                                            <td>{{ $data->sub_input->input->sub_output->output->uraian }}</td>
                                            <td>{{ $data->sub_input->input->sub_output->uraian }}</td>
                                            <td>{{ $data->sub_input->input->uraian }}</td>
                                            <td>{{ $data->sub_input->uraian }}</td>
                                            <td>{{ $data->akun->kode_akun }} - {{ $data->akun->uraian_akun }}</td>
                                            <td>{{ $data->jenis_komponen }}</td>
                                            <td>{{ $data->detail }}</td>
                                            <td>{{ $data->harga_satuan }}</td>
                                            <td>{{ $data->nominal }} {{ $data->satuan }}</td>
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
                responsive: true,
                "scrollX": true
        });
    });
    </script>
<!-- script dropdown select -->
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/jquery.min.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-1.0.1.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-selector.js') }}"></script>

<script src="{{ asset('css/js/jquery.chained.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
/* For jquery.chained.js */

    $("#sub_output").chained("#output");
    $("#input").chained("#sub_output");
    $("#sub_input").chained("#input");


    $("#sub_input").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#input")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

  });
</script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-1.0.1.js') }}"></script>
  <xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-selector.js') }}"></script>

<script src="{{ asset('css/js/jquery.chained.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
/* For jquery.chained.js */

    $("#sub_output").chained("#output");
    $("#input").chained("#sub_output");
    $("#sub_input").chained("#input");


    $("#sub_input").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#input")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

  });
</script>
@stop

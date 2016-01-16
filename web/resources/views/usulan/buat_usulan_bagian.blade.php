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
        <option value="{{ $u_akun->id }}">({{ $u_akun->kode_akun }})  {{ $u_akun->uraian_akun }}</option>
        @endforeach
    </select>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Tambah Detail</button>
    <button class="btn btn-primary"><a href="{{ route('status_usulan', $usulan->id) }}">Selesai</a></button>
</form>
<br>
<br>

<br>
<br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Detail Usulan Tahun:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if ($detail->count())
                            <div class="dataTable_wrapper">
                                <form id="calx">
                                <table class="table table-striped table-bordered table-hover" id="usulan" class="display">
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                        @foreach($detail as $data)
                                        <tr class="odd gradeX">
                                            <td title="{{ $data->sub_input->input->sub_output->output->uraian }}">{{ $data->sub_input->input->sub_output->output->kode_output }}</td>
                                            <td title="{{ $data->sub_input->input->sub_output->uraian }}">{{ $data->sub_input->input->sub_output->kode_suboutput }}</td>
                                            <td title="{{ $data->sub_input->input->uraian }}">{{ $data->sub_input->input->kode_input }}</td>
                                            <td title="{{ $data->sub_input->uraian }}">{{ $data->sub_input->kode_subinput }}</td>
                                            <td title="{{ $data->akun->uraian_akun }}">{{ $data->akun->kode_akun }}</td>
                                            <td>{{ $data->jenis_komponen }}</td>
                                            <td>{{ $data->detail }}</td>
                                            
                                            <td id="harga[{{$no++}}]" data-format="0,0[.]00">{{ $data->harga_satuan }}</td>
                                            <td >{{ $data->nominal }} {{ $data->satuan }}</td>
                                            <td class="center" id="jumlah[{{$no++}}]" data-format="0,0[.]00">{{ $data->jumlah }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </form>
                            </div>
                            <!-- /.table-responsive -->
                            @else
                                <div class="panel-heading"><h3><center>Data Detail Usulan Belum di Tambahkan</center></h3></div>
                            @endif
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop


@section('script')
@parent
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

<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#usulan').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
    <script src="css/jquery-calx-1.1.9.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
    });
    </script>
@stop

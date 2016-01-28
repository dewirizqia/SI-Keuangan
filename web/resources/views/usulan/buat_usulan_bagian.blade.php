@extends('home.admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
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

<form id="calx" role="form" method="POST" action="{{ route('simpan_usulan_bagian', $usulan->id)}}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

	<div class="form-group">
        <label>Tahun</label>
        <input class="form-control" name="tahun" value="{{ $usulan->tahun }}" disabled>
    </div>

    <div class="form-group">
        <label>SUB KOMPONEN INPUT</label>
    <select class="form-control" name="id_subinput">
        <option value="">--</option>
        @foreach($subinput as $u_subinput)
        <option value="{{ $u_subinput->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
        <label>AKUN</label>
    <select class="form-control" name="id_akun">
        <option value="">--</option>
        @foreach($akun as $u_akun)
        <option value="{{ $u_akun->id }}">({{ $u_akun->kode_akun }})  {{ $u_akun->uraian_akun }}</option>
        @endforeach
    </select>
    </div>

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
             <input class="form-control" name="harga_satuan" id="harga_satuan">
        </div>
        <div class="form-group">
            <div class="col-md-6">
            <label>Nominal</label> 
            <input class="form-control" name="nominal" id="nominal"> 
            </div>    
        </div>
        <div class="form-group">
            <div class="col-md-6">
               <label>Satuan</label>
               <input class="form-control" name="satuan">
            </div>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input class="form-control" name="jumlah" id="jumlah" data-formula="$harga_satuan*$nominal">
        </div>
    <br>
    <button type="submit" class="btn btn-primary">Tambah Detail</button>
    </form>
    <form role="form" method="POST" action="{{ route('status_usulan', $usulan->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button class="btn btn-primary" type="submit" value="Selesai">Selesai</button>
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

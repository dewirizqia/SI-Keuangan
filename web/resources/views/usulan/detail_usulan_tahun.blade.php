@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop


@section('isi')
<div class="panel panel-primary">
    <div class="panel-heading">
        Rincian Anggaran RAB Tahun: {{ $tahun }}
    </div>
    <div class="panel-body">
        Total = Rp. {{ number_format($total_rab, 0, ',', '.')}}
    </div>
</div>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Detail Usulan Tahun: {{$tahun}}                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if ($daftar_usulan->count())
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="rab" class="display">
                                    <thead>
                                        <tr>
                                            <th>Prodi/Bagian</th>
                                            <th>Output</th>
                                            <th>Sub Output</th>
                                            <th>Input</th>
                                            <th>Sub Input</th>
                                            <th>Akun</th>
                                            <th>Detail</th>
                                            <th>Harga Satuan</th>
                                            <th>Nominal</th>
                                            <th>Jumlah</th>
                                            @if (Auth::user()->hasRole('subbag'))
					                        <th>Aksi</th>
					                        @else
					                        @endif
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Prodi/Bagian</th>
                                            <th>Output</th>
                                            <th>Sub Output</th>
                                            <th>Input</th>
                                            <th>Sub Input</th>
                                            <th>Akun</th>
                                            <th>Detail</th>
                                            <th>Harga Satuan</th>
                                            <th>Nominal</th>
                                            <th>Jumlah</th>
                                            @if (Auth::user()->hasRole('subbag'))
					                        <th>Aksi</th>
					                        @else
					                        @endif
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        @foreach($daftar_usulan as $dusulan)
                                            @foreach($dusulan->detail_usulan as $rincian)
                                            <tr class="odd gradeX">
                                            <td title="">{{ $rincian->usulan->ke_bagian->detail }}</td>
                                            <td title="{{ $rincian->sub_input->input->sub_output->output->uraian }}">{{ $rincian->sub_input->input->sub_output->output->kode_output }}</td>
                                            <td title="{{ $rincian->sub_input->input->sub_output->uraian }}">{{ $rincian->sub_input->input->sub_output->kode_suboutput }}</td>
                                            <td title="{{ $rincian->sub_input->input->uraian }}">{{ $rincian->sub_input->input->kode_input }}</td>
                                            <td title="{{ $rincian->sub_input->uraian }}">{{ $rincian->sub_input->kode_subinput }}</td>
                                            <td title="{{ $rincian->akun->uraian_akun }}">{{ $rincian->akun->kode_akun }}</td>
                                            <td>{{ $rincian->detail }}</td>
                                            <td>Rp. {{ number_format($rincian->harga_satuan, 0, ',', '.')}}</td>
                                            <td>{{ number_format($rincian->nominal, 0, ',', '.')}} {{ $rincian->satuan }}</td>
                                            <td class="center">Rp. {{ number_format($rincian->jumlah, 0, ',', '.')}}</td>
                                            @if (Auth::user()->hasRole('subbag'))
					                        <td> 
					                            <table> 
					                            	<tr>
						                            	<td><a href="{{ route('detail_usulan_edit', $rincian->id) }}" class="btn btn-primary">Edit</a></td>
						                                <td>
						                                    <form method="POST" action="{{ route('detail_usulan_delete', $rincian->id) }}" accept-charset="UTF-8" style="margin:0 auto">
						                                        <input name="_method" type="hidden" value="DELETE">
						                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
						                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
						                                    </form> 
						                                </td>
					                                </tr>
					                            </table>
					                        </td>
					                        @else
					                        </td>
					                        @endif
                                            </tr>
                                            
                                            @endforeach
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#rab').DataTable( {
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
@stop

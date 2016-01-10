@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')
<br>
<div class="panel panel-primary">
<form role="form" method="POST" action="{{ route('tambah_rkakl') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <!-- <input type="hidden" name="_token" value="<? php echo csrf_token(); ?>"> -->
    {{ csrf_field() }}
        <div class="form-group">
            <div class="col-md-3">
               <select class="form-control" name="id_pagu">
			        <option value="">--</option>
			    	@foreach($spagu as $pagu)
			        <option value="{{ $pagu->id }}">{{ $pagu->tahun }}</option>
			        @endforeach
			    </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tambah RKAKL</button>
            </div>
        </div>
</form>

<br>
<br>
<br>
</div>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar Usulan
    </div>
    <div class="panel-body">
        @if ($dftr_rkakl->count())
        <div class="dataTable_wrapper">                
            <form id="calx">
            <table class="table table-striped table-bordered table-hover" id="usulan" class="display">
                <thead>
	                <tr>
	                    <th>NO</th>
	                    <th>TAHUN</th>
	                    <th>REVISI</th>
	                    <th>DETAIL</th>
	                    <th>Aksi</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>NO</th>
	                    <th>TAHUN</th>
	                    <th>REVISI</th>
	                    <th>DETAIL</th>
	                    <th>Aksi</th>
	                </tr>
	            </tfoot>
            <tbody>
                @foreach($dftr_rkakl as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->pagu->tahun }}</td>
                        <td>{{ $data->revisi }}</td>
                        <td><a href="{{ route('buat_rkakl', $data->id) }}">detail</a></td>
                        <td> 
                            <table> 
                                <td>
                                    <form method="POST" action="" accept-charset="UTF-8" style="margin:0 auto">
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
            </form>
        </div>
        @else
            <div class="panel-heading"><h3><center>Data RKAKL Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>
@stop


@section('script')
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
@stop
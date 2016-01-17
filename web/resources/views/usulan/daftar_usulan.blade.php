@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')
<br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar Usulan
    </div>
    <div class="panel-body">
        @if ($dftrusulan->count())
        <div class="dataTable_wrapper">                
            <form id="calx">
            <table class="table table-striped table-bordered table-hover" id="usulan" class="display">
                <thead>
	                <tr>
	                    <th>NO</th>
	                    <th>TAHUN</th>
	                    <th>PRODI/BAGIAN</th>
	                    <th>STATUS</th>
	                    <th>REVISI</th>
	                    <th>DETAIL</th>
	                    <th>Aksi</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>NO</th>
	                    <th>TAHUN</th>
	                    <th>PRODI/BAGIAN</th>
	                    <th>STATUS</th>
	                    <th>REVISI</th>
	                    <th>DETAIL</th>
	                    <th>Aksi</th>
	                </tr>
	            </tfoot>
            <tbody>
                @foreach($dftrusulan as $usulan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="{{ route('detail_usulan_tahun', $usulan->tahun) }}">{{ $usulan->tahun }}</a></td>
                        <td>{{ $usulan->ke_bagian->detail }}</td>
                        <td>{{ $usulan->status }}</td>
                        <td>{{ $usulan->revisi }}</td>
                        <td><button><a href="">detail</a></button>
                        	<button><a href="{{ route('excelrab',$usulan->id) }}">Download</a></button>
                        </td>
                        <td> 
                            <table> 
                                <td>
                                    <form method="POST" action="{{route('delete_usulan', $usulan->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
            <div class="panel-heading"><h3><center>Data Usulan Belum di Tambahkan</center></h3></div>
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
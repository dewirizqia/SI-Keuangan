@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')
<br>
@if(Auth::user()->hasRole('subbag'))
    <div class="panel panel-primary">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Sepertinya ada yang salah.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('pesan'))
             <div class="alert alert-info">
                <h3>{{ Session::get('pesan') }}</h3>
             </div>   
        @endif
    <form role="form" method="POST" action="{{ route('tambah_rkakl') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
        <!-- <input type="hidden" name="_token" value="<? php echo csrf_token(); ?>"> -->
        {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-3">
                   <select class="form-control" name="tahun">
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
@else
@endif


<br>
<br>
<br>
</div>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar RKA-KL
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
                        @if (Auth::user()->hasRole('subbag'))
                        <th>Aksi</th>
                        @else
                        @endif
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                    <th>NO</th>
	                    <th>TAHUN</th>
	                    <th>REVISI</th>
	                    <th>DETAIL</th>
                        @if (Auth::user()->hasRole('subbag'))
                        <th>Aksi</th>
                        @else
                        @endif
	                </tr>
	            </tfoot>
            <tbody>
                @foreach($dftr_rkakl as $data)
                    <tr>
                        <td width="30px">{{ $no++ }}</td>
                        <td>{{ $data->pagu->tahun }}</td>
                        <td>{{ $data->revisi }}</td>
                        <td><a href="{{ route('buat_rkakl', $data->id) }}" class="btn btn-primary">detail</a>
                        @if (Auth::user()->hasRole('subbag'))
                        <a href="{{ route('excelrkakl', $data->id) }}" class="btn btn-success">Download</a></td>
                        <td> 
                            <table> 
                                <td>
                                   <form method="POST" action="{{route('delete_rkakl', $data->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete RKAKL">
                                    </form> 
                                </td>
                            </table>
                        </td>
                        @else
                        </td>
                        @endif

                        
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
@extends('home.keuangan')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
@section('isi')
<br>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            @if ($daftar_pagu_output->count())
            <div class="panel-heading">
                Daftar Pagu Output:                            
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <form id="calx">
                    <table class="table table-bordered table-hover table-striped" id="pagu-output">
                    <thead>
                        <tr>
                            <th width=50px>NO</th>
                            <th>Tahun</th>
                            <th>Output</th>
                            <th>Pagu Output</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar_pagu_output as $pagu_output)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pagu_output->ke_pagu->tahun }}</td>
                                <td><a href="{{ route('detail_pagu_output', $pagu_output->id)}}">{{ $pagu_output->ke_output->uraian }}</a></td>
                                <td>Rp. {{ number_format($pagu_output->jumlah, 0, ',', '.')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </form>
                </div>
                <!-- /.table-responsive -->
            </div>

            @else
                <div class="panel-heading"><h3><center>Data Pagu Belum di Tambahkan<center></h3></div>
            @endif
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop

@section('script')
@parent
<script type="text/javascript">
$(document).ready(function(){
    $('#calx').calx();
});
</script>
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#pagu-output').DataTable( {
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
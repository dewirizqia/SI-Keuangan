@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop


@section('isi')
<div class="panel panel-primary">
    <div class="panel-heading">
        Rincian Anggaran RKA-KL Tahun: {{ $rkakl->pagu->tahun }}
    </div>
    <div class="panel-body">
	    Total = Rp. {{ number_format($total, 0, ',', '.')}}
	    @if($total > 0)
            <button class="btn btn-primary"><a href="{{ route('rkakl_selesai', $rkakl->id) }}">RKA-KL Selesai</a></button>           
        @else
        
        @endif

    </div>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Detail RKA-KL Tahun: {{ $rkakl->pagu->tahun }}
        <br>Akun: {{ $d_akun->uraian_akun }}, 
        <br>Sub Komponen Input: {{ $d_subinput->uraian }}
    </div>
    <div class="panel-body">

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

    <form role="form" id="calx" method="POST" action="" accept-charset="UTF-8" enctype ="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
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
            <input class="form-control" name="volume" id="volume">
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
            <input class="form-control" name="jumlah_biaya" id="jumlah_biaya" data-formula="$harga_satuan*$volume">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Tambah Detail</button>
        

    </form>
    <br><button class="btn btn-primary"><a href="{{ route('buat_rkakl', $rkakl->id) }}">Kembali</a></button>   
    </div>
</div>




<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Detail RKA-KL Tahun: {{ $rkakl->pagu->tahun }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
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
                                            <th>Detail</th>
                                            <th>Volume Satuan</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah Biaya</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($detail as $data)
                                        <tr class="odd gradeX">
                                            <td>{{ $data->sub_input->input->sub_output->output->uraian }}</td>
                                            <td>{{ $data->sub_input->input->sub_output->uraian }}</td>
                                            <td>{{ $data->sub_input->input->uraian }}</td>
                                            <td>{{ $data->sub_input->uraian }}</td>
                                            <td>({{ $data->akun->kode_akun }}) {{ $data->akun->uraian_akun }}</td>
                                            <td>{{ $data->detail }}</td>
                                            <td>{{ $data->volume }} {{ $data->satuan }}</td>
                                            <td>{{ $data->harga_satuan }}</td>
                                            <td class="center">{{ $data->nominal }} {{ $data->satuan }}</td>
                                            <td class="center">{{ $data->jumlah_biaya }}</td>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
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
@stop

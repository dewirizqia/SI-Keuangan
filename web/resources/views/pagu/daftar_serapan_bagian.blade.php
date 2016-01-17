@extends('home.admin')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
@stop
@section('isi')

<!--     <div class="panel panel-red">
        <div class="panel-heading">
            Red Panel
        </div>
        <div class="panel-body">
            <h3>ISI PESAN</h3>
        </div>
    </div>
 -->

<div class="panel panel-primary">
    <div class="panel-heading">
        Serapan Dana {{ $bagian->detail }}
    </div>
</div> 
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if ($daftar_pagu_bagian->count())
                        <div class="panel-heading">
                            Daftar Pagu Bagian:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form id="calx">
                                <table class="table table-bordered table-hover table-striped" id="dataTables-example">
            <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Tahun</th>
                    <th>Alokasi</th>
                    <th>Pagu</th>
                    <th>Sisa Pagu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_pagu_bagian as $pagu_bagian)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pagu_bagian->ke_pagu->tahun }}</td>
                        <td>Rp. {{ number_format($pagu_bagian->jumlah, 0, ',', '.')}}</td>
                        <td>Rp. {{ number_format($pagu_bagian->pagu, 0, ',', '.')}}</td>
                        <td>Rp. {{ number_format($pagu_bagian->sisa, 0, ',', '.')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                                </form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        @else
                            <div class="panel-heading"><h3><center>Data Pagu Prodi/Bagian Belum di Tambahkan<center></h3></div>
                        @endif
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

@stop
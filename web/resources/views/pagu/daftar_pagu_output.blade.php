@extends('home.keuangan')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@section('isi')
<br>
<br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if ($daftar_pagu_output->count())
                        <div class="panel-heading">
                            Daftar Pagu Output:                            
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
                    <th>Output</th>
                    <th>Pagu Output</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_pagu_output as $pagu_output)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="">{{ $pagu_output->pagu->tahun }}</a></td>
                        <td><a href="">{{ $pagu_output->ke_output->uraian }}</a></td>
                        <td><a href="">{{ $pagu_output->jumlah }}</a></td>
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
@stop
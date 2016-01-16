@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
@stop
@section('isi')

<div class="panel panel-primary">
    <div class="panel-heading">
        Detail Pagu {{$output}} Tahun: {{$tahun}}
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-md-1">Alokasi</label>
            <label class="col-md-3">: Rp. {{ number_format($alokasi, 0, ',', '.')}}</label>                        
            <label class="col-md-1">Pagu</label>
            <label class="col-md-3">: Rp. {{ number_format($jpagu, 0, ',', '.')}}</label>
            <label class="col-md-1">Sisa Pagu</label>
            <label class="col-md-3">: Rp. {{ number_format($sisa, 0, ',', '.')}}</label>
        </div>&nbsp
    </div>
</div>
        
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                                            <th>Bagian</th>
                                            <th>Pagu Output</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($daftar_pagu_output as $pagu_output)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pagu_output->ke_pagu->tahun }}</td>
                                                <td><a href="{{ route('detail_pagu_output', $pagu_output->id)}}">{{ $pagu_output->ke_output->uraian }}</a></td>
                                                <td>Rp. {{ number_format($pagu_output->jumlah, 0, ',', '.')}}</td>
                                                <td> 
                                                    <table> 
                                                        <td>
                                                            <a href="" class="btn btn-primary">Edit</a>
                                                        </td>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </form>
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
@parent
@stop
@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Belanja</h1>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-body">	
    	<a href="{{ route('belanja_buat') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah Belanja
        </a>
        <br><br>
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Sub Bagian/Program Studi</th>
                        <th>Nomor Tanda Bukti</th>
                        <th>Tanggal</th>
                        <th>Nomor BKU</th>
                        <th>Kode MA</th>
                        <th>MAK</th>
                        <th>Penerima</th>
                        <th>Uraian</th>
                        <th>Jumlah (Rp.)</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar_belanja as $belanja)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $belanja -> status }}</td>
                        <td>{{ $belanja -> user->ke_bagian->detail}}</td>
                        <td>{{ $belanja -> no_tanda_bukti }}</td>
                        <td>{{ $belanja -> tgl }}</td>
                        <td>{{ $belanja -> no_bku }}</td>
                        <td>{{ $belanja -> Kode_MA }}</td>
                        <td>{{ $belanja -> MAK }}</td>
                        <td>{{ $belanja -> penerima }}</td>
                        <td>{{ $belanja -> uraian }}</td>
                        <td>{{ number_format($belanja -> jumlah, 0, ',', '.') }}</td>
                        <td style="text-align:center;vertical-align:middle">
                            <a href="{{ route('belanja_komentar', $belanja->id) }}" class="btn btn-success">Lihat</a>
                        </td>              
                        <td style="text-align:center;vertical-align:middle">
                            <table margin="0">
                            <tr><td>
                                    <a href="{{ route('belanja_edit', $belanja->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{ route('belanja_delete', $belanja->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                            </td></tr>
                            </table>                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('script')
@parent

@stop
@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar SPJ LS</h1>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-body">	
        @if(Auth::user()->hasRole('bpp'))
    	<a href="{{ route('spjls_buat') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah SPJ
        </a>
        @else
        @endif
        <br><br>
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Subbag/ Prodi</th>
                        <th>Kode Anggaran</th>
                        <th>Kode Akun</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Nama Kegiatan</th>
                        <th>Detail</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar_spjls as $spjls)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $spjls -> ke_bagian->detail}}</td>
                            <td>{{ $spjls -> kode_anggaran}}</td>
                            <td>{{ $spjls -> kode_akun}}</td>
                            <td>{{ $spjls -> no_sk}}</td>
                            <td>{{ $spjls -> tgl_sk}}</td>
                            <td>{{ $spjls -> nama_kegiatan}}</td>
                            <td style="text-align:center;vertical-align:middle">
                                <table>
                                <tr>
                                <td>
                                    <a href="{{ route('spjls_detail', $spjls->id) }}" class="btn btn-primary" class="btn btn-link">Lihat</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <a href="{{ route('excells', $spjls->id) }}" class="btn btn-success">Download</a>
                                </td>
                                </tr>
                                </table>
                            </td>
                            <td style="text-align:center;vertical-align:middle">
                                <a href="{{ route('spjls_komentar', $spjls->id) }}" class="btn btn-success">Lihat</a>
                            </td>
                            <td style="text-align:center;vertical-align:middle">
                                <table margin="0">
                                 <tr>
                                    <td>
                                        <a href="{{ route('spjls_edit', $spjls->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>&nbsp</td>
                                    <td>
                                        <form method="POST" action="{{ route('spjls_delete', $spjls->id) }}">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                            <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                        </form>
                                    </td>
                                </tr>
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
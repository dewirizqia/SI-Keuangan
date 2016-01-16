@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Daftar Nominatif s</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="{{ route('excelnominatif',$spjls->id) }}" method="GET" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-2">Subbag/ Prodi</label>
                        <label class="col-md-4">: {{ $spjls->ke_bagian->detail}}</label>                        
                        <label class="col-md-2">Kode Anggaran</label>
                        <label class="col-md-4">: {{ $spjls->kode_anggaran}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Nomor SK</label>
                        <label class="col-md-4">: {{ $spjls -> no_sk}}</label>
                        <label class="col-md-2">Nama Kegiatan</label>
                        <label class="col-md-4">: {{ $spjls -> nama_kegiatan}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Jumlah Penerima</label>
                        <label class="col-md-4">: {{ $jumlah_penerima}}</label>
                        <label class="col-md-2">Banyaknya</label>
                        <label class="col-md-4">: Rp. {{ number_format($jumlah_kotor, 0, ',', '.') }}</label>
                    </div>&nbsp    
                    <div class="col-md-6">
                            <input type="submit" value="Export to Excel" class="form-control btn-success">
                    </div>                
                </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jumlah Hari</th>
                                <th>Satuan (Rp.)</th>
                                <th>Banyaknya (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_detail as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->nama}}</td>
                                    <td>{{ $detail->jabatan}}</td>
                                    <td>{{ $detail->jlh_hari}}</td>
                                    <td>{{ number_format($detail->satuan, 0, ',', '.') }}</td>
                                    <td>{{ number_format($detail->terima, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')

@stop 
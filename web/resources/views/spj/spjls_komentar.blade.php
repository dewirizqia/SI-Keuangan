@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Komentar SPJ LS</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-2">Subbag/ Prodi</label>
                        <label class="col-md-4">: {{ $spjls->ke_bagian->detail}}</label>                        
                        <label class="col-md-2">Kode Anggaran</label>
                        <label class="col-md-4">: {{ $spjls->kode_anggaran}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Nomor SK</label>
                        <label class="col-md-3">: {{ $spjls -> no_sk}}</label>
                        <label class="col-md-1">Nama Kegiatan</label>
                        <label class="col-md-3">: {{ $spjls -> nama_kegiatan}}</label>
                        <label class="col-md-1">Jumlah Penerima</label>
                        <label class="col-md-3">: {{ $spjls -> jmlh_penerima}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Jumlah Kotor</label>
                        <label class="col-md-3">: Rp. {{ number_format($spjls -> jmlh_kotor, 0, ',', '.') }}</label>
                        <label class="col-md-1">PPh</label>
                        <label class="col-md-3">: Rp. {{ number_format($spjls -> pph, 0, ',', '.') }}</label>
                        <label class="col-md-1">Jumlah Bersih</label>
                        <label class="col-md-3">: Rp. {{ number_format($spjls -> jmlh_bersih, 0, ',', '.') }}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Keterangan</label>
                        <label class="col-md-3">: {{ $spjls -> keterangan}}</label>                    
                    </div>&nbsp
                </form>
            </div>
        </div>
    </div>
</div>

@if($errors->count())
    <div class="col-md-12 alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="{{ route('spjls_komentar_simpan') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="jenis" value="LS">
                    <input type="hidden" name="id_jenis" value="{{ $spjls->id }}">
                    <div class="form-group">
                        <label class="control-label">Komentar</label>
                        <textarea name="komentar" class="form-control"></textarea>
                    </div>                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" value="Tambahkan" class="form-control btn-primary">
                        </div>
                    </div>              
                </form><br><br><hr>                

                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr >
                            <th style="text-align:center;">User</th>
                            <th style="text-align:center;">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($daftar_komentar->count())
                        @foreach($daftar_komentar as $komentar)
                        <tr>
                            <td>{{ $komentar->user->ke_bagian->detail }}</td><td>{{ $komentar->komentar }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align:center;" colspan="2">Belum ada komentar.</td>
                        </tr>
                    @endif
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@stop

@section('script')

@stop 


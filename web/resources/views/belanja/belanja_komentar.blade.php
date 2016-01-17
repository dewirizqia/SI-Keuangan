@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Komentar Rekap Belanja</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-1">Subbag/ Prodi</label>
                        <label class="col-md-3">: {{ $belanja->id_user }}</label>                        
                        <label class="col-md-2">Kode Mata Anggaran</label>
                        <label class="col-md-3">: {{ $belanja->Kode_MA }}</label>
                        <label class="col-md-1">MAK</label>
                        <label class="col-md-2">: {{ $belanja->MAK }}</label>
                    </div>&nbsp
                    <div class="form-group">                        
                        <label class="col-md-2">Penerima</label>
                        <label class="col-md-4">: {{ $belanja->penerima }}</label>
                        <label class="col-md-2">Uraian</label>
                        <label class="col-md-4">: {{ $belanja->uraian }}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Nomor Tanda Bukti</label>
                        <label class="col-md-4">: {{ $belanja->no_tanda_bukti }}</label>
                        <label class="col-md-2">Tanggal Tanda Bukti</label>
                        <label class="col-md-4">: {{ $belanja->tgl }}</label>                        
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Jumlah</label>
                        <label class="col-md-4">: {{ $belanja->jumlah }}</label>
                        <label class="col-md-2">Pajak</label>
                        <label class="col-md-4">: </label>                    
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
                <form action="{{ route('belanja_komentar_simpan') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="jenis" value="belanja">
                    <input type="hidden" name="id_jenis" value="{{ $belanja->id }}">
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
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
                <div class="form-group">
                    <label class="col-md-2">Sub Bagian/Program Studi</label>
                    <div class="col-md-3">
                        <fieldset disabled><input type="text" class="form-control" id="disabledTextInput" value="{{ $spjup->ke_bagian->detail }}"></fieldset>
                    </div>
                    <label class="col-md-1">Kode Kegiatan</label>
                    <div class="col-md-3">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> sub_input->input->sub_output->output->kode_output. "." .$spjup -> sub_input->input->sub_output->kode_suboutput. "." .$spjup -> sub_input->input->kode_input. "." .$spjup -> sub_input->kode_subinput }}"></fieldset>
                    </div>
                    <label class="col-md-1">Kode Akun</label>
                    <div class="col-md-2">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> akun->kode_akun}}"></fieldset>
                    </div>
                </div>&nbsp&nbsp
                <div class="form-group">
                    <label class="col-md-2">Untuk Pembayaran</label>
                    <div class="col-md-7">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> untuk_pembayaran}}"></fieldset>
                    </div>
                    <label class="col-md-1">Total (Rp.)</label>
                    <div class="col-md-2">
                        <fieldset disabled><input type="text" class="form-control" value="{{ number_format($spjup -> total, 0, ',', '.')}}"></fieldset>
                    </div>
                </div>
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
                <form action="{{ route('spjup_komentar_simpan') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="jenis" value="UP">
                    <input type="hidden" name="id_jenis" value="{{ $spjup->id }}">
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
                            <td>{{$komentar->user->ke_bagian->detail}}</td><td>{{ $komentar->komentar }}</td>
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
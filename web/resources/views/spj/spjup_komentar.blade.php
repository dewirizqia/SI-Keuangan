@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Detail SPJ UP</h2>
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


@stop

@section('script')
@parent

@stop 
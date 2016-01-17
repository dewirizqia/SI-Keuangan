@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Belanja</h1>
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
                    <form action="{{ route('belanja_update', $belanja->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="col-md-1">Output</label>
                            <div class="col-md-3">
                                <select id="output" class="form-control" name="output">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($output as $u_output)
                                    <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                                    @endforeach
                                </select>
                            </div><div></div>
                            <label class="col-md-1">Sub Output</label>
                            <div class="col-md-3">
                                <select name="sub_output" id="sub_output" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($suboutput as $u_suboutput)
                                    <option value="{{ $u_suboutput->id }}" class="{{ $u_suboutput->id_output }}">{{ $u_suboutput->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-1">Input</label>
                            <div class="col-md-3">
                                <select name="input" id="input" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($input as $u_input)
                                    <option value="{{ $u_input->id }}" class="{{ $u_input->id_suboutput }}">{{ $u_input->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-1">Sub Input</label>
                            <div class="col-md-3">
                                <select name="sub_input" id="sub_input" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($subinput as $u_subinput)
                                    <option value="{{ $u_subinput->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
                                    @endforeach
                                </select>
                            </div><div></div>
                            <label class="col-md-1">Akun</label>
                            <div class="col-md-3">
                                <select name="MAK" class="form-control">
                                    <option value="{{ $mak->kode_akun }}">({{ $mak->kode_akun }})  {{ $mak->uraian_akun }}</option>
                                    <option value="">-- Pilih  --</option>                                    
                                    @foreach($akun as $u_akun)
                                    <option value="{{ $u_akun->kode_akun }}">({{ $u_akun->kode_akun }})  {{ $u_akun->uraian_akun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-1"></label>
                            <div class="col-md-3">
                                <br><br>
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Nomor Tanda Bukti</label>
                            <div class="col-md-4">
                                <input type="text" name="no_tanda_bukti" class="form-control" value="{{ $belanja->no_tanda_bukti }}">
                            </div>
                            <label class="col-md-2">Tanggal</label>
                            <div class="col-md-4">
                                <input type="date" name="tgl" class="form-control" value="{{ $belanja->tgl }}">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Nomor BKU</label>
                            <div class="col-md-4">
                                <input type="text" name="no_bku" class="form-control" value="{{ $belanja->no_bku }}">
                            </div>
                            <label class="col-md-2">Penerima</label>
                            <div class="col-md-4">
                                <input type="text" name="penerima" class="form-control" value="{{ $belanja->penerima }}">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Uraian</label>
                            <div class="col-md-4">
                                <input type="text" name="uraian" class="form-control" value="{{ $belanja->uraian }}">
                            </div>
                            <label class="col-md-2">Jumlah</label>
                            <div class="col-md-4">
                                <div class="input-group ">
                                    <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                    <input type="text" class="form-control" name="jumlah" value="{{ $belanja->jumlah }}">
                                </div>
                            </div>
                        </div>&nbsp
                        
                        <hr>                        
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="form-control btn-success">
                            <input type="reset" value="Ulangi" class="form-control btn-warning">
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
@parent
<!-- script dropdown select -->
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/jquery.min.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-1.0.1.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-selector.js') }}"></script>

<script src="{{ asset('css/js/jquery.chained.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
/* For jquery.chained.js */

    $("#sub_output").chained("#output");
    $("#input").chained("#sub_output");
    $("#sub_input").chained("#input");


    $("#sub_input").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#input")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

  });
</script>
@stop
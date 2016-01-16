@extends('home.keuangan')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit SPJ LS</h1>
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
                    <form action="{{ route('spjls_update', $spjls->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-1">Output</label>
                            <div class="col-md-3">
                                <select name="output" id="output" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($soutput as $u_output)
                                    <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-1">Sub Output</label>
                            <div class="col-md-3">
                                <select class="form-control" name="id_suboutput" id="sub_output">
                                    <option value="">-- Pilih --</option>
                                    @foreach($ssuboutput as $u_suboutput)
                                    <option value="{{ $u_suboutput->id }}" class="{{ $u_suboutput->id_output }}">{{ $u_suboutput->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-1">Input</label>
                            <div class="col-md-3">
                                <select class="form-control" name="id_input" id="input">
                                    <option value="">-- Pilih --</option>
                                    @foreach($sinput as $u_input)
                                    <option value="{{ $u_input->id }}" class="{{ $u_input->id_suboutput }}">{{ $u_input->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-1">Sub Input</label>
                            <div class="col-md-3">
                                <select name="id_subinput" id="sub_input" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($ssubinput as $u_subinput)
                                    <option value="{{ $u_subinput->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
                                    @endforeach
                                </select>
                            </div><div></div>
                            <label class="col-md-1">Akun</label>
                            <div class="col-md-3">
                                <select name="id_akun" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($akun as $u_akun)
                                    <option value="{{ $u_akun->id }}">({{ $u_akun->kode_akun }})  {{ $u_akun->uraian_akun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-1">Rekapitulasi</label>
                            <div class="col-md-3">
                                <input type="text" name="rekapitulasi" class="form-control">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Subbag/ Prodi</label>
                            <div class="col-md-4">
                                <select name="id_bagian" class="form-control">
                                    <option value="{{ $spjls->ke_bagian->id }}">{{ $spjls->ke_bagian->detail }}</option>
                                    <option value="">-- Pilih  --</option>
                                    @foreach($bagian as $daftar_bagian)
                                    <option value="{{ $daftar_bagian->id }}">{{ $daftar_bagian->detail }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-2">Nama Kegiatan</label>
                            <div class="col-md-4">
                                <input type="text" name="nama_kegiatan" class="form-control" value="{{ $spjls->nama_kegiatan }}">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Nomor SK</label>
                            <div class="col-md-4">
                               <input type="text" name="nomor" class="form-control" value="{{ substr($spjls->no_sk, 0, 3) }}">
                            </div>
                            <label class="col-md-2">Tahun SK</label>
                            <div class="col-md-4">
                               <input type="text" name="tahun" class="form-control" value="{{ substr($spjls->no_sk, -4) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="{{ $spjls->keterangan }}">
                        </div>&nbsp
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="submit" value="Simpan" class="form-control btn-success">
                            </div>
                            <div class="col-md-6">
                                <input type="reset" value="Ulangi" class="form-control btn-warning">
                            </div>                      
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
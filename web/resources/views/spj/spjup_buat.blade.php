@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah SPJ UP</h1>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="{{ route('spjup_simpan') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Sub Bagian/Program Studi</label>
                            <select name="id_bagian" class="form-control">
                                <option value="">-- Pilih  --</option>
                                @foreach($bagian as $daftar_bagian)
                                <option value="{{ $daftar_bagian->id }}">{{ $daftar_bagian->detail }}</option>
                                @endforeach
                            </select>                             
                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Output</label>
                            <div class="col-md-3">
                                <select name="output" id="output" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($soutput as $u_output)
                                    <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                                    @endforeach
                                </select>
                            </div><div></div>
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
                            <label class="col-md-1"></label>
                            <div class="col-md-3">
                                <br><br>
                            </div>
                        </div>&nbsp
                        
                        <div class="form-group">
                            <label>Untuk Pembayaran</label><br>
                            <textarea name="untuk_pembayaran" class="form-control"></textarea>
                        </div>
                        <hr>                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="submit" value="Tambahkan" class="form-control btn-primary">
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
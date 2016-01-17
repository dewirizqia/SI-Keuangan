@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
@stop

@section('isi')
<div class="panel panel-primary">
    <div class="panel-heading">
        Ubah Detail Usulan Tahun: {{ $detail_usulan->usulan->tahun }}
        <br>Akun: {{ $detail_usulan->akun->uraian_akun }}, 
        <br>Sub Komponen Input: {{ $detail_usulan->sub_input->uraian }}
    </div>
    <div class="panel-body">

        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Sepertinya ada kesalahan.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form role="form" id="calx" method="POST" action="{{ route('detail_usulan_update', $detail_usulan->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

        <div class="form-group">
            <label>Komponen</label>
        <select class="form-control" name="jenis_komponen">
            <option value="{{ $detail_usulan->jenis_komponen }}">{{ $detail_usulan->jenis_komponen }}</option>
            <option value="utama">Utama</option>
            <option value="pendukung">Pendukung</option>
        </select>
        </div>

        <div class="form-group">
            <label>Detail</label>
            <input class="form-control" name="detail" value="{{ $detail_usulan->detail }}">
        </div>

        <div class="form-group">
            <label>Harga Satuan</label>
             <input class="form-control" name="harga_satuan" id="harga_satuan" value="{{ $detail_usulan->harga_satuan }}">
        </div>
        <div class="form-group">
            <div class="col-md-6">
            <label>Nominal</label> 
            <input class="form-control" name="nominal" id="nominal" value="{{ $detail_usulan->nominal }}" id="nominal">
            </div>    
        </div>
        <div class="form-group">
            <div class="col-md-6">
               <label>Satuan</label>
               <input class="form-control" name="satuan" value="{{ $detail_usulan->satuan }}">
            </div>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input class="form-control" name="jumlah" value="{{ $detail_usulan->jumlah }}" id="jumlah" data-formula="$harga_satuan*$nominal">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
    </form>
    </div>
</div>
@stop


@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
    });
</script>
@stop

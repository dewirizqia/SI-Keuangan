@extends('home.keuangan')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Detail SPJ LS</h2>
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
                <form action="{{ route('spjls_detail_update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_ls" value="{{$detail->spjls->id}}">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nama" value="{{ $detail->nama }}">
                        </div><div></div>
                        <label class="col-md-2 control-label">Jabatan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jabatan" value="{{ $detail->jabatan }}">
                        </div>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1 control-label">Jumlah Hari</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jlh_hari" value="{{ $detail->jlh_hari }}">
                        </div>
                        <label class="col-md-1 control-label">Satuan</label>
                        <div class="col-md-3">
                             <div class="input-group ">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" name="satuan" value="{{ $detail->satuan }}">
                            </div>
                        </div>
                        <label class="col-md-1 control-label">PPh</label>
                        <div class="col-md-3">
                             <div class="input-group ">
                                <input type="text" class="form-control" name="pph" value="{{ $pph }}">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                            </div>
                        </div>&nbsp
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" value="Tambahkan" class="form-control btn-success">
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

@stop 
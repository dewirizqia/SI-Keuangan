@extends('home.keuangan')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Detail SPJ UP</h2>
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
                <form action="{{ route('spjup_detail_update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $detail->nama }}">
                        </div>
                        <div class="col-md-6">
                            <label class=" control-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ $detail->jabatan }}">
                        </div>
                    </div>&nbsp
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Volume</label>                        
                            <input type="text" class="form-control" name="volume" value="{{ $detail->volume }}">
                        </div>
                        <div class="col-md-4">
                            <label class=" control-label">Satuan</label>
                            <div class="input-group ">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" name="satuan" value="{{ $detail->satuan }}">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <label class=" control-label">Pajak</label>
                            <div class="input-group ">                            
                                <input type="text" class="form-control" name="pajak" value="{{ $pajak }}">                        
                                <span class="input-group-addon" id="basic-addon1">%</span>
                            </div>
                        </div>
                    </div><br><br><br>
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

@stop 
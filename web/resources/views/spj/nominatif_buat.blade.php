@extends('home.keuangan')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Daftar Nominatif</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_ls" value="">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nama" >
                        </div><div></div>
                        <label class="col-md-2 control-label">Jabatan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jabatan" >
                        </div>                        
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jumlah Hari</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jlh_hari" >
                        </div>
                        <label class="col-md-2 control-label">Satuan</label>
                        <div class="col-md-4">
                            <div class="input-group ">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" name="satuan">
                            </div>
                        </div><div></div> 
                    </div><br><br>
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
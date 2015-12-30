@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Detail SPJ</h2>
    </div>
</div>

<!-- <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label><h5>Judul Artikel</h5></label><br>
        <input type="text" name="judul" class="form-control">
    </div>
    <div class="form-group">
        <label><h6>Isi Artikel</h6></label><br>
        <textarea name="isi"></textarea>
    </div>
</form> -->
<div class="row">
    <h4>  //Penjelasan SPJnya</h4>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Nama</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nama">
                        </div><div></div>
                        <label class="col-md-1 control-label">Jabatan</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <label class="col-md-1 control-label">Jumlah Jam</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jumlah_jam">
                        </div>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1 control-label">Satuan</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="satuan">
                        </div><div></div>
                        <label class="col-md-1 control-label">Terima Kotor</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <label class="col-md-1 control-label">Pajak</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jumlah_jam">
                        </div>
                    </div>&nbsp
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
            <hr>
        </div>
        
    </div>

    <div class="row">
        <h4>  //Tabel Detailnya</h4>
    </div>
@stop

@section('script')
@stop 
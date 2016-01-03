@extends('@layout.base_admin')

@section('isi')
<br>    
<div class="panel panel-success">
    <div class="panel-heading">
        Edit Kode Kegiatan
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('update_kegiatan', $skegiatan->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label class="col-md-2" background="">Kode Kegiatan</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="kode_kegiatan" value="{{ $skegiatan -> kode_kegiatan}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Sumber Dana Kegiatan</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="sumberdana_kegiatan" value="{{ $skegiatan -> sumberdana_kegiatan}}">
                </div>
            </div><br><br><br>
            <div class="form-group">
                <div  class="col-md-3">
                     <input type="submit" value="Simpan" class="form-control btn-success">
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('script')
@stop
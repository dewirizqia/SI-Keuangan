@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('update_kegiatan', $skegiatan->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
    <div class="form-group input-group">
        <label>Kode Kegiatan</label>
        <input class="form-control" name="kode_kegiatan" value="{{ $skegiatan -> kode_kegiatan}}">
    </div>

      <div class="form-group input-group">
        <label>Sumber Dana Kegiatan</label>
        <input class="form-control" name="sumberdana_kegiatan" value="{{ $skegiatan -> sumberdana_kegiatan}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
</form>


@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')


<br>

<form role="form" method="POST" action="{{ route('simpan_pagu')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 	
    <div class="form-group">
        <label>Tahun</label>
        <input class="form-control" name="tahun">
    </div>

    <label>Alokasi</label>
    <div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" class="form-control" name="alokasi">
    </div>
    <br>
    <button type="submit" class="btn btn-default">Tambah Pagu</button>
</form>


@stop
@extends('@layout.base_admin')

@section('isi')
<br>

<form role="form" method="POST" action="{{ route('simpan_akun')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group input-group">
        <label>Akun</label>
        <input class="form-control" name="akun">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Edit Akun</button>
</form>




@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')
<br>

<form role="form" method="POST" action="{{ route('update_akun', $sakun->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">      
    <div class="form-group input-group">
        <label>Akun</label>
        <input class="form-control" name="kode_akun"  value="{{ $sakun -> kode_akun}}">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian_akun"  value="{{ $sakun -> uraian_akun}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Edit Akun</button>
</form>




@stop

@section('script')
@stop
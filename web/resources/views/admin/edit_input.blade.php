@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('update_input', $sinput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
   

    <div class="form-group input-group">
        <label>Kode Input</label>
        <input class="form-control" name="kode_input" value="{{ $sinput -> kode_input}}">
    </div>

    <label>Uraian</label>
    <div class="form-group "> 
        <input type="text" class="form-control" name="uraian" value="{{ $sinput -> uraian}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Edit Komponen Input </button>
</form>



@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('update_subinput', $ssubinput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
    <div class="form-group input-group">
        <label>Output</label>
        <input class="form-control" name="output">
    </div>

    <div class="form-group input-group">
        <label>Sub Output</label>
        <input class="form-control" name="suboutput">
    </div>

    <div class="form-group input-group">
        <label>Input</label>
        <input class="form-control" name="input">
    </div>

    <div class="form-group input-group">
        <label>Kode Sub Input</label>
        <input class="form-control" name="kode_subinput" value="{{ $ssubinput -> kode_subinput}}">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian" value="{{ $ssubinput -> uraian}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Edit Sub Komponen Input</button>
</form>


@stop

@section('script')
@stop
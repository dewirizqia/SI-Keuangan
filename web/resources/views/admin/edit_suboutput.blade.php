@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('update_output', $soutput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
    <div class="form-group input-group">
        <label>Output</label>
        <input class="form-control" name="id_output">
    </div>

    <div class="form-group input-group">
        <label>Kode Sub Output</label>
        <input class="form-control" name="kode_suboutput" value="{{ $ssuboutput -> kode_suboutput}}">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian" value="{{ $ssuboutput -> uraian}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Edit Sub Output</button>
</form>


@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')
<br>    
<div class="panel panel-success">
    <div class="panel-heading">
        Edit Kode Sub Input
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('update_subinput', $ssubinput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
           
            <div class="form-group">
                <label class="col-md-1" background="">Sub Input</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="kode_subinput" value="{{ $ssubinput -> kode_subinput}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1" background="">Uraian</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="uraian" value="{{ $ssubinput -> uraian}}">
                </div>
            </div>
            <div class="form-group">
                
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
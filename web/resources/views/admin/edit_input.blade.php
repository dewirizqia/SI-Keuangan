@extends('@layout.base_admin')

@section('isi')

<br>    
<div class="panel panel-success">
    <div class="panel-heading">
        Edit Kode Input
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('update_input', $sinput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">      
            <div class="form-group">
                <label class="col-md-2" background="">Kode Input</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="kode_input" value="{{ $sinput -> kode_input}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Uraian</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="uraian" value="{{ $sinput -> uraian}}">
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
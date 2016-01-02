@extends('home.keuangan')
@section('isi')
<br>
<br>    
<div class="panel panel-primary">
    <div class="panel-heading">
        Edit Batasan Pagu
    </div>
    <div class="panel-body">
        <form id="calx" role="form" method="POST" action="{{ route('update_pagu', $pagu->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label class="col-md-2" background="">Tahun</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="tahun" value="{{$pagu->tahun}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Batasan</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="batasan" value="{{$pagu->batasan}}" data-format="0,0[.]">
                </div>
            </div><br><br><br>
            <div class="form-group">
                <div  class="col-md-3">
                    <input type="submit" value="Update Pagu" class="form-control btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('script')
@stop
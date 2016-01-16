@extends('@layout.base_admin')

@section('isi')
<br>
@if($errors->count())
    <div class="col-md-12 alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    &nbsp
@endif
    
<div class="panel panel-success">
    <div class="panel-heading">
        Edit Kode Sub Output
    </div>
    <div class="panel-body">

        <form role="form" method="POST" action="{{ route('update_suboutput', $ssuboutput->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label>Ouput</label>
                <select class="form-control" name="id_output" id="output">
                    <option value="{{ $ssuboutput->id_output }}">{{ $ssuboutput->output->uraian }}</option>
                    <option value="">--</option>
                    @foreach($soutput as $u_output)
                    <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-1" background="">Kode Sub Ouput</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="kode_suboutput" value="{{ $ssuboutput -> kode_suboutput}}">
                </div>          
                <label class="col-md-1" background="">Satuan</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="satuan" value="{{ $ssuboutput -> uraian}}">
                </div>
                <label class="col-md-1">Uraian</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="uraian" value="{{ $ssuboutput -> uraian}}">
                </div>
            </div><br><br><br><br>
            <div class="form-group">
                <div  class="col-md-4">
                     <input type="submit" value="Simpan" class="form-control btn-success">
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('script')
@stop
@extends('@layout.base_admin')

@section('isi')

<br>

<form role="form" method="POST" action="{{ route('simpan_subinput')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
    <div class="form-group">
        <label>OUTPUT</label>
    <select class="form-control" name="output" id="output">
        <option value="">--</option>
        @foreach($soutput as $u_output)
        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
        <label>SUB OUTPUT</label>
     <select class="form-control" name="id_suboutput" id="sub_output">
        <option value="">--</option>
        @foreach($ssuboutput as $u_suboutput)
        <option value="{{ $u_suboutput->id }}" class="{{ $u_suboutput->id_output }}">{{ $u_suboutput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
        <label>KOMPONEN INPUT</label>
    <select class="form-control" name="id_input" id="input">
        <option value="">--</option>
        @foreach($sinput as $u_input)
        <option value="{{ $u_input->id }}" class="{{ $u_input->id_suboutput }}">{{ $u_input->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group input-group">
        <label>Kode Sub Input</label>
        <input class="form-control" name="kode_subinput">
    </div>

    <label>Uraian</label>
    <div class="form-group ">
        <input type="text" class="form-control" name="uraian">
    </div>
   
    <button type="submit" class="btn btn-primary">Tambah Sub Komponen Input</button>
</form>

<br>
<br>
<h3 align="center"><b>Daftar Sub Input</b></h3>

	
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th width="100">Output</th>
                    <th >Sub Output</th>
                    <th>Input</th>
                    <th>Kode</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($ssubinput as $subinput)
	                <tr>
	                    <td>{{ $no++ }}</td>
                        <td><a href="">{{ $subinput->input->sub_output->output->uraian }}</a></td>
                        <td><a href="">{{ $subinput->input->sub_output->uraian }}</a></td>
	                    <td><a href="">{{ $subinput->input->uraian }}</a></td>
	                    <td><a href="">{{ $subinput->kode_subinput }}</a></td>
	                    <td>{{ $subinput->uraian }}</td>
                        <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_subinput', $subinput->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_subinput', $subinput->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                                </td>
                            </table>
                        </td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>





@stop

@section('script')
@parent
<!-- script dropdown select -->
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/jquery.min.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-1.0.1.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-selector.js') }}"></script>

<script src="{{ asset('css/js/jquery.chained.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
/* For jquery.chained.js */

    $("#sub_output").chained("#output");
    $("#input").chained("#sub_output");


    $("#input").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#sub_output")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

  });
</script>
@stop
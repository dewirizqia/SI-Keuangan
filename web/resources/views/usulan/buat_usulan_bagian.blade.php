@extends('@layout.base_keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop


@section('isi')
<br>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <strong>Whoops!</strong> Sepertinya ada kesalahan.<br><br>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

<form role="form" method="POST" action="{{ route('tambah_detail') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

	<div class="form-group">
        <label>Tahun</label>
        <input class="form-control" name="tahun">
    </div>

    <div class="form-group">
    	<label>OUTPUT</label>
    <select class="form-control" name="output">
    	@foreach($output as $u_output)
        <option value="{{ $u_output->id }}">{{ $u_output->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB OUTPUT</label>
     <select id="suboutput" class="form-control" name="sub_output">
    	@foreach($suboutput as $u_suboutput)
        <option value="{{ $u_suboutput->id }}">{{ $u_suboutput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>KOMPONEN INPUT</label>
    <select class="form-control" name="input">
    	@foreach($input as $u_input)
        <option value="{{ $u_input->id }}">{{ $u_input->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>SUB KOMPONEN INPUT</label>
    <select class="form-control" name="sub_input">
    	@foreach($subinput as $u_subinput)
        <option value="{{ $u_subinput->id }}">{{ $u_subinput->uraian }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    	<label>AKUN</label>
    <select class="form-control" name="akun">
    	@foreach($akun as $u_akun)
        <option value="{{ $u_akun->id }}">{{ $u_akun->uraian_akun }}</option>
        @endforeach
    </select>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Tambah Detail</button>
</form>
@stop


@section('script')
<!-- jQuery -->
<script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- DataTables JavaScript -->
    <script src="{{ asset('css/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

 
@stop

@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($ssubinput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Output</th>
                    <th>Sub Output</th>
                    <th>Input</th>
                    <th>Kode Sub Input</th>
                    <th>Uraian</th>
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
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Sub Input Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
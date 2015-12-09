@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($ssuboutput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Output</th>
                    <th>Kode Sub Output</th>
                    <th>Uraian</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($ssuboutput as $suboutput)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $suboutput->output->uraian }}</a></td>
	                    <td><a href="">{{ $suboutput->kode_suboutput }}</a></td>
	                    <td>{{ $suboutput->uraian }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Sub Output Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
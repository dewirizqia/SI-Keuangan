@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($sinput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Sub Output</th>
                    <th>Kode Input</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($sinput as $input)
	                <tr>
	                    <td>{{ $no++ }}</td>
                        <td><a href="">{{ $input->sub_output->kode_suboutput }}</a></td>
	                    <td><a href="">{{ $input->kode_input }}</a></td>
	                    <td>{{ $input->uraian }}</td>
                        <td><button type="button" class="btn btn-info">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button></td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Input Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
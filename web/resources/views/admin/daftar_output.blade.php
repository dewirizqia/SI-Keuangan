@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($soutput->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Output</th>
                    <th>Uraian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($soutput as $output)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $output->kode_output }}</a></td>
	                    <td>{{ $output->uraian }}</td>
                        <td><button type="button" class="btn btn-info">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button></td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Output Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
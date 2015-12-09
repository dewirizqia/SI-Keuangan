@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($daftar_pagu_output->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Tahun</th>
                    <th>Output</th>
                    <th>Alokasi per Output</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($daftar_pagu_output as $pagu_output)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $pagu_output->pagu->tahun }}</a></td>
                        <td><a href="">{{ $pagu_output->ke_output->uraian }}</a></td>
                        <td><a href="">{{ $pagu_output->jumlah }}</a></td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Pagu Bagian Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')
@stop
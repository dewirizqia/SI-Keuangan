@extends('@layout.base_admin')

@section('isi')




<br>
<a href=""><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>
	@if ($daftar_pagu_bagian->count())
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Tahun</th>
                    <th>Bagian</th>
                    <th>Alokasi per Bagian</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($daftar_pagu_bagian as $pagu_bagian)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $pagu_bagian->pagu->tahun }}</a></td>
                        <td><a href="">{{ $pagu_bagian->ke_bagian->bagian }}</a></td>
                        <td><a href="">{{ $pagu_bagian->jumlah }}</a></td>
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
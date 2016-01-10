@extends('@layout.base_keuangan')

@section('isi')
<br>
<br>
	<div class="table-responsive">
        <form id="calx">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Bagian</th>
                    <th>TAHUN</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                	@foreach($usulan as $isiusulan)
                	<tr>
                        <td>{{ $isiusulan->ke_bagian->bagian }}</td>
                        <td>{{ $isiusulan->tahun }}</td>
                        <td>{{ $isiusulan->status }}</td>
                    </tr>
                	@endforeach
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-striped">
        	<thead>
                <tr>
                    <th>Sub Input</th>
                    <th>Jenis Komponen</th>
                    <th>Detail</th>
                    <th>RIncian Perhitungan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                	@foreach($detail_usulan as $detail)
                	<tr>
                        <td>{{ $detail->sub_input->uraian }}</td>
                        <td>{{ $detail->jenis_komponen }}</td>
                        <td>{{ $detail->detail }}</td>
                        <td>
                        	<table>
                        		<tr>
                        	@foreach ($detail->rincian as $rincian)
                        			<td>{{ $rincian->nominal }}</td>
                        			<td> x </td>
                        			<td>{{ $rincian->satuan }}</td>                        		
                        	@endforeach
                        	</tr>
                        	</table>
                        </td>
                        <td>{{ $detail->harga_satuan }}</td>
                        <td>{{ $detail->jumlah }}</td>
                    </tr>
                	@endforeach
            </tbody>
        </table>
    </form>
    </div>
@stop
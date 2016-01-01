@extends('@layout.base_admin')

@section('isi')
 




<br>
	@if ($spagu->count())
	<div class="table-responsive">
        <form id="calx">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>ALOKASI</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($spagu as $pagu)
	                <tr>
	                    <td>{{ $no++ }}</td>
	                    <td><a href="">{{ $pagu->tahun }}</a></td>
	                    <td id="alokasi[{{$alokasi++}}]" data-format="0,0[.]" data-formula="1*( {{$pagu->alokasi}} )">Rp {{ $pagu->alokasi }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    </div>
@else
    <div class="panel-heading"><h3><center>Data Pagu Belum di Tambahkan<center></h3></div>
@endif




@stop

@section('script')

<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
    <script src="css/jquery-calx-1.1.9.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
    });
    </script>

@stop
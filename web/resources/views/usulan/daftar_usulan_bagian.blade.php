@extends('@layout.base_keuangan')

@section('isi')
<br>
<br>
	<div class="table-responsive">
        <form id="calx">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>STATUS</th>
                    <th>REVISI</th>
                    <th>DETAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dftrusulan as $usulan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="">{{ $usulan->tahun }}</a></td>
                        <td>{{ $usulan->status }}</td>
                        <td>{{ $usulan->revisi }}</td>
                        <td><button><a href="{{ route('detail_usulan',$usulan->id) }}">detail</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    </div>





@stop

@stop
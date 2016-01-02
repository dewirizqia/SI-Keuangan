@extends('home.keuangan')

@section('isi')
<br>
<br>
<form role="form" method="POST" action="{{ route('tambah_usulan_bagian',$id_bagian) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<? php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-md-3">
               <input class="form-control" name="tahun">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tambah Usulan</button>
            </div>
        </div>
</form>
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
                        <td><button><a href="{{ route('buat_usulan_bagian', $usulan->id) }}">detail</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    </div>





@stop

@stop
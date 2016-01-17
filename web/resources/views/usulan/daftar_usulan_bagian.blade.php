@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')
<br>
<br>
<div class="panel panel-primary">
<form role="form" method="POST" action="{{ route('tambah_usulan_bagian',$id_bagian) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <!-- <input type="hidden" name="_token" value="<? php echo csrf_token(); ?>"> -->
    {{ csrf_field() }}
        <div class="form-group">
            <div class="col-md-3">
               <input class="form-control" name="tahun" placeholder="Masukkan Tahun Usulan">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tambah Usulan</button>
            </div>
        </div>
</form>

<br>
<br>
<br>
</div>


<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar Usulan
    </div>
    <div class="panel-body">
        @if ($dftrusulan->count())
        <div class="dataTable_wrapper">                
            <form id="calx">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>STATUS</th>
                    <th>REVISI</th>
                    <th>DETAIL</th>
                    <th>Aksi</th>
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
                        <td> 
                            <table> 
                                <td>
                                    <form method="POST" action="{{route('delete_usulan_bagian', $usulan->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                                </td>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            </form>
        </div>
        @else
            <div class="panel-heading"><h3><center>Data Usulan Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>
@stop
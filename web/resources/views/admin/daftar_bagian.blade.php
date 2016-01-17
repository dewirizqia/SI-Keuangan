@extends('@layout.base_admin')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')

<br>
<form role="form" method="POST" action="{{ route('simpan_bagian') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="col-md-3">
               <select class="form-control" name="bagian">
                    <option value="prodi">Prodi</option>
                    <option value="subbag">Sub Bagian</option>
                </select>
            </div>
            <div class="col-md-3">
               <input class="form-control" name="detail">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Tambah Prodi/Bagian</button>
            </div>
        </div>
</form>
<br>
<br>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if ($daftar_bagian->count())
                        <div class="panel-heading">
                            Daftar Prodi dan Subbagian:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_bagian as $bagian)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="">{{ $bagian->detail }}</a></td>
                        <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_bagian', $bagian->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_bagian', $bagian->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        @else
                            <div class="panel-heading"><h3><center>Data Bagian Belum di Tambahkan<center></h3></div>
                        @endif
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop

@section('script')
@stop
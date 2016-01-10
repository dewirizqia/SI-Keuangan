@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
<style type="text/css">
    .rp {
        before: "Rp";
    }
</style>
@stop
@section('isi')
<br>
<br>    
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Alokasi
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_pagu') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            <div class="form-group">
                <label class="col-md-2" background="">Tahun</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="tahun">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2">Alokasi</label>
                <div  class="col-md-4">
                    <input type="text" class="form-control" name="batasan">
                </div>
            </div><br><br><br>
            <div class="form-group">
                <div  class="col-md-3">
                    <input type="submit" value="Tambahkan" class="form-control btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if ($spagu->count())
                        <div class="panel-heading">
                            Daftar Batasan Pagu:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form id="calx">
                                <table class="table table-bordered table-hover table-striped" id="dataTables-example">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>Alokasi</th>
                    <th>PAGU RKAKL</th>
                    <th>SISA PAGU</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spagu as $pagu)
                    <tr>
                        <td>{{ $no++ }} {{$jabatan}}</td>
                        <td><a href="">{{ $pagu->tahun }}
                            
                            </a></td>
                        <td id="batasan[{{$no++}}]" data-format="0,0[.]00">{{ $pagu->batasan }}</td>
                        <td id="alokasi[{{$no++}}]" data-format="0,0[.]">{{ $pagu->alokasi }}</td>
                        <td id="sisa[{{$no++}}]" data-format="0,0[.]">{{ $pagu->alokasi }} </td>
                        @foreach( $user->detail_user as $detail)
                            @if( $detail->jabatan = "admin")
                            <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_pagu', $pagu->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_pagu', $pagu->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                                </td>
                            </table>
                            </td>
                            @else
                            @endif
                        @endforeach
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
                                </form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        @else
                            <div class="panel-heading"><h3><center>Data Pagu Belum di Tambahkan<center></h3></div>
                        @endif
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
    });
    </script>

@stop
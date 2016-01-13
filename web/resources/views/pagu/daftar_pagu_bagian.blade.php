@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
<script src="css/jquery-calx-1.1.9.min.js"></script>
@stop
@section('isi')

<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Alokasi Pagu Prodi/Bagian
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('simpan_pagu_bagian') }}" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            
            <div class="form-group">
                <label class="col-md-1" background="">Bagian</label>
                <div  class="col-md-3">
                     <select class="form-control" name="id_bagian" id="bagian">
                        <option value="">--</option>
                        @foreach($sbagian as $bagian)
                        <option value="{{ $bagian->id }}" >{{ $bagian->detail }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        

            <div class="form-group">
                <label class="col-md-1">Tahun</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_pagu" id="tahun">
                        <option value="">--</option>
                        @foreach($daftar_pagu as $pagu)
                        <option value="{{ $pagu->id }}">{{ $pagu->tahun }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Alokasi</label>
                <div  class="col-md-3">
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
                        @if ($daftar_pagu_bagian->count())
                        <div class="panel-heading">
                            Daftar Pagu Bagian:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form id="calx">
                                <table class="table table-bordered table-hover table-striped" id="dataTables-example">
            <thead>
                <tr>
                    <th width=50px>NO</th>
                    <th>Tahun</th>
                    <th>Bagian</th>
                    <th>Pagu Bagian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_pagu_bagian as $pagu_bagian)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pagu_bagian->pagu->tahun }}</td>
                        <td>{{ $pagu_bagian->ke_bagian->detail }}</td>
                        <td id="jumlah[{{$no++}}]" data-format="0,0[.]00">{{ $pagu_bagian->jumlah }}</td>
                        <td> 
                            <table> 
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </td>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                                </form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        @else
                            <div class="panel-heading"><h3><center>Data Pagu Prodi/Bagian Belum di Tambahkan<center></h3></div>
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
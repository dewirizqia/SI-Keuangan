@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tambah Detail SPJ UP</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-2">Sub Bagian/Program Studi</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="Prodi Teknik Sipil" disabled>      
                        </div>
                        <label class="col-md-2">Kode Kegiatan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="5308 062 002 017J" disabled>     
                        </div>
                    </div>&nbsp&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Untuk Pembayaran</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="Biaya Narasumber - Pemakalah Utama Temu Ilmiah Tahunan Rekayasa Sipil Peranan Riset di Bidang Rekayasa Sipil dan Built Environment Dalam Pengembangan Wilayah di Kalimantan" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Nama</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nama">
                        </div><div></div>
                        <label class="col-md-1 control-label">Jabatan</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <label class="col-md-1 control-label">Jumlah Jam</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jumlah_jam">
                        </div>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1 control-label">Satuan</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="satuan">
                        </div><div></div>
                        <label class="col-md-1 control-label">Terima Kotor</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        <label class="col-md-1 control-label">Pajak</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="pajak">
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" value="Tambahkan" class="form-control btn-primary">
                        </div>
                        <div class="col-md-6">
                            <input type="reset" value="Ulangi" class="form-control btn-warning">
                        </div>
                    </div>              
                </form>
                <br><hr>
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jumlah Jam</th>
                                <th>Satuan</th>
                                <th>Terima Kotor</th>
                                <th>Pajak</th>
                                <th>Terima Bersih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Wawan Gunawan, M.Eng</td>
                                <td>Narasumber</td>
                                <td>1.5</td>
                                <td>Rp750.000</td>
                                <td>Rp1.125.000</td>
                                <td>Rp56.250</td>
                                <td>Rp1.068.750</td>
                                <td style="text-align:center;vertical-align:middle">
                                    <table margin="0">
                                     <tr>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>&nbsp</td>
                                        <td>
                                            <form method="POST" action="">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                    </table>                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
@parent
@stop 
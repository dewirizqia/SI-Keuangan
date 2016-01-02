@extends('@layout.base_admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Daftar SPJ UP</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <a href="{{ route('spjup_buat') }}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah SPJ
                </a>
                <br><br>
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sub Bagian/Program Studi</th>
                                <th>Kode Kegiatan</th>
                                <th>Untuk Pembayaran</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('spjup_detail') }}" title="Lihat/tambahkan detail" class="btn btn-link">
                                        Lihat/Tambah
                                    </a>
                                </td>
                                <td style="text-align:center;vertical-align:middle">
                                    <table>
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

@stop 
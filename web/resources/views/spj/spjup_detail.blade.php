@extends('@layout.base_admin')

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
                            <input type="text" class="form-control">      
                        </div>
                        <label class="col-md-2">Kode Kegiatan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control">      
                        </div>
                    </div>&nbsp&nbsp
                    <div class="form-group">
                        <label class="col-md-2">Untuk Pembayaran</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control">      
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
                                <td></td>
                                <td><a href=""></a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align:center;vertical-align:middle">
                                    <table margin="0">
                                    <tr><td>
                                        <a href="" title="Edit" class="btn btn-link">
                                            <h4><span class="glyphicon glyphicon-edit"></span></h4>
                                        </a>
                                    </td><td>
                                        <form method="POST" action="">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-link"  id="confirm" data-toggle="confirmation" data-popout="true">
                                                <h4 title="Hapus"><span class="glyphicon glyphicon-trash"></span></h4>
                                            </button>
                                        </form>
                                    </td></tr>
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
<!-- jQuery -->
<script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- DataTables JavaScript -->
    <script src="{{ asset('css/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
@stop 
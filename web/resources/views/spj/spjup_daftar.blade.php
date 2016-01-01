@extends('@layout.base_admin')

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
                                    <table margin="0">
                                    <tr><td>
                                        <a href="{{ route('spjup_edit') }}" title="Edit" class="btn btn-link">
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
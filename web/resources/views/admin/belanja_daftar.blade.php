@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Belanja</h1>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-body">	
    	<a href="" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah Belanja
        </a>
        <br><br>
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Tanda Bukti</th>
                        <th>Nomor BKU</th>
                        <th>Kode MA</th>
                        <th>MAK</th>
                        <th>Penerima</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td></td>
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
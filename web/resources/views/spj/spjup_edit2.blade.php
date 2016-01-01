@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Edit Detail SPJ UP</h2>
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
                            <input type="submit" value="Simpan" class="form-control btn-success">
                        </div>
                        <div class="col-md-6">
                            <input type="reset" value="Ulangi" class="form-control btn-warning">
                        </div>
                    </div>              
                </form>                
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
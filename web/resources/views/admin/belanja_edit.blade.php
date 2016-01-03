@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Belanja</h1>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_user" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-1">Output</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">Layanan Pendididkan</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div><div></div>
                            <label class="col-md-1">Sub Output</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">Layanan Pendidikan S1</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div>
                            <label class="col-md-1">Input</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">Penerimaan Mahasiswa Baru</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-1">Sub Input</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">Promosi dan Sosialisasi Penerimaan Mahasiswa Baru</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div><div></div>
                            <label class="col-md-1">Akun</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">Belanja Bahan</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div>
                            <label class="col-md-1"></label>
                            <div class="col-md-3">
                                <br><br>
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Nomor Tanda Bukti</label>
                            <div class="col-md-4">
                                <input type="text" name="no_tanda_bukti" class="form-control">
                            </div>
                            <label class="col-md-2">Tanggal</label>
                            <div class="col-md-4">
                                <input type="date" name="tgl" class="form-control">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-2">Nomor BKU</label>
                            <div class="col-md-4">
                                <input type="text" name="no_buku" class="form-control">
                            </div>
                            <label class="col-md-2">Penerima</label>
                            <div class="col-md-4">
                                <input type="text" name="penerima" class="form-control">
                            </div>
                        </div>&nbsp
                        <!-- <div class="form-group">
                            <label class="col-md-2">MAK</label>
                            <div class="col-md-4">
                                <input type="text" name="MAK" class="form-control">
                            </div>
                            <label class="col-md-2">Kode MA</label>
                            <div class="col-md-4">
                                <input type="text" name="Kode_MA" class="form-control">
                            </div>
                        </div>&nbsp -->
                        <div class="form-group">
                            <label class="col-md-2">Uraian</label>
                            <div class="col-md-4">
                                <input type="text" name="uraian" class="form-control">
                            </div>
                            <label class="col-md-2">Jumlah</label>
                            <div class="col-md-4">
                                <input type="text" name="jumlah" class="form-control">
                            </div>
                        </div>&nbsp
                        
                        <hr>                        
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="form-control btn-success">
                            <input type="reset" value="Ulangi" class="form-control btn-warning">
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
@extends('@layout.base_admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah SPJ LS</h1>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-1">Output</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div>
                            <label class="col-md-1">Sub Output</label>
                            <div class="col-md-3">
                                <select name="id_bagian" class="form-control">
                                    <option value="">-- Pilih  --</option>
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
                                    <option value="">-- Pilih  --</option>
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
                                    <option value="">-- Pilih  --</option>
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
                                    <option value="">-- Pilih  --</option>
                                <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                                {{--    
                                @foreach($daftarkategori as $kategori)
                                    <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                    @endforeach
                                --}}
                                </select>
                            </div>
                            <label class="col-md-1">Rekapitulasi</label>
                            <div class="col-md-3">
                                <input type="text" name="rekapitulasi" class="form-control">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label>Subbag/ Prodi</label>
                            <select name="id_bagian" class="form-control">
                                <option value="">-- Pilih  --</option>
                            <!-- Gasan ambilan di database jadi dikomen ja dulu -->
                            {{--    
                            @foreach($daftarkategori as $kategori)
                                <option value="{{ $kategori -> id }}">{{ $kategori -> kategori}}</option>
                                @endforeach
                            --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Nomor SK</label>
                            <div class="col-md-3">
                               <input type="text" name="no_sk" class="form-control">
                            </div>
                            <label class="col-md-1">Nama Kegiatan</label>
                            <div class="col-md-3">
                                <input type="text" name="nama_kegiatan" class="form-control">
                            </div>
                            <label class="col-md-1">Jumlah Penerima</label>
                            <div class="col-md-3">
                                <input type="text" name="jmlh_penerima" class="form-control">
                            </div>
                        </div>&nbsp
                        <div class="form-group">
                            <label class="col-md-1">Jumlah Kotor</label>
                            <div class="col-md-3">
                               <input type="text" name="jmlh_kotor" class="form-control">
                            </div>
                            <label class="col-md-1">PPH</label>
                            <div class="col-md-3">
                                <input type="text" name="pph" class="form-control">
                            </div>
                            <label class="col-md-1">Keterangan</label>
                            <div class="col-md-3">
                                <input type="text" name="rekapitulasi" class="form-control">
                            </div>                    
                        </div>&nbsp
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="submit" value="Tambahkan" class="form-control btn-primary">
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
@stop
@extends('@layout.base_admin')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit SPJ UP</h1>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Sub Bagian/Program Studi</label>
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
                            </div><div></div>
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
                            <label class="col-md-1"></label>
                            <div class="col-md-3">
                                <br><br>
                            </div>
                        </div>&nbsp
                        
                        <div class="form-group">
                            <label>Untuk Pembayaran</label><br>
                            <textarea name="" class="form-control"></textarea>
                        </div>
                        <hr>                        
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
@stop
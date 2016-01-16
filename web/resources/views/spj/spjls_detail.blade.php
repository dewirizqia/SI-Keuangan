@extends('home.keuangan')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Detail SPJ LS</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-2">Subbag/ Prodi</label>
                        <label class="col-md-4">: {{ $spjls->ke_bagian->detail}}</label>                        
                        <label class="col-md-2">Kode Anggaran</label>
                        <label class="col-md-4">: {{ $spjls->kode_anggaran}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Nomor SK</label>
                        <label class="col-md-3">: {{ $spjls -> no_sk}}</label>
                        <label class="col-md-1">Nama Kegiatan</label>
                        <label class="col-md-3">: {{ $spjls -> nama_kegiatan}}</label>
                        <label class="col-md-1">Jumlah Penerima</label>
                        <label class="col-md-3">: {{ $jumlah_penerima}}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Jumlah Kotor</label>
                        <label class="col-md-3">: Rp. {{ number_format($jumlah_kotor, 0, ',', '.') }}</label>
                        <label class="col-md-1">PPh</label>
                        <label class="col-md-3">: Rp. {{ number_format($total_pph, 0, ',', '.') }}</label>
                        <label class="col-md-1">Jumlah Bersih</label>
                        <label class="col-md-3">: Rp. {{ number_format($jumlah_bersih, 0, ',', '.') }}</label>
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1">Keterangan</label>
                        <label class="col-md-3">: {{ $spjls -> keterangan}}</label>                    
                    </div>&nbsp
                </form>
            </div>
        </div>
    </div>
</div>

@if($errors->count())
    <div class="col-md-12 alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="{{ route('spjls_detail_simpan') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_ls" value="{{$spjls->id}}">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nama">
                        </div><div></div>
                        <label class="col-md-2 control-label">Jabatan</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                        
                    </div>&nbsp
                    <div class="form-group">
                        <label class="col-md-1 control-label">Jumlah Hari</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jlh_hari">
                        </div>
                        <label class="col-md-1 control-label">Satuan</label>
                        <div class="col-md-3">
                             <div class="input-group ">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" name="satuan">
                            </div>
                        </div>
                        <label class="col-md-1 control-label">PPh</label>
                        <div class="col-md-3">
                             <div class="input-group ">
                                <input type="text" class="form-control" name="pph">
                                <span class="input-group-addon" id="basic-addon1">%</span>
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
                <br><hr>
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jumlah Hari</th>
                                <th>Satuan (Rp.)</th>
                                <th>Terima (Rp.)</th>
                                <th>PPh (Rp.)</th>
                                <th>Terima Bersih (Rp.)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_detail as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->nama}}</td>
                                    <td>{{ $detail->jabatan}}</td>
                                    <td>{{ $detail->jlh_hari}}</td>
                                    <td>{{ number_format($detail->satuan, 0, ',', '.') }}</td>
                                    <td>{{ number_format($detail->terima, 0, ',', '.') }}</td>
                                    <td>{{ number_format($detail->pph, 0, ',', '.')  }}</td>
                                    <td>{{ number_format($detail->terima_bersih, 0, ',', '.') }}</td>
                                    <td style="text-align:center;vertical-align:middle">
                                        <table margin="0">
                                            <tr>
                                                <td>
                                                    <a href="{{ route('spjls_detail_edit', $detail->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>&nbsp</td>
                                                <td>
                                                    <form method="POST" action="{{ route('spjls_detail_delete', $detail->id) }}">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>                                    
                                    </td>
                                </tr>
                            @endforeach
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
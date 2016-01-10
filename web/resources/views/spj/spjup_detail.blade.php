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
                <div class="form-group">
                    <label class="col-md-2">Sub Bagian/Program Studi</label>
                    <div class="col-md-3">
                        <fieldset disabled><input type="text" class="form-control" id="disabledTextInput" value="{{ $spjup->ke_bagian->detail }}"></fieldset>
                    </div>
                    <label class="col-md-1">Kode Kegiatan</label>
                    <div class="col-md-3">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> sub_input->input->sub_output->output->kode_output. "." .$spjup -> sub_input->input->sub_output->kode_suboutput. "." .$spjup -> sub_input->input->kode_input. "." .$spjup -> sub_input->kode_subinput }}"></fieldset>
                    </div>
                    <label class="col-md-1">Kode Akun</label>
                    <div class="col-md-2">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> akun->kode_akun}}"></fieldset>
                    </div>
                </div>&nbsp&nbsp
                <div class="form-group">
                    <label class="col-md-2">Untuk Pembayaran</label>
                    <div class="col-md-10">
                        <fieldset disabled><input type="text" class="form-control" value="{{ $spjup -> untuk_pembayaran}}"></fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form action="{{ route('spjup_detail_simpan', $spjup->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden"  name="id_spj" value="{{ $spjup->id }}">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col-md-6">
                            <label class=" control-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan">
                        </div>
                    </div>&nbsp
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Jumlah Jam</label>                        
                            <input type="text" class="form-control" name="jumlah_jam">
                        </div>
                        <div class="col-md-4">
                            <label class=" control-label">Satuan</label>
                            <div class="input-group ">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control" name="satuan">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                        <label class=" control-label">Pajak</label>
                        <div class="input-group ">                            
                            <input type="text" class="form-control" name="pajak">                        
                            <span class="input-group-addon" id="basic-addon1">%</span>
                        </div>
                        </div>
                    </div><br><br><br>
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
                                <th>Satuan (Rp.)</th>
                                <th>Terima Kotor (Rp.)</th>
                                <th>Pajak (Rp.)</th>
                                <th>Terima Bersih (Rp.)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_detail as $detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $detail -> nama }}</td>
                                <td>{{ $detail -> jabatan }}</td>
                                <td>{{ $detail -> jumlah_jam }}</td>
                                <td>{{ number_format($detail -> satuan, 0, ',', '.') }}</td>
                                <td>{{ number_format($detail -> terima_kotor, 0, ',', '.') }}</td>
                                <td>{{ number_format($detail -> pajak, 0, ',', '.') }}</td>
                                <td>{{ number_format($detail -> terima_bersih, 0, ',', '.') }}</td>
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
@parent

@stop 
@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
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
                @if(Auth::user()->hasRole('bpp'))
                <a href="{{ route('spjup_buat') }}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah SPJ
                </a>
                @else
                @endif
                <br><br>
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sub Bagian/Program Studi</th>
                                <th>Kode Kegiatan</th>
                                <th>Kode Akun</th>
                                <th>Untuk Pembayaran</th>
                                <th>Total (Rp.)</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_spjup as $spjup)
                            <tr>   
                                <td>{{ $no++ }}</td>
                                <td>{{ $spjup -> ke_bagian->detail }}</td>
                                <td>{{ $spjup -> sub_input->input->sub_output->output->kode_output. "." .$spjup -> sub_input->input->sub_output->kode_suboutput. "." .$spjup -> sub_input->input->kode_input.$spjup -> sub_input->kode_subinput }}</td>
                                <td>{{ $spjup -> akun->kode_akun }}</td>
                                <td>{{ $spjup -> untuk_pembayaran }}</td>
                                <td>{{ number_format($spjup -> total, 0, ',', '.') }}</td>
                                <td>
                                   
                                <table>
                                <tr>
                                <td>
                                    <a href="{{ route('spjup_detail', $spjup->id) }}" class="btn btn-primary" class="btn btn-link">Lihat</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <a href="{{ route('excelup', $spjup->id) }}" class="btn btn-success">Download</a>
                                </td>
                                </tr>
                                </table>
                                </td>
                                <td style="text-align:center;vertical-align:middle">
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{ route('spjup_edit', $spjup->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>&nbsp</td>
                                            <td>
                                                <form method="POST" action="{{ route('spjup_delete', $spjup->id) }}">
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
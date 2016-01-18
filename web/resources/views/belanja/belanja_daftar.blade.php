@extends('home.keuangan')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Belanja</h1>
    </div>
</div>
@if(Auth::user()->hasRole('subbag'))
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('belanja_buat') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus">&nbsp</span>Tambah Belanja
        </a>
    </div>
</div><br>
@endif

<div class="panel panel-primary">
    <div class="panel-body">	
        @if(Auth::user()->hasRole('subbag'))    
        <form action="{{ route('excelsptb') }}" method="GET" enctype="multipart/form-data">
            <label class="col-md-1">Tahun</label>
            <div  class="col-md-3">
                 <select class="form-control" name="tahun">
                    <option value="">--</option>
                    @foreach($pagu as $data)
                    <option value="{{ $data->id }}" >{{ $data->tahun }}</option>
                    @endforeach
                </select>
            </div>
            <div  class="col-md-3">
                <input type="submit" value="Download" class="form-control btn-success">
            </div>
        </form>
        @else
        @endif
        <br><br><br>
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Sub Bagian/Program Studi</th>
                        <th>Nomor Tanda Bukti</th>
                        <th>Tanggal</th>
                        <th>Nomor BKU</th>
                        <th>Kode MA</th>
                        <th>MAK</th>
                        <th>Penerima</th>
                        <th>Uraian</th>
                        <th>Jumlah (Rp.)</th>
                        <th>Komentar</th>
                        @if(Auth::user()->hasRole('ktu') OR Auth::user()->hasRole('wd2') OR Auth::user()->hasRole('dekan'))
                        @else
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar_belanja as $belanja)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $belanja -> status }}</td>
                        <td>{{ $belanja -> user->ke_bagian->detail}}</td>
                        <td>{{ $belanja -> no_tanda_bukti }}</td>
                        <td>{{ $belanja -> tgl }}</td>
                        <td>{{ $belanja -> no_bku }}</td>
                        <td>{{ $belanja -> Kode_MA }}</td>
                        <td>{{ $belanja -> MAK }}</td>
                        <td>{{ $belanja -> penerima }}</td>
                        <td>{{ $belanja -> uraian }}</td>
                        <td>{{ number_format($belanja -> jumlah, 0, ',', '.') }}</td>
                        <td style="text-align:center;vertical-align:middle">
                            <a href="{{ route('belanja_komentar', $belanja->id) }}" class="btn btn-success">Lihat</a>
                        </td>


                        <td style="text-align:center;vertical-align:middle">
                            <table margin="0" >
                            <tr>
                                <td>
                                    @if(Auth::user()->hasRole('subbag'))
                                        @if($belanja->status = 'diajukan')
                                            <form role="form" method="POST" action="{{ route('status_belanja_subbag', $belanja->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
                                                <input type="hidden" name="_method" value="PATCH">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button class="btn btn-primary" type="submit" value="Sesuai">Sesuai</button>
                                            </form>
                                        </td>
                                        <td>&nbsp</td>
                                        @else
                                            <fieldset disabled><a href="{{ route('status_belanja_subbag', $belanja->id) }}" class="btn btn-primary" value="sesuai" disabled>Sesuai</a></fieldset>
                                            </td>
                                        <td>&nbsp</td>
                                        @endif
                                            <td>
                                            <a href="{{ route('belanja_edit', $belanja->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                                <td>&nbsp</td>
                                            <td>
                                                <form method="POST" action="{{ route('belanja_delete', $belanja->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                                </form> 
                                            </td>
                                    @elseif(Auth::user()->hasRole('bpp'))
                                        @if($belanja->status = 'subbag')
                                            <form role="form" method="POST" action="{{ route('status_belanja_bpp', $belanja->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
                                                <input type="hidden" name="_method" value="PATCH">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button class="btn btn-primary" type="submit" value="Sesuai">Sesuai</button>
                                            </form>
                                            </td>
                                            <td>&nbsp</td>
                                        @else
                                        <a href="{{ route('status_belanja_bpp', $belanja->id) }}" class="btn btn-primary" disabled>Sesuai</a>
                                        </td>
                                        <td>&nbsp</td>
                                        @endif
                                    @elseif(Auth::user()->hasRole('ppk'))
                                        @if($belanja->status = 'bpp')
                                        <form role="form" method="POST" action="{{ route('status_belanja_ppk', $belanja->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
                                                <input type="hidden" name="_method" value="PATCH">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button class="btn btn-primary" type="submit" value="Sesuai">Sesuai</button>
                                            </form>
                                        </td>
                                        <td>&nbsp</td>
                                        @else
                                        <a href="{{ route('status_belanja_ppk', $belanja->id) }}" class="btn btn-primary" disabled>Sesuai</a>
                                        </td>
                                        <td>&nbsp</td>
                                        @endif
                                    @elseif(Auth::user()->hasRole('ktu') OR Auth::user()->hasRole('wd2') OR Auth::user()->hasRole('dekan'))
                                    @endif
                                
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

@stop

@section('script')
@parent

@stop
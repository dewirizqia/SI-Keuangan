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

<div class="panel panel-primary">
    <div class="panel-body">	
    	<a href="{{ route('belanja_buat') }}" class="btn btn-primary">
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
                        <th>Jumlah (Rp.)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>350</td>
                        <td>1</td>
                        <td>5742.002.002.051A</td>
                        <td>521111</td>
                        <td>Djawita/dkk</td>
                        <td>Honorarium Pramubakti Program Studi Teknik Sipil Non Reg. FT Unlam</td>
                        <td>5.950.000</td>
                        <td style="text-align:center;vertical-align:middle">
                            <table margin="0">
                            <tr><td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                    </form> 
                            </td></tr>
                            </table>                                    
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>351</td>
                        <td>2</td>
                        <td>5742.002.002.051A</td>
                        <td>521111</td>
                        <td>Djawita/dkk</td>
                        <td>Honorarium Pramubakti Program Studi Teknik Sipil Non Reg. FT Unlam</td>
                        <td>5.950.000</td>
                        <td style="text-align:center;vertical-align:middle">
                            <table margin="0">
                            <tr><td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="" accept-charset="UTF-8" style="margin:0 auto">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
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
@parent

@stop
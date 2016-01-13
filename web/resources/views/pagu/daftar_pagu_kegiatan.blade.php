@extends('home.keuangan')

@section('isi')

<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Batasan Pagu Kegiatan
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="" accept-charset="UTF-8" enctype ="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
            
            <div class="form-group">
                <label class="col-md-1" background="">Sub Ouput</label>
                <div  class="col-md-3">
                     <select class="form-control" name="id_suboutput" id="sub_output">
                        <option value="">--</option>
                        @foreach($ssuboutput as $u_suboutput)
                        <option value="{{ $u_suboutput->id }}" class="{{ $u_suboutput->id_output }}">{{ $u_suboutput->uraian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Input</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_input" id="input">
                        <option value="">--</option>
                        @foreach($sinput as $u_input)
                        <option value="{{ $u_input->id }}" class="{{ $u_input->id_suboutput }}">{{ $u_input->uraian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Sub Input</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_subinput" id="sub_input">
                        <option value="">--</option>
                        @foreach($ssubinput as $u_subinput)
                        <option value="{{ $u_subinput->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>&nbsp
            <div class="form-group">
                <label class="col-md-1">Akun</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_akun" id="akun">
                        <option value="">--</option>
                        @foreach($sakun as $akun)
                        <option value="{{ $akun->id }}" class="{{ $u_subinput->id_input }}">{{ $u_subinput->uraian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>&nbsp
            <div class="form-group">
                <label class="col-md-1">Tahun</label>
                <div  class="col-md-3">
                    <select class="form-control" name="id_pagu" id="tahun">
                        <option value="">--</option>
                        @foreach($daftar_pagu as $pagu)
                        <option value="{{ $pagu->id }}">{{ $pagu->tahun }}</option>
                        @endforeach
                    </select>
                </div>            
                <label class="col-md-1">Batasan</label>
                <div  class="col-md-3">
                    <input type="text" class="form-control" name="batasan">
                </div>
            </div><br><br><br>
            <div class="form-group">
                <div  class="col-md-3">
                    <input type="submit" value="Tambahkan" class="form-control btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>





<br>    

<div class="panel panel-primary">
    <div class="panel-heading">
        Daftar Pagu Kegiatan
    </div>
    <div class="panel-body">
        @if ($daftar_pagu_kegiatan->count())
        <div class="dataTable_wrapper">                
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tahun</th>
                        <th>Kode Kegiatan</th>
                        <th>PAgu Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar_pagu_kegiatan as $pagu_kegiatan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pagu_kegiatan->pagu->tahun }}</td>
                            <td>{{ $pagu_kegiatan->subinput->uraian }}</td>
                            <td>{{ $pagu_kegiatan->batasan }}</td>
                            <td>{{ $pagu_kegiatan->alokasi }}</td>
                            <td> 
                                <table> 
                                    <td>
                                        <a href="{{ route('edit_pagu_kegiatan', $pagu_kegiatan->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>&nbsp</td>
                                    <td>
                                        <form method="POST" action="{{route('delete_pagu_kegiatan', $pagu_kegiatan->id)}}" accept-charset="UTF-8" style="margin:0 auto">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                            <input id="confirm" class="btn btn-danger" data-toggle="confirmation" data-popout="true" type="submit" value="Delete">
                                        </form> 
                                    </td>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="panel-heading"><h3><center>Data Pagu Kegiatan Belum di Tambahkan</center></h3></div>
        @endif
    </div>
</div>
@stop

@section('script')
<!-- script dropdown select -->
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/jquery.min.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-1.0.1.js') }}"></script>
<xscript type="text/javascript" src="{{ asset('css/js/dropdown/zepto-selector.js') }}"></script>

<script src="{{ asset('css/js/jquery.chained.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
/* For jquery.chained.js */

    
    $("#input").chained("#sub_output");
    $("#sub_input").chained("#input");


    $("#sub_input").bind("change", function(event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#input")).val()) {
            $("#button").fadeIn();
        } else {
            $("#button").hide();
        }
    });

  });
</script>
@stop
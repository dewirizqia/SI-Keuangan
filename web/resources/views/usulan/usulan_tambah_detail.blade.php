@extends('home.admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')



<div class="panel panel-primary">
    <div class="panel-heading">
        Pengisian Usulan Anggaran
    </div>
    <div class="panel-body">
       
        <div class="dataTable_wrapper">                
            
   

<!--<form role="form" method="POST" action="{{ route('simpanusulandetail')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
    {{ csrf_field() }}-->

   <form action="{{ route('simpanusulandetail') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">


          <div class="form-group">
             <label>AKUN</label>
    <select class="form-control" name="id_akun">
        <option value="">--</option>
        @foreach($akun as $u_akun)
        <option value="{{ $u_akun->id }}">({{ $u_akun->kode_akun }})  {{ $u_akun->uraian_akun }}</option>
        @endforeach
    </select>
        </div>
<label>Detail</label>
<br/><input style="width:600px" name="detail" type="text">
<br/><br/>
<table>
<tr>
<td><input style="width:50px" name="n1" type="text">&nbsp</td>
<td><input style="width:50px" name="k1" type="text"></td>
<td>&nbsp X &nbsp </td>
<td><input style="width:50px" name="n2" type="text">&nbsp</td>
<td><input style="width:50px" name="k2" type="text"></td>
<td>&nbsp X &nbsp </td>
<td><input style="width:50px" name="n3" type="text">&nbsp</td>
<td><input style="width:50px" name="k3" type="text"></td>
<td>&nbsp X &nbsp </td>
<td><input style="width:50px" name="n4" type="text">&nbsp</td>
<td><input style="width:50px" name="k4" type="text"></td>
</tr>
</table>

<br/>


<div class="col-md-1 contact-grid">
<label>SAT</label>
<br/><input style="width:80px" name="satuan" type="text">
</div>

<div class="col-md-2 contact-grid">
<label>HARGA SATUAN</label>
<br/><input name="harga_satuan" type="text">
</div>

<br/>
<br/> 
<br/>
<br/> 
<input type="hidden" name="prodi" value="{{ Auth::user()->id }}"/>
<input type="hidden" name="id_subinput" value="{{ $id_subinput }}"/>
<!-- <button type="submit" class="btn btn-primary">Tambah Detail</button>-->
     <input type="submit" class="btn btn-primary" value="Tambah Detail">
 </form>              		

           
        
        </div>
      
    </div>
</div>




@stop
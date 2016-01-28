@extends('home.admin')

@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop
@section('isi')



<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Sub Input
    </div>
    <div class="panel-body">
       
        <div class="dataTable_wrapper">                
            
   

<!--<form role="form" method="POST" action="{{ route('simpanusulandetail')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
    {{ csrf_field() }}-->

   <form action="{{ route('simpansubinput') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">


          <div class="form-group">

        </div>
<label>Kode Sub Input</label>
<br/><input style="width:100px" name="kode_subinput" type="text">
<br/>
<label>Uraian</label>
<br/><input style="width:600px" name="uraian" type="text">
<br/>


<br/>
<br/> 
<br/>
<br/> 
<input type="hidden" name="users_id" value="{{ Auth::user()->id }}"/>
<input type="hidden" name="id_input" value="{{ $id }}"/>
<input type="hidden" name="status" value="tambahan"/>
<!-- <button type="submit" class="btn btn-primary">Tambah Detail</button>-->
     <input type="submit" class="btn btn-primary" value="Tambah Sub Input">
 </form>                    

           
        
        </div>
      
    </div>
</div>




@stop

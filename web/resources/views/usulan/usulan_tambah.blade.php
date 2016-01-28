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
        
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                	<th>AKSI</th>
                    <th>KODE</th>
                    <th>PROGRAM/KEGIATAN/OUTPUT/SUBOUTPUT/KOMPONEN/SUBKOMP/AKUN/DETIL</th>
                    <th>JUMLAH BIAYA</th>
                </tr>
            </thead>
            <tbody>
              		
            		<tr>
                       <td></td>
                       <td style="text-align: center;">5742</td>
                       <td>PENINGKATAN LAYANAN TRIDHARMA PENDIDIKAN TINGGI</td>
                       <td></td>
                    </tr>

              		@foreach ($output as $outputs)
              		
              		<tr>
                       <td></td>
                       <td style="text-align: center;">5742.{!! $outputs->kode_output !!}</td>
                       <td>{!! $outputs->uraian !!}</td>
                       <td></td>
                    </tr>


	                    	@foreach ($sub_output as $sub_outputs)
	                    		@if($sub_outputs->id_output == $outputs->id)
	                    		<tr>
		                        <td></td>
		                        <td style="text-align: center;">5742.{!! $outputs->kode_output !!}.{!! $sub_outputs->kode_suboutput !!}</td>
		                        <td>{!! $sub_outputs->uraian !!}</td>
		                        <td></td>
		                        </tr>

		                        @foreach ($input as $inputs)
			                    		@if($inputs->id_suboutput == $sub_outputs->id)
			                    		<tr>
				                        <td> <button><a href="{{ route('tambah_subinput', $inputs->id) }}">+</a></button></td>
				                        <td style="text-align: center;">{!! $inputs->kode_input !!}</td>
				                        <td>{!! $inputs->uraian !!}</td>
				                        <td></td>
				                        </tr>



				                        @foreach ($sub_input as $sub_inputs)
				                        	@if($sub_inputs->id_input == $inputs->id)
                                  @if($sub_inputs->status == "wajib")
				                    		<tr>
					                        <td></td>
					                        <td style="text-align: center;">{!! $sub_inputs->kode_subinput !!}</td>
					                        <td><a href="{{ route('buatusulandetail', $sub_inputs->id) }}" >{!! $sub_inputs->uraian !!}</a>	</td>
					                        <td></td>
					                        </tr>
                                  @else
                                      @if($sub_inputs->users_id == $prodi)
                                      <tr>
                                       <td><form method="POST" action="{{ route('deletesubinput', $sub_inputs->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm"  data-toggle="confirmation" data-popout="true" type="submit" value="-">
                                                </form></td>
                                      <td style="text-align: center;">{!! $sub_inputs->kode_subinput !!}</td>
                                      <td><a href="{{ route('buatusulandetail', $sub_inputs->id) }}" >{!! $sub_inputs->uraian !!}</a> </td>
                                      <td></td>
                                      </tr>
                                      @else
                                      @endif

                                  @endif

					                        @else
					                        @endif
				                        @endforeach



			                        	@else

		                     		@endif

		                     		@endforeach



		                        @else

		                     @endif




	                        

                    	@endforeach



              		@endforeach
                    
               		
               		


                   
            </tbody>
            </table>
         
        </div>
      
    </div>
</div>




@stop
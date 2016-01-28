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
                    <th>VOL</th>
                    <th>SAT</th>
                    <th>HARGA SATUAN</th>
                    <th>JUMLAH BIAYA</th>
                </tr>
            </thead>
            <tbody>
              		
            		<tr>
                       <td></td>
                       <td style="text-align: center;">5742</td>
                       <td>PENINGKATAN LAYANAN TRIDHARMA PENDIDIKAN TINGGI</td>
                       <td></td>
                    <td></td>
                    <td></td>
                       <td></td>
                    </tr>

              		@foreach ($output as $outputs)
              		
              		<tr>
                       <td></td>
                       <td style="text-align: center;">5742.{!! $outputs->kode_output !!}</td>
                       <td>{!! $outputs->uraian !!}</td>
                       <td></td>
                    <td></td>
                    <td></td>
                       <td></td>
                    </tr>


	                    	@foreach ($sub_output as $sub_outputs)
	                    		@if($sub_outputs->id_output == $outputs->id)
	                    		<tr>
		                        <td></td>
		                        <td style="text-align: center;">5742.{!! $outputs->kode_output !!}.{!! $sub_outputs->kode_suboutput !!}</td>
		                        <td>{!! $sub_outputs->uraian !!}</td>
                            <td></td>
                    <td></td>
                    <td></td>
		                        <td></td>
		                        </tr>

		                        @foreach ($input as $inputs)
			                    		@if($inputs->id_suboutput == $sub_outputs->id)
			                    		<tr>
				                        <td> <button><a href="{{ route('tambah_subinput', $inputs->id) }}">+ SubInput</a></button></td>
				                        <td style="text-align: center;">{!! $inputs->kode_input !!}</td>
				                        <td>{!! $inputs->uraian !!}</td>
                                <td></td>
                    <td></td>
                    <td></td>
				                        <td></td>
				                        </tr>



				                        @foreach ($sub_input as $sub_inputs)
				                        	@if($sub_inputs->id_input == $inputs->id)
                                  @if($sub_inputs->status == "wajib")

                                  <?php $total=0;
                                  $totalsl=0; ?>
                                  @foreach($usulan as $harga)
                                  @if($harga->id_subinput == $sub_inputs->id && $harga->prodi == $prodi) 
                                  <?php
                                 $total = $harga->jumlah;
                                  $totalsl = $totalsl + $total;
                                 ?>
                                  @endif
                                 @endforeach    


				                    		<tr>
					                        <td><button><a href="{{ route('tambah_usulan_detail', $sub_inputs->id) }}" >+ Akun</a></button></td>
					                        <td style="text-align: center;">{!! $sub_inputs->kode_subinput !!}</td>
					                        <td>{!! $sub_inputs->uraian !!}</td>
                                  <td></td>
                    <td></td>
                    <td></td>
					                        <td>{{ $totalsl }}</td>
					                        </tr>







@foreach ($usulan as $usulans)
 @if($usulans->id_subinput == $sub_inputs->id && $usulans->prodi == $prodi)                     
                      @foreach ($akun as $akuns)

                      
                      <?php $total=0;
                      $totalsl=0; ?>

                      @foreach($usulan as $totals)
                      @if($totals->id_subinput == $sub_inputs->id && $totals->prodi == $prodi)
                      @if($totals->id_akun == $akuns->id)
                      <?php
                      $total = $totals->jumlah;
                      $totalsl = $totalsl + $total;
                      ?>
                      @else
                      @endif
                      @else
                      @endif
                      @endforeach

                      @if($usulans->id_akun == $akuns->id)

      
                      @if($lama != $akuns->id)

                      
                      <tr>
                      <td></td>
                      <td style="text-align: center;">{!! $akuns->kode_akun!!}</td>
                      <td>{!! $akuns->uraian_akun!!}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{$totalsl}}</td>
                      </tr>



                          @foreach($usulan as $detail)
                          @if($detail->id_subinput == $sub_inputs->id && $detail->prodi == $prodi)
                          @if($akuns->id == $detail->id_akun)
                          <tr>
                          <td><form method="POST" action="{{ route('deleteusulandetail', $detail->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm"  data-toggle="confirmation" data-popout="true" type="submit" value="- Detail">
                                                </form> </td>
                          <td></td>
                          <td>{!!$detail->detail !!}
                          <td>{!! $detail->nominal!!}</td>
                          <td>{!! $detail->satuan!!}</td>
                          <td>{!! $detail->harga_satuan!!}</td>
                          <td>{!! $detail->jumlah!!}</td>
                          </tr>
                          @else
                          @endif
                          @else
                         @endif
                          @endforeach
                          <?php $lama = $akuns->id ?>
                          @else
                          @endif

                          

                          @else
                          @endif

                      

                      @endforeach
 @else
                      @endif

            @endforeach     






                                  @else
                                      @if($sub_inputs->users_id == $prodi)
                                      <?php $total=0;
                                  $totalsl=0; ?>
                                  @foreach($usulan as $harga)
                                  @if($harga->id_subinput == $sub_inputs->id && $harga->prodi == $prodi) 
                                  <?php
                                 $total = $harga->jumlah;
                                  $totalsl = $totalsl + $total;
                                 ?>
                                  @endif
                                 @endforeach    

                                      <tr>
                                       <td><form method="POST" action="{{ route('deletesubinput', $sub_inputs->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm"  data-toggle="confirmation" data-popout="true" type="submit" value="- SubInput">
                                                </form><button><a href="{{ route('tambah_usulan_detail', $sub_inputs->id) }}" >+ Akun</a></button></td>
                                      <td style="text-align: center;">{!! $sub_inputs->kode_subinput !!}</td>
                                      <td><a href="{{ route('buatusulandetail', $sub_inputs->id) }}" >{!! $sub_inputs->uraian !!}</a> </td>
                                      <td></td>
                    <td></td>
                    <td></td>
                                      <td>{{ $totalsl }}</td>
                                      </tr>



<?php $lama = ""; ?>


@foreach ($usulan as $usulans)
 @if($usulans->id_subinput == $sub_inputs->id && $usulans->prodi == $prodi)                     
                      @foreach ($akun as $akuns)

                      
                      <?php $total=0;
                      $totalsl=0; ?>

                      @foreach($usulan as $totals)
                      @if($totals->id_subinput == $sub_inputs->id && $totals->prodi == $prodi)
                      @if($totals->id_akun == $akuns->id)
                      <?php
                      $total = $totals->jumlah;
                      $totalsl = $totalsl + $total;
                      ?>
                      @else
                      @endif
                      @else
                      @endif
                      @endforeach

                      @if($usulans->id_akun == $akuns->id)

      
                      @if($lama != $akuns->id)

                      
                      <tr>
                      <td></td>
                      <td style="text-align: center;">{!! $akuns->kode_akun!!}</td>
                      <td>{!! $akuns->uraian_akun!!}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{$totalsl}}</td>
                      </tr>



                          @foreach($usulan as $detail)
                          @if($detail->id_subinput == $sub_inputs->id && $detail->prodi == $prodi)
                          @if($akuns->id == $detail->id_akun)
                          <tr>
                          <td><form method="POST" action="{{ route('deleteusulandetail', $detail->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm"  data-toggle="confirmation" data-popout="true" type="submit" value="- Detail">
                                                </form> </td>
                          <td></td>
                          <td>{!!$detail->detail !!}
                          <td>{!! $detail->nominal!!}</td>
                          <td>{!! $detail->satuan!!}</td>
                          <td>{!! $detail->harga_satuan!!}</td>
                          <td>{!! $detail->jumlah!!}</td>
                          </tr>
                          @else
                          @endif
                          @else
                         @endif
                          @endforeach
                          <?php $lama = $akuns->id ?>
                          @else
                          @endif

                          

                          @else
                          @endif

                      

                      @endforeach
 @else
                      @endif

            @endforeach 









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
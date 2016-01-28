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
                    <th>URAIAN</th>
                    <th>VOL</th>
                    <th>SAT</th>
                    <th>HARGA SATUAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
              <?php $total=0;
                      $totalsl=0; ?>
             @foreach($usulan as $harga)
                     <?php
                      $total = $harga->jumlah;
                      $totalsl = $totalsl + $total;
                      ?>
             @endforeach 		
              	
      
                     
                     	
                  		<tr>
                      <td><button><a href="{{ route('tambah_usulan_detail', $sub_input->id) }}" >+</a></button></td>
                      <td style="text-align: center;">{!! $sub_input->kode_subinput !!}</td>
                      <td>{!! $sub_input->uraian !!}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{ $totalsl }}</td>
                      </tr>
                      
            
            @foreach ($usulan as $usulans)
                      
                      @foreach ($akun as $akuns)

                      
                      <?php $total=0;
                      $totalsl=0; ?>

                      @foreach($usulan as $totals)
                      @if($totals->id_akun == $akuns->id)
                      <?php
                      $total = $totals->jumlah;
                      $totalsl = $totalsl + $total;
                      ?>
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
                          @if($akuns->id == $detail->id_akun)
                          <tr>
                          <td><form method="POST" action="{{ route('deleteusulandetail', $detail->id) }}" accept-charset="UTF-8" style="margin:0 auto">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                                    <input id="confirm"  data-toggle="confirmation" data-popout="true" type="submit" value="-">
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
                          @endforeach
                          <?php $lama = $akuns->id ?>
                      @else
                      @endif

                      

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
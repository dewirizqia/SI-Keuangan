@extends('@layout.base_admin')
@section('head')
<link href="{{ asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('isi')
<br>
<a href="{{ route('buat_user')}}"><button type="button" class="btn btn-primary">Tambah</button></a>
<br>
<br>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if ($suser->count())
                        <div class="panel-heading">
                            Daftar User:                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suser as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="">{{ $user->nama }}</a></td>
                            @if($user->nip == '')
                                <td>-</td>
                            @else
                                <td>{{ $user->nip }}</td>
                            @endif
                        
                        
                        <td>
                            @foreach($user->detail_user as $detail)
                                {{$detail->jabatan}}<br>
                            @endforeach
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td> 
                            <table> 
                                <td>
                                    <a href="{{ route('edit_user', $user->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>&nbsp</td>
                                <td>
                                    <form method="POST" action="{{route('delete_user', $user->id)}}" accept-charset="UTF-8" style="margin:0 auto">
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
                            <!-- /.table-responsive -->
                        </div>

                        @else
                            <div class="panel-heading"><h3><center>Data User Belum di Tambahkan<center></h3></div>
                        @endif
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@stop

@section('script')
@stop
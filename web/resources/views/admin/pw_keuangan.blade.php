@extends('home.keuangan')

@section('isi')
@if (Session::has('pesan'))
         <div class="alert alert-info">
            <h3>{{ Session::get('pesan') }}</h3>
         </div>   
@endif
        <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Sepertinya ada kesalahan.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('update_password')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>


                     <div class="form-group">
                            <label class="col-md-4 control-label">Password Lama</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_lama">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password baru</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Konfirmasi Password baru</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>




    
@stop
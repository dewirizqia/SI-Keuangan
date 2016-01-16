@extends('@layout.base_admin')

@section('isi')


<br>
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

<form role="form" method="POST" action="{{ route('simpan_user')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

	<div class="form-group">
        <label>Nama</label>
        <input class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>NIP</label>
        <input class="form-control" name="nip">
    </div>

    <div class="form-group">
        <label> <h4>Level</h4> </label>
        <select name="role" class="form-control">
        @foreach ($roles as $role)
        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
        @endforeach
        </select>
      </div>
<!--     <div class="form-group">
        <label>Level</label>
        <select class="form-control" name="jabatan">
            <option value="dekan">Dekan</option>
            <option value="wd">Wakil Dekan II</option>
            <option value="keuangan">Subbagian Keuangan</option>
            <option value="bpp">BPP</option>
            <option value="ppk">PPK</option>
            <option value="ktu">KTU</option>
            <option value="bagian">Admin Prodi</option>
            <option value="bagian">Admin Subbagian</option>
        </select>
    </div> -->

    <div class="form-group">
        <label>Bagian</label>
        <select class="form-control" name="id_bagian">
            @foreach($sbagian as $bagian)
            <option value="{{ $bagian->id}}">{{ $bagian->detail}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>username</label>
        <input class="form-control" name="name">
    </div>

    
    <div class="form-group">
    	<label>Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Tambah User</button>
</form>
    <br>


@stop
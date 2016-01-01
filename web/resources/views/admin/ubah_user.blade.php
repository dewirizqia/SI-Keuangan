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

<form role="form" method="POST" action="{{ route('simpan_pagu')}}" accept-charset="UTF-8" enctype ="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

	<div class="form-group">
        <label>Nama</label>
        <input class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>NIP</label>
        <input class="form-control" name="nip">
    </div>
    <select class="form-control" name="jabatan">
        <option>Admin Bagian</option>
        <option>Dekan</option>
        <option>Wakil Dekan II</option>
        <option>Subbag Keuangan</option>
        <option>BPP</option>
        <option>PPK</option>
        <option>KTU</option>
    </select>

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


@stop
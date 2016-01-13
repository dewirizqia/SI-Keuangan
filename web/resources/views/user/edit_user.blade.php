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

<form role="form" method="POST" action="{{ route('update_user', $user->id) }}" accept-charset="UTF-8" enctype ="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">      
    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" name="nama" value="{{ $user -> nama}}">
    </div>
    <div class="form-group">
        <label>NIP</label>
        <input class="form-control" name="nip" value="{{ $user -> nip}}">
    </div>
    <div class="form-group">
        <label> Level </label>
        <select name="role" class="form-control">
        <option value="{{ $role_user->name }}">{{ $role_user->display_name }}</option>
        @foreach ($roles as $role)
        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
        @endforeach
        </select>
      </div>
    <div class="form-group">
        <input type="checkbox" name="subbag" value="1"> Subbag Keuangan<br>
    </div>

    <div class="form-group">
        <label>Bagian</label>
        <select class="form-control" name="id_bagian">
            <option value="{{ $user->id_bagian}}">{{ $user->ke_bagian->detail}}</option>
            @foreach ($sbagian as $bagian)
            <option value="{{ $bagian->id }}">{{ $bagian->detail }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>username</label>
        <input class="form-control" name="name" value="{{ $user -> name}}">
    </div>

    
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user -> email}}">
    </div>
<!-- 
    <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-control" name="password" value="{{ $user -> password}}">
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" value="{{ $user -> password}}">
    </div> -->

    <br>
    <button type="submit" class="btn btn-primary">Edit User</button>
</form>
    <br>


@stop
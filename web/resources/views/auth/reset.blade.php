@extends('auth.login')

@section('keterangan')
<p>Masukkan E-mail dan Password</p>
@stop

@section('form')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
	{!! csrf_field() !!}
	<input type="hidden" name="token" value="{{ $token }}">

	<div class="form-group">
		<label class="col-md-4 control-label">E-Mail Address</label>
		<div class="col-md-6">
			<input type="email" class="form-control" name="email" value="{{ old('email') }}">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">Confirm Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password_confirmation">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Reset Password
			</button>
		</div>
	</div>
</form>
@stop
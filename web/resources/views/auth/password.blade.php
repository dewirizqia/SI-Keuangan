@extends('auth.login')

@section('keterangan')
<p>Masukkan E-mail Address</p>
@stop

@section('form')
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
	{!! csrf_field() !!}

	<div class="form-group">
		<label class="col-md-4 control-label">E-Mail Address</label>
		<div class="col-md-6">
			<input type="email" class="form-control" name="email" value="{{ old('email') }}">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Send Password Reset Link
			</button>
		</div>
	</div>
</form>
@stop
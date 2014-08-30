@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Login to your account</h2>
</div>

{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}

	<!-- Name -->
	<div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
		{{ Form::label('username', 'Username', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('username', Input::old('username')) }}
			{{ $errors->first('username') }}
		</div>
	</div>

	<!-- Name -->
	<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
		{{ Form::label('password', 'Password', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::password('password', Input::old('password')) }}
			{{ $errors->first('password') }}
		</div>
	</div>

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Login', array('class' => 'btn')) }}
		</div>
	</div>

{{ Form::close() }}
@stop

@extends('layouts.master')

@section('title')
@parent
:: Add Section
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Add a Section</h2>
</div>

 
	{{ Form::model(new Section, ['route' => ['sections.store']]) }}
		@include('section/partials/_form', ['submit_text' => 'Create Section'])
	{{ Form::close() }}
@stop
@extends('layouts.master')

@section('title')
@parent
:: Add Note
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Add a Note</h2>
</div>

 
	{{ Form::model(new Section, ['route' => ['notes.store']]) }}
		@include('note/partials/_form', ['submit_text' => 'Create Note'])
	{{ Form::close() }}
@stop
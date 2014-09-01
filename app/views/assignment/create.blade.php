@extends('layouts.master')

@section('title')
@parent
:: Add Assignment
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Add an Assignment</h2>
</div>

 
	{{ Form::model(new Assignment, ['route' => ['assignments.store']]) }}
		@include('assignment/partials/_form', ['submit_text' => 'Create Assignment'])
	{{ Form::close() }}
@stop
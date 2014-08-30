@extends('layouts.master')

@section('title')
@parent
:: Add Course
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Add a Course</h2>
</div>

 
	{{ Form::model(new Course, ['route' => ['courses.store']]) }}
		@include('course/partials/_form', ['submit_text' => 'Create Course'])
	{{ Form::close() }}
@stop
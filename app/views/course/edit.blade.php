@extends('layouts.master')

@section('title')
@parent
:: Add Course
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Edit Course</h2>
</div>
 
 
{{ $course->coursename }}

	{{ Form::model($course, ['method' => 'PATCH', 'route' => ['courses.update', $course->coursename]]) }}
		@include('course/partials/_form', ['submit_text' => 'Edit Course'])
	{{ Form::close() }}
@stop
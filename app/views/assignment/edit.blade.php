@extends('layouts.master')

@section('title')
@parent
:: Add Assignment
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Edit Assignment</h2>
</div>
 
 
	{{ Form::model($assignment, ['method' => 'PATCH', 'route' => ['assignments.update', $assignment->assignmentname]]) }}
		@include('assignment/partials/_form', ['submit_text' => 'Edit Assignment'])
	{{ Form::close() }}
@stop
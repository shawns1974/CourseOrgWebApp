@extends('layouts.master')

@section('title')
@parent
:: Add Section
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Edit Section</h2>
</div>
 
 
	{{ Form::model($section, ['method' => 'PATCH', 'route' => ['sections.update', $section->sectionname]]) }}
		@include('section/partials/_form', ['submit_text' => 'Edit Section'])
	{{ Form::close() }}
@stop
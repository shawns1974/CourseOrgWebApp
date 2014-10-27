@extends('layouts.master')

@section('title')
@parent
:: Add Note
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Edit Note</h2>
</div>
 
 
	{{ Form::model($section, ['method' => 'PATCH', 'route' => ['notes.update', $note->notetitle]]) }}
		@include('note/partials/_form', ['submit_text' => 'Edit Note'])
	{{ Form::close() }}
@stop
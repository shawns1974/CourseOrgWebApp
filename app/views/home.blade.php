@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Hello</h1>
<p>

@if(Auth::check())
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2>Courses</h2>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      @forelse (Auth::user()->courses as $course)
        <li class="list-group-item"><strong>{{ $course->coursename }}</strong>
        {{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('courses.destroy', $course->coursename))) }}
          {{ link_to_route('courses.show', 'View', array($course->coursename), array('class' => 'btn btn-xs btn-success')) }}
          {{ link_to_route('courses.edit', 'Edit', array($course->coursename), array('class' => 'btn btn-xs btn-info')) }}
          {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
        {{ Form::close() }}
      @empty
        <li class="list-group-item"><b>You don't have any courses yet</b></li>
      @endforelse
    </ul>  
  </div>
</div>
@endif

</p>
@stop

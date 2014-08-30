@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Hello</h1>
<p>

@if(Auth::check())
<ul>

  @forelse (Auth::user()->courses as $course)
    <li>{{ $course->coursename }}
(
						{{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('courses.destroy', $course->coursename))) }}
							{{ link_to_route('courses.edit', 'Edit', array($course->coursename), array('class' => 'btn btn-info')) }},
 
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					)
    </li>
  @empty
    <li><b>You don't have any courses yet</b></li>
  @endforelse
</ul>
@endif

</p>
@stop

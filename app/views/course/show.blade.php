@extends('layouts.master')

@section('title')
@parent
:: {{ $course->coursename}}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>{{ $course->coursename }}</h2>	
	<div class="row">
	<div class="col-sm-6 left" role="tablist" id="classTab">
	{{ HTML::link('#classInfo', 'Class Info', array('role' => 'tab','data-toggle' => 'tab')) }} | 
	{{ HTML::link('#classNotes', 'Notes', array('role' => 'tab','data-toggle' => 'tab')) }}
	<span class="badge">42</span> | 
	{{ HTML::link('#classAssignments', 'Assignments', array('role' => 'tab','data-toggle' => 'tab')) }}
	<span class="badge">42</span>
	</div>
	<div class="col-sm-6 courseNavs">
	  {{ link_to_route('courses.edit', 'Edit Class', array($course->coursename), array('class' => 'btn btn-xs btn-info')) }}
	  {{ link_to_route('courses.edit', 'Add Note', array($course->coursename), array('class' => 'btn btn-xs btn-info')) }}
	  {{ link_to_route('assignments.create', 'Add Assignment', array($course->id), array('class' => 'btn btn-xs btn-info')) }}
	</div>
	</div>
</div>

<div class="tab-content">
  
  <!-- This is the Class Information Pane -->

  <div class="tab-pane active" id="classInfo">
    <div class="well">
      <p>{{ $course->description}}
      @if ($course->websiteURL != "")
      <p>
        <a href="{{ $course->websiteURL }}" class="btn btn-sm btn-info" target="_blank">Class URL</a>
      </p>
      @endif
      </p>
    </div>
  </div>

  <!-- This is the Class Notes Pane -->

  <div class="tab-pane" id="classNotes">
    <div class="well">
      <p>Class Notes will go here
      </p>
    </div>
  </div>

  <!-- This is the Class Assignments Pane -->
  
  <div class="tab-pane" id="classAssignments">
    @if(Auth::check())
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2>Assignments</h2>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      @forelse ($course->assignments as $assignment)
        <li class="list-group-item"><strong>{{ $assignment->assignmentname }}</strong>
        {{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('assignments.destroy', $assignment->assignmentname))) }}
          {{ link_to_route('assignments.show', 'View', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-success')) }}
          {{ link_to_route('assignments.edit', 'Edit', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-info')) }}
          {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
        {{ Form::close() }}
      @empty
        <li class="list-group-item"><b>You don't have any assignments yet</b></li>
      @endforelse
    </ul>  
  </div>
</div>
@endif
  </div>
  
</div>


@stop
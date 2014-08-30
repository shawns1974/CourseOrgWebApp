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
	  {{ link_to_route('courses.edit', 'Add Assignment', array($course->coursename), array('class' => 'btn btn-xs btn-info')) }}
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
    <div class="well">
      <p>Class Assignments will go here
      </p>
    </div>
  </div>
  
</div>


@stop
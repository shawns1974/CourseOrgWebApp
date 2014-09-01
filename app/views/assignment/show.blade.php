@extends('layouts.master')

@section('title')
@parent
:: {{ $assignment->assignmentname }}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
  <h1><span class="label label-primary">{{ $assignment->courses->coursename }}</span></h1>
	<h2>{{ $assignment->assignmentname }}</h2>	
	<div class="row">
	<div class="col-sm-6 left" role="tablist" id="classTab">
	{{ HTML::link('#assignmentInfo', 'Assignment Info', array('role' => 'tab','data-toggle' => 'tab')) }} | 
  {{ HTML::link('#assignmentMaterials', 'Materials', array('role' => 'tab','data-toggle' => 'tab')) }} | 
	{{ HTML::link('#assignmentNotes', 'Notes', array('role' => 'tab','data-toggle' => 'tab')) }}
	</div>
	<div class="col-sm-6 courseNavs">
	  {{ link_to_route('courses.show', 'View Class', array($assignment->courses->coursename), array('class' => 'btn btn-xs btn-info', )) }}
	  {{ link_to_route('assignments.edit', 'Edit Assignment', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-info')) }}
	</div>
	</div>
</div>

<div class="tab-content">
  
  <!-- This is the Class Information Pane -->

  <div class="tab-pane active" id="classInfo">
    <div class="well">
      <p>{{ $assignment->description}}
      @if ($assignment->externalURL != "")
      <p>
        <a href="{{ $assignment->externalURL }}" class="btn btn-sm btn-info" target="_blank">External Assignment URL</a>
      </p>
      @endif
      </p>
    </div>
  </div>

  <!-- This is the Assignment Material Pane -->

  <div class="tab-pane" id="assignmentMaterials">
    <div class="well">
      <p>Assignment Materials will go here
      </p>
    </div>
  </div>

  <!-- This is the Assignments Notes Pane -->
  
  <div class="tab-pane" id="assignmentNotes">
    <div class="well">
      <p>Assignments notes will go here
      </p>
    </div>
  </div>
  
</div>


@stop
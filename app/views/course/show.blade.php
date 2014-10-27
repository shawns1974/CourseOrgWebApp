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
	<span class="badge">{{ $course->assignments()->where('duedate', '>=', date( 'Y-m-d'))->get()->count(); }}</span>
	</div>
	<div class="col-sm-6 courseNavs">
	  {{ link_to_route('courses.edit', 'Edit Class', array($course->coursename), array('class' => 'btn btn-xs btn-info')) }}
    {{ link_to_route('sections.create', 'Add Section', array($course->id), array('class' => 'btn btn-xs btn-info')) }}
	  {{ link_to_route('notes.create', 'Add Note', array($course->id, 0), array('class' => 'btn btn-xs btn-info')) }}
	  {{ link_to_route('assignments.create', 'Add Assignment', array($course->id), array('class' => 'btn btn-xs btn-info')) }}
	</div>
	</div>
</div>

<?php
  $lateAssignments = $course::Find($course->id)->assignments()->where('duedate', '<', date( 'Y-m-d'))->where('turnedin', '=', '0')->get()->count();

?>

@if ($lateAssignments > 0)
<div class="alert alert-danger" role="alert">
  <strong>HEY AssButt!! You have {{ $course->assignments()->where('duedate', '<', date( 'Y-m-d'))->where('turnedin', '=', '0')->get()->count(); }} Assignments that are past due!!</strong>
  <br>

  <div class="panel-body">
    <ul class="list-group">
        @foreach($course->assignments()->where('duedate', '<', date( 'Y-m-d'))->where('turnedin', '=', '0')->get() as $assignment)
            <li class="list-group-item"><strong>{{ $assignment->assignmentname }}</strong>
              <br>
              Assignment was due: {{ $assignment->duedate}}
              <br>
                {{ link_to_route('assignments.show', 'View', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-success')) }}
                {{ link_to_route('assignments.edit', 'Edit', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-info')) }}
            </li>
        @endforeach
    </ul>
  </div>
</div>
@endif


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


<?php
  $courseSections = $course::Find($course->id)->sections()->orderBy('rank', 'ASC')->get();

?>

  <div class="tab-pane" id="classNotes">
    <div class="well">
      <p>Class Notes will go here
      </p>
      <div class="panel-body">      
        <ul class='sortable' style="list-style:none;">
          @foreach($courseSections as $thisCat)
            <li class="list-group-item" id="{{ $thisCat->id }}">{{ $thisCat->sectionname }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

<script>
$(".sortable").sortable({
                update: function( event, ui ) {
                    var rank = $(this).sortable('toArray');
                    console.log(rank);
                    $.post('sectionReorder', { rank: rank });
                }
            }); 

</script>
  <!-- This is the Class Assignments Pane -->
  
  <div class="tab-pane" id="classAssignments">
    @if(Auth::check())
<div class="panel panel-primary">
  <div class="panel-heading">
    <h2>Assignments</h2>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      @forelse ($course->assignments()->where('duedate', '>=', date( 'Y-m-d'))->orderBy('duedate','asc')->get() as $assignment)
        <li class="list-group-item"><strong>{{ $assignment->duedate }} - {{ $assignment->assignmentname }}</strong>
        {{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('assignments.destroy', $assignment->assignmentname))) }}
          {{ link_to_route('assignments.show', 'View', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-success')) }}
          {{ link_to_route('assignments.edit', 'Edit', array($assignment->assignmentname), array('class' => 'btn btn-xs btn-info')) }}
          {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) }}
        {{ Form::close() }}
      @empty
        <li class="list-group-item"><b>You don't have any pending assignments</b></li>
      @endforelse
    </ul>  
  </div>
</div>
@endif
  </div>
  
</div>


@stop
@extends('layouts.master')

@section('title')
@parent
:: {{ $note->notetitle }}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
  <h1><span class="label label-primary">{{ $note->sections->sectionname }}</span></h1>
	<h2>{{ $note->notetitle }}</h2>	
	<div class="row">
	<div class="col-sm-6 left" role="tablist" id="classTab">
	{{ HTML::link('#noteInfo', 'Note Info', array('role' => 'tab','data-toggle' => 'tab')) }} | 
	{{ HTML::link('#sectionAssignments', 'Assignments', array('role' => 'tab','data-toggle' => 'tab')) }}
	</div>
	<div class="col-sm-6 courseNavs">
	  {{ link_to_route('sections.show', 'View Section', array($note->sections->sectionname), array('class' => 'btn btn-xs btn-info', )) }}
	  {{ link_to_route('notes.edit', 'Edit Note', array($note->notetitle), array('class' => 'btn btn-xs btn-info')) }}
	</div>
	</div>
</div>

<div class="tab-content">
  
  <!-- This is the Note Information Pane -->

  <div class="tab-pane active" id="classInfo">
    <div class="well">
      <p>{{ $note->description}}
     
      </p>
    </div>
  </div>

  <!-- This is the Section Assignments Pane -->
  
  <div class="tab-pane" id="assignmentNotes">
    <div class="well">
      <p>Section Assignments will go here
      </p>
    </div>
  </div>
  
</div>


@stop
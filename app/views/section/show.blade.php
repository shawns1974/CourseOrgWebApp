@extends('layouts.master')

@section('title')
@parent
:: {{ $section->sectionname }}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
  <h1><span class="label label-primary">{{ $section->courses->coursename }}</span></h1>
	<h2>{{ $section->sectionname }}</h2>	
	<div class="row">
	<div class="col-sm-6 left" role="tablist" id="classTab">
	{{ HTML::link('#sectionInfo', 'Section Info', array('role' => 'tab','data-toggle' => 'tab')) }} | 
  {{ HTML::link('#sectionNotes', 'Notes', array('role' => 'tab','data-toggle' => 'tab')) }} | 
	{{ HTML::link('#sectionAssignments', 'Assignments', array('role' => 'tab','data-toggle' => 'tab')) }}
	</div>
	<div class="col-sm-6 courseNavs">
	  {{ link_to_route('courses.show', 'View Class', array($section->courses->coursename), array('class' => 'btn btn-xs btn-info', )) }}
	  {{ link_to_route('sections.edit', 'Edit Section', array($section->sectionname), array('class' => 'btn btn-xs btn-info')) }}
	</div>
	</div>
</div>

<div class="tab-content">
  
  <!-- This is the Section Information Pane -->

  <div class="tab-pane active" id="classInfo">
    <div class="well">
      <p>{{ $section->description}}
     
      </p>
    </div>
  </div>

  <!-- This is the Section Notes Pane -->

  <div class="tab-pane" id="sectionNotes">
    <div class="well">
      <p>Section Notes will go here
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
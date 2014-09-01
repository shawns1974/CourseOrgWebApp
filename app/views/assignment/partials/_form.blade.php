<!-- The form Guts -->

	<!-- Course Name -->




	{{ Form::hidden('id', Input::old('id')) }}


	<div class="control-group {{{ $errors->has('coursename') ? 'error' : '' }}}">
		{{ Form::label('assignmentname', 'Assignment Name', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('assignmentname', Input::old('assignmentname')) }}
			{{ $errors->first('assignmentname') }}
		</div>
	</div>
	<br>


	<!-- Course  -->
	<div class="control-group">
	    <label class="control-label" for="body">Course</label>
	    <div class="controls">

	    	<?php


	    	if(isset($cid)) {
	    		$courseId = $cid;

	    	} else {
	    		$courseId = Input::old('course_id');
	    	}



	    	$courses = new Course;

	    	//$courses = Course::lists('coursename', 'id')->with(user->id,Auth::user()->getId());
	    	//$courses = Course::lists('coursename', 'id')->user()->where('id', '=', Auth::user()->getId())->get();
	    	//$courses = $tempCourse::lists('coursename', 'id');

	    	$courses = Auth::user()->courses->lists('coursename', 'id');
	    	//$courses = $tempcourses::lists('coursename', 'id');

	    	?>


	    	{{ Form::select('course_id', $courses, $courseId) }}
	    	
	    </div>
	 </div>
	 <!-- ./ Course Type -->
	 <br>



    <!-- Assign Date -->
    <div class="control-group {{{ $errors->has('assigndate') ? 'error' : '' }}}">
    	{{ Form::label('assigndate', 'Date Assigned', array('class' => 'control-label')) }}

    	<div class="controls">
            {{ Form::text('assigndate', Input::old('assigndate'), array( 'id' => 'assigndate', 'class' => 'span2', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Click for Date')) }}
    		{{ $errors->first('assigndate2') }}
    	</div>

    </div>
    <br>




	

    <!-- Due Date -->
    <div class="control-group {{{ $errors->has('duedate') ? 'error' : '' }}}">
    	{{ Form::label('duedate', 'Date Due', array('class' => 'control-label')) }}

    	<div class="controls">
            {{ Form::text('duedate', Input::old('duedate'), array('id' => 'duedate', 'class' => 'span2', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Click for Date')) }}
    		{{ $errors->first('duedate') }}
    	</div>
    </div>
    <br>




	<!-- Assignment Description -->
	<div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
		{{ Form::label('description', 'Assignment Description', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::textarea('description', Input::old('description')) }}
			{{ $errors->first('description') }}
		</div>
	</div>

	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
    </script>
    <br>

	<!-- Assignment Materials -->
	<div class="control-group {{{ $errors->has('materials') ? 'error' : '' }}}">
		{{ Form::label('materials', 'Assignment Materials', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::textarea('materials', Input::old('materials')) }}
			{{ $errors->first('materials') }}
		</div>
	</div>

	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'materials' );
    </script>
    <br>

	<!-- Assignment Notes -->
	<div class="control-group {{{ $errors->has('notes') ? 'error' : '' }}}">
		{{ Form::label('notes', 'Assignment Notes', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::textarea('notes', Input::old('notes')) }}
			{{ $errors->first('notes') }}
		</div>
	</div>

	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'notes' );
    </script>
    <br>

	<!-- External URL -->
	<div class="control-group {{{ $errors->has('websiteURL') ? 'error' : '' }}}">
		{{ Form::label('externalURL', 'External URL', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('externalURL', Input::old('externalURL')) }}
			{{ $errors->first('externalURL') }}
		</div>
	</div>
	<br>

	<!-- Completed -->

	<?php 

		if(! isset($completed)) {
			$completed = Input::old('completed');
		}

	?>

	<input type="checkbox" name="completed" id="completed" value="1" <?=$completed == 1 ? ' Checked' : ''; ?>>
	<label for="completed">Assignment Completed</label><br>

    <!-- Completed Date -->
    <div class="control-group {{{ $errors->has('completeddate') ? 'error' : '' }}}">
    	{{ Form::label('completeddate', 'Completed Due', array('class' => 'control-label')) }}

    	<div class="controls">
            {{ Form::text('completeddate', Input::old('completeddate'), array('id' => 'completeddate', 'class' => 'span2', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Click for Date')) }}
    		{{ $errors->first('completeddate') }}
    	</div>
    </div>
    <br>

	<!-- Turned In -->
	<?php

		if(! isset($turnedin)) {
			$turnedin = Input::old('turnedin');
		}
	
	?>

	<input type="checkbox" name="turnedin" id="completed" value="1" <?=$turnedin == 1 ? ' Checked' : ''; ?>>
	<label for="completed">Assignment Turned In</label><br>

    <!-- Turned In Date -->
    <div class="control-group {{{ $errors->has('turnedindate') ? 'error' : '' }}}">
    	{{ Form::label('turnedindate', 'Date Turned In', array('class' => 'control-label')) }}

    	<div class="controls">
            {{ Form::text('turnedindate', Input::old('turnedin'), array('id' => 'turnedindate', 'class' => 'span2', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Click for Date')) }}
    		{{ $errors->first('turnedindate') }}
    	</div>
    </div>
    <br>

    <!-- Number Correct -->
	<div class="control-group {{{ $errors->has('correct') ? 'error' : '' }}}">
		{{ Form::label('correct', 'Number Correct', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('correct', Input::old('correct')) }}
			{{ $errors->first('correct') }}
		</div>
	</div>
	<br>

	<!-- Number Possible -->
	<div class="control-group {{{ $errors->has('possible') ? 'error' : '' }}}">
		{{ Form::label('possible', 'Number Possible', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('possible', Input::old('possible')) }}
			{{ $errors->first('possible') }}
		</div>
	</div>
	<br>

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('submit Assignment', array('class' => 'btn')) }}
		</div>
	</div>

	

	<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			
			$('#assigndate').datepicker();
			$('#duedate').datepicker();
			$('#completeddate').datepicker();
			$('#turnedindate').datepicker();
			

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        
        var checkout = $('#assigndate').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');


        var checkout = $('#duedate').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');


        var checkout = $('#completeddate').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');


        var checkout = $('#turnedindate').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		
		
		


		});





	</script>
</script>

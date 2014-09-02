<!-- The form Guts -->

	<!-- Course Name -->




	{{ Form::hidden('id', Input::old('id')) }}


	<div class="control-group {{{ $errors->has('sectionname') ? 'error' : '' }}}">
		{{ Form::label('sectionname', 'Course Section Name', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('sectionname', Input::old('sectionname')) }}
			{{ $errors->first('sectionname') }}
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

	    	$courses = Auth::user()->courses->lists('coursename', 'id');
	    	
	    	?>


	    	{{ Form::select('course_id', $courses, $courseId) }}
	    	
	    </div>
	 </div>
	 <!-- ./ Course Type -->
	 <br>


	<!-- Section Description -->
	<div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
		{{ Form::label('description', 'Section Description', array('class' => 'control-label')) }}

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

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('submit Section', array('class' => 'btn')) }}
		</div>
	</div>

	

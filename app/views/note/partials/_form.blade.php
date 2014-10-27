<!-- The form Guts -->

	<!-- Course Name -->




	{{ Form::hidden('id', Input::old('id')) }}


	<div class="control-group {{{ $errors->has('notetitle') ? 'error' : '' }}}">
		{{ Form::label('notetitle', 'Note Title', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('notetitle', Input::old('notetitle')) }}
			{{ $errors->first('notetitle') }}
		</div>
	</div>
	<br>


	<!-- Course  -->
	<div class="control-group">
	    <label class="control-label" for="body">Course</label>
	    <div class="controls">

	    	<?php


	    	if(isset($sid)) {
	    		$sectionId = $sid;

	    	} else {
	    		$sectionId = Input::old('section_id');
	    	}



	    	$courses = new Course;

	    	$courses = Auth::user()->courses->lists('sectionname', 'id');
	    	
	    	?>


	    	{{ Form::select('section_id', $sections, $sectionId) }}
	    	
	    </div>
	 </div>
	 <!-- ./ Course Type -->
	 <br>


	<!-- Section Description -->
	<div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
		{{ Form::label('description', 'Note Description', array('class' => 'control-label')) }}

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
			{{ Form::submit('Submit Note', array('class' => 'btn')) }}
		</div>
	</div>

	

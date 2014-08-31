<!-- The form Guts -->

	<!-- Course Name -->



	{{ Form::hidden('id', Input::old('id')) }}


	<div class="control-group {{{ $errors->has('coursename') ? 'error' : '' }}}">
		{{ Form::label('coursename', 'Course Name', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('coursename', Input::old('coursename')) }}
			{{ $errors->first('coursename') }}
		</div>
	</div>
	<br>

	<!-- Course Description -->
	<div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
		{{ Form::label('description', 'Course Description', array('class' => 'control-label')) }}

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

	<!-- Period Number -->
	<div class="control-group {{{ $errors->has('periodnum') ? 'error' : '' }}}">
		{{ Form::label('periodnum', 'Period Number', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('periodnum', Input::old('periodnum')) }}
			{{ $errors->first('periodnum') }}
		</div>
	</div>
	<br>

	<!-- Website URL -->
	<div class="control-group {{{ $errors->has('websiteURL') ? 'error' : '' }}}">
		{{ Form::label('websiteURL', 'Website URL', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('websiteURL', Input::old('websiteURL')) }}
			{{ $errors->first('websiteURL') }}
		</div>
	</div>
	<br>

	<!-- Course Type  -->
	<div class="control-group">
	    <label class="control-label" for="body">Course Type</label>
	    <div class="controls">

	    	@foreach (Coursetype::all() as $coursetype)
	    		<?php if ($myVar != "create"){ ?>
	    			<input type="checkbox" name="coursetypes[]" id="{{ 'courseType' + strval($coursetype->id) }}" value="{{ $coursetype->id }}" <?=in_array( strval($coursetype->id), $myVar) ? ' Checked' : ''; ?>>
	    		<?php } else { ?>
	    			<input type="checkbox" name="coursetypes[]" id="{{ 'courseType' + strval($coursetype->id) }}" value="{{ $coursetype->id }}">

	    		<?php } ?>
	    		<label for="courseType{{ $coursetype->id }}">{{ $coursetype->coursetype }}</label><br>

	    		
	    	@endforeach
	    	
	    </div>
	 </div>
	 <!-- ./ Course Type -->
	 <br>

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Add Course', array('class' => 'btn')) }}
		</div>
	</div>

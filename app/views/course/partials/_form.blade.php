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

	<!-- Course Description -->
	<div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
		{{ Form::label('description', 'Course Description', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::textarea('description', Input::old('description')) }}
			{{ $errors->first('description') }}
		</div>
	</div>

	<!-- Period Number -->
	<div class="control-group {{{ $errors->has('periodnum') ? 'error' : '' }}}">
		{{ Form::label('periodnum', 'Period Number', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::text('periodnum', Input::old('periodnum')) }}
			{{ $errors->first('periodnum') }}
		</div>
	</div>

	<!-- Website URL -->
	<div class="control-group {{{ $errors->has('websiteURL') ? 'error' : '' }}}">
		{{ Form::label('websiteURL', 'Website URL', array('class' => 'control-label')) }}

		<div class="controls">
			{{ Form::textarea('websiteURL', Input::old('websiteURL')) }}
			{{ $errors->first('websiteURL') }}
		</div>
	</div>

	<!-- Course Type  -->
	<div class="form-group">
	    <label class="col-md-2 control-label" for="body">Course Type</label>
	    <div class="col-md-10">

	    	
	    	@foreach (Coursetype::all() as $coursetype)
	    		<input type="checkbox" name="coursetypes[]" id="{{ 'courseType' + strval($coursetype->id) }}" value="{{ $coursetype->id }}" <?=in_array( strval($coursetype->id), $myVar) ? ' Checked' : ''; ?>>
	    		<label for="courseType{{ $coursetype->id }}">{{ $coursetype->coursetype }}</label>
	    		
	    	@endforeach
	    	
	    </div>
	 </div>
	 <!-- ./ Course Type -->

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Add Course', array('class' => 'btn')) }}
		</div>
	</div>

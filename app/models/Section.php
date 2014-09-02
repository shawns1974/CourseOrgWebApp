<?php
class Section extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sections';

	protected $fillable = array('sectionname', 'course_id', 'description', 'rank');


	/**
	 * Course relationship
	  */
	public function courses(){
		return $this->belongsTo('Course', 'course_id');
	}

}
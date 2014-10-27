<?php
class Section extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notes';

	protected $fillable = array('notetitle', 'section_id', 'noteaddeddate', 'description', 'rank');


	/**
	 * Course relationship
	  */
	public function courses(){
		return $this->belongsTo('Section', 'section_id');
	}

}
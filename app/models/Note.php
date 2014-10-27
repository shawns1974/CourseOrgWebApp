<?php
class Note extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notes';

	protected $fillable = array('notetitle', 'section_id', 'description', 'rank');


	/**
	 * Section relationship
	  */
	public function sections(){
		return $this->belongsTo('Section', 'section_id');
	}

}
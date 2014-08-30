<?php
class Coursetype extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'coursetypes';

	/**
	 * Course relationship
	  */
	public function courses(){
		return $this->belongsToMany('Course');
	}

}
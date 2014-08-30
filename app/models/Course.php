<?php
class Course extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';

	protected $fillable = array('coursename','periodnum','description','websiteURL');



	/**
	 * User relationship
	  */
	public function users(){
		  return $this->belongsToMany('User');
	}


	/**
	 * Course Type relationship
	  */
	public function coursetypes(){
		return $this->belongsToMany('Coursetype');
	}

}
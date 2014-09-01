<?php
class Assignment extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assignments';

	protected $fillable = array('assignmentname', 'assigndate', 'duedate', 'classid', 'userid', 'description', 'materials', 'notes', 'externalURL', 'completed', 'completeddate', 'turnedin', 'turnedindate', 'grade');



	/**
	 * User relationship
	  */
	public function users()
    {
        return $this->hasOne('User');
    }


	/**
	 * Course relationship
	  */
	public function courses(){
		return $this->belongsTo('Course', 'course_id');
	}

}
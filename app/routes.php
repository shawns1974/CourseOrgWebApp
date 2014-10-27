<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


	Route::get('/', 'HomeController@showWelcome'); 


// Authentication
    Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');

	
// Secure-Routes
Route::group(array('before' => 'auth'), function()
{
    Route::get('secret', 'HomeController@showSecret');
    //Route::get('addCourse', 'CourseController@showCourse');
    //Route::post('addCourse', 'CourseController@postCourse');    
    //Route::post('editCourse', 'CourseController@editCourse');

    // Let's try to do it CRUD style

    // Course Routes

    Route::model('courses', 'Course');


    // This route reorders the course sections from the course/show view

    Route::any('courses/sectionReorder', 'CourseController@reorderSections');

    Route::bind('courses', function($value, $route) {
        return Course::where('coursename', $value)->first();
    });

    Route::resource('courses','CourseController');



    // Assignment Routes

    Route::model('assignments', 'Assignment');

    Route::bind('assignments', function($value, $route) {
        return Assignment::where('assignmentname', $value)->first();
    });

    Route::resource('assignments','AssignmentController');
    
    // Section Routes

    Route::model('sections', 'Section');

    Route::bind('sections', function($value, $route) {
        return Section::where('sectionname', $value)->first();
    });


    Route::resource('sections','SectionController');


    // Note Routes

    Route::model('notes', 'Note');

    Route::bind('notes', function($value, $route) {
        return Section::where('notetitle', $value)->first();
    });


    Route::resource('notes','NoteController');



});

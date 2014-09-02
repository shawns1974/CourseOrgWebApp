<?php

class CourseController extends BaseController {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $this->layout->content = View::make('course.create')->with('myVar', 'create');

        //return View::make('course/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store()
    {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $coursedata = array(
            'coursename' => Input::get('coursename'),
            'periodnum' => Input::get('periodnum'),
            'description' => Input::get('description'),
            'websiteURL' => Input::get('websiteURL')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'coursename'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($coursedata, $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('courses/create')->withInput()->withErrors($validator);
        } else {

            $Course = new Course;

            $Course->coursename = Input::get('coursename');
            $Course->periodnum = Input::get('periodnum');
            $Course->description = Input::get('description');
            $Course->websiteURL = Input::get('websiteURL');


            $Course->save();

            //if (isset($input['coursetypes'])) {
                //foreach($input['coursetypes'] as $coursetypes) {
                    //$ctype = Coursetype::find($coursetypes);
                    //echo $ctype + " - ";
                    //$Course->coursetypes()->save($ctype);
                //}
            //}

            $Course->coursetypes()->sync(Input::get('coursetypes'));



            $user = new User;

            $user = User::find(Auth::user()->getId());

            // should add the correct user
            $Course->users()->save($user);

            
            $this->layout->content = View::make('course/show')->with('course', $Course)->with('success', 'Course Added Successfully');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Course $course)
    {
        //

        $this->layout->content = View::make('course/show')->with('course', $course);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Course $course)
    {
        

        //$course = Course::where('coursename', $course)->first();


        $cTypes = $course->coursetypes->lists('id','id');
        //
        if (isset($course)) {

        //return Redirect::to('')->with('success', $course->coursename);
        $this->layout->content = View::make('course/edit')->with('course', $course)->with('myVar', $cTypes);

        //return View::make('course/edit', $course);
        } 
        //
        //}




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Course $course)
    {
     // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        //$coursedata = array(
            //'coursename' => Input::get('coursename'),
            //'periodnum' => Input::get('periodnum'),
            //'description' => Input::get('description'),
            //'websiteURL' => Input::get('websiteURL')
        //);

        // Declare the rules for the form validation.
        $rules = array(
            'coursename'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        //$validator = Validator::make($coursedata, $rules);
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {

            return Redirect::to('courses/edit')->withInput()->withErrors($validator);
        } else {

            
            $Course = Course::find(Input::get('id'));

            $Course->coursename = Input::get('coursename');
            $Course->periodnum = Input::get('periodnum');
            $Course->description = Input::get('description');
            $Course->websiteURL = Input::get('websiteURL');


            $Course->save();

            //$Course->coursetypes()->delete();



            //if (isset($input['coursetypes'])) {
                //foreach($input['coursetypes'] as $coursetypes) {
                    //$ctype = Coursetype::find($coursetypes);
                    //echo $ctype + " - ";
                    //$Course->coursetypes()->save($ctype);
                //}
            //}

            $Course->coursetypes()->sync(Input::get('coursetypes'));

            $this->layout->content = View::make('course/show')->with('course', $Course)->with('success', 'Course Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     
     public function destroy(Course $course)
     {
        $course->delete();

        return Redirect::route('course/index')->with('message', 'Course deleted.');
    }

    // This function is used to reorder the sections

    public function reorderSections() {
      // Get the input from the jquery post
      $updateRecordsArray = Input::get('rank');
        $i = 1;

        // Loop though the <li>
        foreach ($updateRecordsArray as $recordID) {

            DB::table('sections')->where('id', '=', $recordID)->update(array('rank' => $i));
            $i++;
        }

        return Response::json('ok');  
}

}




 
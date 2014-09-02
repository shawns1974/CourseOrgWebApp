<?php

class SectionController extends BaseController {


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
        $courseid = Input::get('q');
        $this->layout->content = View::make('section.create')->with('cid', $courseid);

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
        $sectiondata = array(
            'sectionname' => Input::get('sectionname'),
            'course_id' => Input::get('course_id'),
            'description' => Input::get('description')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'sectionname'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($sectiondata, $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('sections/create')->withInput()->withErrors($validator);
        } else {

            $Section = new Section;

            $Section->sectionname = Input::get('sectionname');
            $Section->description = Input::get('description');
            $Section->course_id = Input::get('course_id');


            if ( DB::table('sections')->count() == 0) {

                $rank = 0;

            } else {

                $rank = Section::orderBy('rank', 'DESC')->first()->rank;

            }

            $Section->rank = $rank + 1;




            $Section->save();

            //if (isset($input['coursetypes'])) {
                //foreach($input['coursetypes'] as $coursetypes) {
                    //$ctype = Coursetype::find($coursetypes);
                    //echo $ctype + " - ";
                    //$Course->coursetypes()->save($ctype);
                //}
            //}

            
            $this->layout->content = View::make('section/show')->with('section', $Section)->with('success', 'Section Added Successfully');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Section $section)
    {
        //

        $this->layout->content = View::make('section/show')->with('section', $section);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Section $section)
    {
        

        if (isset($section)) {

        //return Redirect::to('')->with('success', $course->coursename);
        $this->layout->content = View::make('section/edit')
        ->with('section', $section)
        ->with('cid', $section->course_id);

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
    public function update(Section $section)
    {
     // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $sectiondata = array(
            'sectionname' => Input::get('sectionname'),
            'course_id' => Input::get('course_id'),
            'description' => Input::get('description')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'sectionname'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($sectiondata, $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('sections/create')->withInput()->withErrors($validator);
        } else {

            $Section = new Section;

            $Section->sectionname = Input::get('sectionname');
            $Section->description = Input::get('description');
            if (Input::get('currCourseID') != Input::get('course_id')){
                $Section->course_id = Input::get('course_id');

                $section->rank = Section::where('course_id', '=', Input:::get('course_id'))->orderBy('rank', 'DESC')->first()->rank + 1;
            }




            $Section->save();

            return Redirect::route('section/show')->with('section', $Section)->with('success', 'Section Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     
     public function destroy(Section $section)
     {
        $section->delete();

        return Redirect::route('sectino/index')->with('message', 'Section deleted.');
    }
}




 
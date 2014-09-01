<?php

class AssignmentController extends BaseController {


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
        $this->layout->content = View::make('assignment/create')->with('cid', $courseid)->with('completed', 0)->with('turnedin', 0);

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
        $assignmentdata = array(
            'assignmentname' => Input::get('assignmentname'),
            'course_id' => Input::get('course_id'),
            'assigndate' => Input::get('assigndate'),
            'duedate' => Input::get('duedate')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'course_id' => 'Required',
            'assignmentname' => 'Required',
            'assigndate' => 'Required',
            'duedate' => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('assignments/create')->withInput()->withErrors($validator);


        } else {

            $Assignment = new Assignment;

            $Assignment->course_id = Input::get('course_id');
            $Assignment->assignmentname = Input::get('assignmentname');
            $Assignment->user_id =Auth::user()->getId();
            $Assignment->assigndate = date("Y-m-d", strtotime(Input::get('assigndate')));
            $Assignment->duedate = date("Y-m-d", strtotime(Input::get('duedate')));
            $Assignment->description = Input::get('description');
            $Assignment->materials = Input::get('materials');
            $Assignment->notes = Input::get('notes');
            $Assignment->externalURL = Input::get('externalURL');
            if (Input::get('completed') == "1"){
                $Assignment->completed = 1;
            } else {
                $Assignment->completed = 0;
            }
            $Assignment->completeddate = date("Y-m-d", strtotime(Input::get('completeddate')));
            if (Input::get('turnedin') == "1"){
                $Assignment->turnedin = 1;
            } else {
                $Assignment->turnedin = 0;
            }

            $Assignment->turnedindate = date("Y-m-d", strtotime(Input::get('turnedindate')));


            if((Input::get('correct')) && (Input::get('possible')))
            {


                $corr = (int)Input::get('correct');
                $poss = (int)Input::get('possible');

                $gr = ($corr / $poss)*100;

                $Assignment->grade = round($gr , 0, PHP_ROUND_HALF_UP);

            }


            $Assignment->save();

            
            $this->layout->content = View::make('assignment/show')->with('assignment', $Assignment)->with('success', 'Assignment Added Successfully');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Assignment $assignment)
    {
        //

        $this->layout->content = View::make('assignment/show')->with('assignment', $assignment);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Assignment $assignment)
    {
        

        //
        if (isset($assignment)) {

        //return Redirect::to('')->with('success', $course->coursename);
        $this->layout->content = View::make('assignment/edit')
        ->with('assignment', $assignment)
        ->with('cid', $assignment->course_id)
        ->with('completed', $assignment->completed)
        ->with('turnedin', $assignment->turnedin);

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
    public function update(Assignment $assignment)
    {
     // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings




        // Declare the rules for the form validation.
        $rules = array(
            'assignmentname'  => 'Required',
            'course_id' => 'Required',
            'assignmentname' => 'Required',
            'assigndate' => 'Required',
            'duedate' => 'Required'
        );

        // Validate the inputs.
        //$validator = Validator::make($coursedata, $rules);
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {

            return Redirect::to('assignments/edit')->withInput()->withErrors($validator);

            

        } else {

            

             $Assignment = Assignment::find(Input::get('id'));

            $Assignment->course_id = Input::get('course_id');
            $Assignment->assignmentname = Input::get('assignmentname');
            $Assignment->user_id =Auth::user()->getId();
            $Assignment->assigndate = date("Y-m-d", strtotime(Input::get('assigndate')));
            $Assignment->duedate = date("Y-m-d", strtotime(Input::get('duedate')));
            $Assignment->description = Input::get('description');
            $Assignment->materials = Input::get('materials');
            $Assignment->notes = Input::get('notes');
            $Assignment->externalURL = Input::get('externalURL');
            if (Input::get('completed') == "1"){
                $Assignment->completed = 1;
            } else {
                $Assignment->completed = 0;
            }
            $Assignment->completeddate = date("Y-m-d", strtotime(Input::get('completeddate')));
            if (Input::get('turnedin') == "1"){
                $Assignment->turnedin = 1;
            } else {
                $Assignment->turnedin = 0;
            }

            $Assignment->turnedindate = date("Y-m-d", strtotime(Input::get('turnedindate')));


            $corr = (int)Input::get('correct');
            $poss = (int)Input::get('possible');


            $Assignment->save();






            $this->layout->content = View::make('assignment/show')->with('assignment', $Assignment)->with('success', 'Assignment Updated Successfully');


            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     
     public function destroy(Assignment $assignment)
     {
        $assignment->delete();

        return Redirect::route('assignments/index')->with('message', 'Assignment deleted.');
    }
}


<?php

class NoteController extends BaseController {


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
    public function create(string $cid, string $sid)
    {
        //
        //$sectionid = Input::get('q');
        $this->layout->content = View::make('note.create')->with('sid', $sid)->with('cid', $cid);

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
        $notedata = array(
            'notetitle' => Input::get('notetitle'),
            'section_id' => Input::get('section_id'),
            'description' => Input::get('description')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'notetitle'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($notedata, $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('notes/create')->withInput()->withErrors($validator);
        } else {

            $Note = new Note;

            $Note->notetitle = Input::get('notetitle');
            $Note->description = Input::get('description');
            $Note->section_id = Input::get('section_id');


            if ( DB::table('notes')->count() == 0) {

                $rank = 0;

            } else {

                $rank = Note::orderBy('rank', 'DESC')->first()->rank;

            }

            $Note->rank = $rank + 1;




            $Note->save();

            //if (isset($input['coursetypes'])) {
                //foreach($input['coursetypes'] as $coursetypes) {
                    //$ctype = Coursetype::find($coursetypes);
                    //echo $ctype + " - ";
                    //$Course->coursetypes()->save($ctype);
                //}
            //}

            
            $this->layout->content = View::make('note/show')->with('note', $Note)->with('success', 'Note Added Successfully');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Note $note)
    {
        //

        $this->layout->content = View::make('note/show')->with('note', $note);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Note $note)
    {
        

        if (isset($note)) {

        //return Redirect::to('')->with('success', $course->coursename);
        $this->layout->content = View::make('note/edit')
        ->with('note', $note)
        ->with('sid', $note->section_id);

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
    public function update(Note $note)
    {
     // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $notedata = array(
            'notetitle' => Input::get('notetitle'),
            'section_id' => Input::get('section_id'),
            'description' => Input::get('description')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'notetitle'  => 'Required',
            'description'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($notedata, $rules);

        // Check if the form validates with success.
        if ($validator->fails())
        {
            return Redirect::to('notes/create')->withInput()->withErrors($validator);
        } else {

            $Note = new Note;

            $Note->notetitle = Input::get('notetitle');
            $Note->description = Input::get('description');
            if (Input::get('currSectionID') != Input::get('section_id')){
                $Note->section_id = Input::get('section_id');

                $note->rank = Section::where('section_id', '=', Input::get('section_id'))->orderBy('rank', 'DESC')->first()->rank + 1;
            }




            $Note->save();

            return Redirect::route('note/show')->with('note', $Note)->with('success', 'Note Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     
     public function destroy(Note $note)
     {
        $note->delete();

        return Redirect::route('note/index')->with('message', 'Note deleted.');
    }
}




 
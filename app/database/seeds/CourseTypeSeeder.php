<?php
class CourseTypeSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('coursetypes')->delete();

        // add course type using Eloquent
        $user = new Coursetype;
        $user->coursetype = 'Math';
        $user->description = 'Math Course Type Description';
        $user->save();

        // add course type using Eloquent
        $user = new Coursetype;
        $user->coursetype = 'Science';
        $user->description = 'Science Course Type Description';
        $user->save();
 
        // add course type using Eloquent
        $user = new Coursetype;
        $user->coursetype = 'Social Studies';
        $user->description = 'Social Studies Course Type Description';
        $user->save();       
        
        // add course type using Eloquent
        $user = new Coursetype;
        $user->coursetype = 'English';
        $user->description = 'English Course Type Description';
        $user->save();

        // alternativ to eloquent we can also use direct database-methods
        /*
        User::create(array(
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'email'     => 'admin@localhost'
        ));
        */
    }
}
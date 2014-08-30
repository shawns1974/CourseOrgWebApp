<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('users')->delete();

        // add user using Eloquent
        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@localhost';
        $user->password = Hash::make('password');
        $user->save();

        // add user using Eloquent
        $user = new User;
        $user->username = 'Sera';
        $user->email = 'serabean99@gmail.com';
        $user->password = Hash::make('sera123');
        $user->save();

        // add user using Eloquent
        $user = new User;
        $user->username = 'Kat';
        $user->email = 'Kat@kat.com';
        $user->password = Hash::make('kat123');
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
<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'testJulian',
            'email' => 'testJulian@xtras.de',
            'password' => Hash::make('xtras'),

            'vorname' => 'Julian',
            'nachname' => 'Hilsberg',
            'firma' => 'hszg',

            'strasse' => 'Brückenstraße',
            'hausnummer' => '2',
            'ort' => 'Görlitz',
            'postleitzahl' => '02826',
            'land' => 'Deutschland'
        ));

        User::create(array(
            'username' => 'test',
            'email' => 'test@xtras.de',
            'password' => Hash::make('login'),

            'vorname' => 'Heinz',
            'nachname' => 'Bauer',
            'firma' => 'xtras',

            'strasse' => 'Nieskyer Straße',
            'hausnummer' => '120b',
            'ort' => 'Görlitz',
            'postleitzahl' => '02824',
            'land' => 'Deutschland'
        ));
    }

}
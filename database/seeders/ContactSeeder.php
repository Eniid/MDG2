<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Contact::create([
            'tel'    => '0400000000000',
            'e-mail'      => 'mdg@hotmail.com',
            'web'    => 'http://rotari.com',
        ]);


    }
}

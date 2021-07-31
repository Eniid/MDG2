<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;


class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        About::create([
            'mdg_title'    => 'Un Marché pour vous!',
            'mdg_desc'      => '<div>Un endroit agréable pour nous rencontré entre nous et faire la fête autour d\'une bière.&nbsp;</div>',
         
            'why_title'        => 'Pourquoi soutenir le marché ?',
            'why_desc'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        
            'rotari_title'        => 'Rotari Club de Namur',
            'rotari_desc'        => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',

        
        ]);
    }
}

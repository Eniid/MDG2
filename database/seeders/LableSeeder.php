<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lable;


class LableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Lable::create([
            'name'    => 'boisson',
            'color'      => '#40A0BF',
        ]);

        Lable::create([
            'name'    => 'nouritur',
            'color'      => '#85BF40',
        ]);       
        
        
        Lable::create([
            'name'    => 'belge',
            'color'      => '#BF4040',
        ]);



    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edition;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Edition::create([
            'edition_number'    => '1',
            'edition_date'      => '2001',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2001',
        ]);

        Edition::create([
            'edition_number'    => '2',
            'edition_date'      => '2002',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2002',
        ]);

        Edition::create([
            'edition_number'    => '3',
            'edition_date'      => '2003',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2003',
        ]);

        Edition::create([
            'edition_number'    => '4',
            'edition_date'      => '2004',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2004',
        ]);

        Edition::create([
            'edition_number'    => '5',
            'edition_date'      => '2005',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2005',
        ]);

        Edition::create([
            'edition_number'    => '6',
            'edition_date'      => '2006',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2006',
        ]);

        Edition::create([
            'edition_number'    => '7',
            'edition_date'      => '2007',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2007',
        ]);

        Edition::create([
            'edition_number'    => '8',
            'edition_date'      => '2008',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2008',
        ]);

        Edition::create([
            'edition_number'    => '9',
            'edition_date'      => '2009',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2009',
        ]);

        Edition::create([
            'edition_number'    => '10',
            'edition_date'      => '2010',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2010',
        ]);

        Edition::create([
            'edition_number'    => '18',
            'edition_date'      => '2018',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2018',
        ]);

        Edition::create([
            'edition_number'    => '19',
            'edition_date'      => '2019',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Juin 2019',
        ]);

        Edition::create([
            'edition_number'    => '20',
            'edition_date'      => '2021',
            'price'             => '15',
            'kids_price'        => '0',
            'aprox_date'        => 'Septembre 2021',
            'bigining_date'        => '2021-09-09 16:14:20.000000',
            'ending_date'        => '2021-09-11 16:14:28.000000',
            'catch'             => 'L\'édition 2021 du colèbre marché des gourmet vous acceuil une fois de plus au Vale Saint-Lambert pour un week-end fantastique entre amis.',
            'presentation'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',





        ]);






    }
}

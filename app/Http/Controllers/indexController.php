<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Contact;
use App\Models\Edition;
use App\Models\Sponsor;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Stripe\Stripe;



class indexController extends Controller
{
    //


    public function index(){
        $lastEdition = Edition::orderByDesc('edition_number')->first();

        $sponsors = Sponsor::all(); 

        $contact = Contact::all()->first(); 

        //var_dump($lastEdition);

        return view('welcome', compact('lastEdition', 'contact', 'sponsors'));
    }


}

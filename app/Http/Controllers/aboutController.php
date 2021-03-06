<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Edition;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class aboutController extends Controller
{



    
    public function index(){

        $lastEdition = Edition::orderByDesc('edition_number')->first();

        $sponsors = Sponsor::all(); 

        $contact = Contact::all()->first(); 

        $about = About::all()->first();

        


        return view('about', compact('lastEdition', 'contact', 'about', 'sponsors'));
    }



}

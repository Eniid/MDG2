<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Contact;
use App\Models\Edition;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    //

    public function index(){

        $lastEdition = Edition::orderByDesc('edition_number')->first();

        
        $sponsors = Sponsor::all(); 

        $contact = Contact::all()->first(); 


        return view('last', compact('lastEdition', 'contact', 'sponsors'));
    }




    public function last(){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $archives = Archive::paginate(5);
        $larchives = $archives->sortByDesc('edition_id')->with('archivepic');


        $contact = Contact::all()->first(); 

        


        return view('last', compact('lastEdition', 'contact', 'archives', 'larchives'));
    }

}

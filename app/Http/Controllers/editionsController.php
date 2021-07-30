<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Edition;
use App\Models\Archive;
use App\Models\Sponsor;
use App\Models\Request as Req;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

class editionsController extends Controller
{
    

    public function index(){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $larchives = Archive::with('archivepic')->orderBy('edition_id', 'desc')->paginate(10);
        $sponsors = Sponsor::all(); 



        $contact = Contact::all()->first(); 

        return view('last', compact('lastEdition', 'contact', 'larchives', 'sponsors'));
    }



}

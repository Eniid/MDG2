<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Edition;
use App\Models\Expo;
use App\Models\Lable;
use App\Models\Message;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    


    public function index(){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $sponsors = Sponsor::all(); 


        $contact = Contact::all()->first(); 


        return view('contact', compact('lastEdition', 'contact', 'sponsors'));
    }


    public function store(){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();

        $contact = Contact::all()->first(); 


        $mess = new Message(request()->validate(
            [
                'name' => 'required|min:4',
                'mail' => 'required|email',

            ]
        ));

        $mess->name = request('name');
        $mess->e_mail = request('mail');
        $mess->body = request('body');
        $mess->save();

        return redirect('/contact');
    }



}

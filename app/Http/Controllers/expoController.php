<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Edition;
use App\Models\Expo;
use App\Models\Lable;
use App\Models\Message;
use App\Models\Sponsor;
use App\Models\Request as Req;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Label;

class expoController extends Controller
{
    //

    public function index(Request $request){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $contact = Contact::all()->first(); 
        $lables = Lable::all();
        $exposants = Expo::where('this_year', 1)->with('lables')->paginate(6); 
        $sponsors = Sponsor::all(); 

        


       if ($request->query('s')) {
        $lable = $request->query('s');
        //dd($lable);
            $exposants = Expo::whereHas('lables', function (Builder $query) use ($lable) {
                $query->where('name', $lable);
            })->paginate(6);
        }


        if(request('search')){
            $re = request('search'); 
        $exposants = Expo::where('this_year', 1)->where('name', 'like', '%' .$re.'%')->orWhere('desciption', 'like', '%' .$re.'%')->where('this_year', 1)->with('lables')->paginate(6); 
        } 

        return view('exposant', compact('lastEdition', 'contact', 'lables', 'exposants', 'sponsors'));
    }







    public function ask(Request $request){
        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $contact = Contact::all()->first(); 
        $sponsors = Sponsor::all(); 


 
        return view('new_exp', compact('lastEdition', 'contact', 'sponsors'));
    }





    public function store(Request $request){


        $editions = Edition::all();
        $lastEdition = $editions->sortByDesc('edition_date')->first();
        $contact = Contact::all()->first(); 


        $re = new Req(request()->validate(
            [
                'name' => 'required|min:4',
                'mail' => 'required|email',
                's_name' => 'required',
                'prod' => 'required',
                'body' => 'required',
            ]
        ));

        $re->name = request('name');
        $re->e_mail = request('mail');
        $re->company_name = request('s_name');
        $re->products = request('prod');
        $re->link = request('link');
        $re->body = request('body');
        $re->appouved = 0;
        $re->save();


        return redirect('/exposants/demande');


    }







}
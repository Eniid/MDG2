<?php

namespace App\Http\Controllers;


use App\Models\Archive;
use App\Models\Contact;
use App\Models\Edition;
use App\Models\Sponsor;
use Stripe\Stripe;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

use App\Mail\TicketBought;

use Log;


use Illuminate\Http\Request;

class ShopController extends Controller
{
    

    public function buy(){
        

        $lastEdition = Edition::orderByDesc('edition_number')->first();


        $contact = Contact::all()->first(); 
        $sponsors = Sponsor::all(); 


            //echo json_encode(['id' => $checkout_session->id]);

        //FIN 

        //var_dump($lastEdition);

        return view('buy', compact('lastEdition', 'contact','sponsors'));
    }










    public function pay(Request $request){
        Stripe::setApiKey('sk_test_51I4y7oES2VuO6fZpy9wJc0Y2xtK517dgMukrzRWuMOf98eAZbCmmc5VQzdk0tq40ViZh2w4u8y2rCTnITydUYcHs00nVzKUyeg');


        $request->validate(
            [
                'card_name' => 'required|min:3',
                'number' => 'required|integer',
            ]
        );
        $sponsors = Sponsor::all(); 

        $card_name = $request->card_name; 
        $number = $request->number; 
        $mail = $request->mail; 


        $lastEdition = Edition::orderByDesc('edition_number')->first();

        $contact = Contact::all()->first(); 


        $price = $lastEdition ->price *100 * $number; 

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $price,
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');

        return view('buy_confirm', compact('lastEdition', 'mail', 'contact', 'sponsors', 'card_name', 'number', 'clientSecret' ));

    }




    public function pay_conf(){
        Stripe::setApiKey('sk_test_51I4y7oES2VuO6fZpy9wJc0Y2xtK517dgMukrzRWuMOf98eAZbCmmc5VQzdk0tq40ViZh2w4u8y2rCTnITydUYcHs00nVzKUyeg');
        
        $lastEdition = Edition::orderByDesc('edition_number')->first();



        $contact = Contact::all()->first(); 

        $price = $editions->price ; 
        dd($price);


        $intent = \Stripe\PaymentIntent::create([
            'amount' => 1099,
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');
            //echo json_encode(['id' => $checkout_session->id]);

        //FIN 

    
        //var_dump($lastEdition);

        return view('buy', compact('lastEdition', 'contact', 'clientSecret'));
    }

    public function send_tikets(Request $request){
        // $input =  $request->all();
        // Log::info($input);;
        $lastEdition = Edition::orderByDesc('edition_number')->first();


        Mail::to($request->mail)->send(new TicketBought($request->card_name, $request->number, $lastEdition));
        return response()->json(['success'=>'The Email was successfully sent.']);


    }
}

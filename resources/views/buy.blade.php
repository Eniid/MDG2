@extends('layout')

<!-- Title -->
@section('title')
    Acheter :
@endsection


@section('content')



<!--MENU DE NAVIGATION -->
<div class="nav">
    <input type="checkbox" id="nav" class="nav_input visually-hidden">
    <div class="nav_control">
        <label for="nav" class="nav_lab"><span class="open_nav">Menu</span><span class="close_nav">Fermer</span></label>
    </div>

    <nav class="main_nav">
        <h2 class="visually-hidden">menu de navigation</h2>


        
        <ol class="">
            <li class="main_nav_item">
                <a href="{{ asset('/') }}"><span class="first_letter">A</span>ccueil</a>
            </li>
            <li class="main_nav_item">
                <a href="{{ asset('/exposants') }}"><span class="first_letter">E</span>xposants</a>
            </li>
            <li class="main_nav_item" >
                <a href="{{ asset('/about') }}"><span class="first_letter">Q</span>ui sommes-nous ?</a>
            </li>
            <li class="main_nav_item">
                <a href="{{ asset('/editions_precedents')}}"><span class="first_letter">M</span>arché précédent</a>
            </li>
            <li class="main_nav_item">
                <a href="{{ asset('/contact')}}"><span class="first_letter">C</span>ontact</a>
            </li>
            <li class="h_cta">
                <a href="{{ asset('/buy')}}">Acheter vos billets</a>
            </li>


        </ol>
    </nav>

    <div class="nav-bg">
    </div>
</div>

<!-- Buy main CTA -->
<x-buy_cta></x-buy_cta>


<!-- PIC -->
<div class="about_cont"></div>


<!-- No JS warning -->
<div class="no-js-warning">
    <p>
        Le module de payement fonctionne avec JavaScript. Vous devez l'activer pour pouvoir payer en ligne. Vous pouvez également commander vos billet par mail à l'adresse <a href="mailto:{{$contact->e_mail}}">{{$contact->e_mail}}</a>.
    </p>
</div>


<!-- CONTENU DE LA PAGE -->
<section class="main_sec main_contact main_buy"> <!-- flex -->

    <!-- Informations sur l'event -->
    <div class="cont_infos buy_infos">
        
        <h2><span>A</span>cheter des tickets</h2>
        <!-- Partie "note" -->
        <div>
            {!!$lastEdition->note!!}
        </div>

        <!-- Les prix -->
        <div class="title">
            Prix
        </div>
        <p>
            Enfants :  {{$lastEdition->kids_price}} <br>
            Adultes : {{$lastEdition->price}}
        </p>

        <!-- Le lieux -->
        <div class="title">
            <span>L</span>ieu
        </div>
        @if($lastEdition->place)
            <p>Lieu : @if($lastEdition->google_map)<a href="{{$lastEdition->google_map}}" target="_blank" rel="noopener noreferrer">@endif{{$lastEdition->place}}@if($lastEdition->google_map)</a>@endif</p>
            <p>{{$lastEdition->adress}}</p>
        @else
            A venir
        @endif

        <!-- La date -->
        <div class="title">Date</div>
        @if($lastEdition->bigining_date	)
            <p>De {{$lastEdition->aprox_date}} au {{$lastEdition->ending_date}}	</p>
        @elseif($lastEdition->aprox_date)
            <p>{{$lastEdition->aprox_date}}</p>
            <p class="note">Des dates plus précises seront communiquer à l'aproche de l'évènement.</p>
        @else
            A venir
        @endif
        <a href="{{ asset('/about') }}" class="h_cta">Qui sommes nous ? </a>

    </div>

    <!-- Module de payement -->
    <div>
        <form id="payment-form" class="pay">
        
            <!-- Nom du cliant-->
            <div class="input_contener form_input inl_input">
                <label for="card_name">Nom du participant :</label> 
                <input type="text" id="card_name" name="card_name" value="{{ old('name') }}">
                <div class="input"></div>
                @error('name')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Module de Stripe-->
            <div class="payment-form">
                <div id="card-element" ><!--Stripe.js injects the Card Element--></div>
                <button id="submit">
                    <span class="spinner hidden" id="spinner"></span>
                    <span id="button-text">Payer</span>
                </button>
                <p id="card-error" role="alert"></p>
                <div class="result-message hidden">
                    <p>Merci de votre achat!</p>
                    <p>Vous avez été ajouté à la liste des inviters. Présentez-vous avec un document sur le-quel votre nom est indiqué le jour du marché. <a href="/buy">Acheter un autre billet</a> </p>
                </div>
            </div>
            <p>Les enfants peuvent entrer sans ticket. </p>
        </form>
    </div>

</section>


<!-- JS de Stripe !  -->
<script>
    var stripe = Stripe("pk_test_51I4y7oES2VuO6fZpRItbplaDmlAPXS3YEgwckcbsQE1OInsBr2Bje9QEjr6lc6znwlQfnpAEugVwjF5SOZwAnLzr00GbRYZkZf");
        var elements = stripe.elements();

        var style = {
        base: {
            color: "#32325d",
            padding: "20rem"
        }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.on('change', ({error}) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
            displayError.textContent = error.message;
            } else {
            displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        var client_name = document.getElementById('card_name').value;


        var onStripeSubmit = function(client_name, type, event) {
        event.preventDefault();
        console.log(client_name + ' test log' + type);
        // stripe.confirmCardPayment("{{ $clientSecret }}", {
        //     payment_method: {
        //         card: card,
        //         billing_details: {
        //             name: 'Jenny Rosen ' + client_name
        //         }
        //     }
        // }).then(function(result) {
        //     if (result.error) {
        //         // Show error to your customer (e.g., insufficient funds)
        //         console.log(result.error.message);
        //     } else {
        //         // The payment has been processed!
        //         if (result.paymentIntent.status === 'succeeded') {
        //             // Show a success message to your customer
        //             document.querySelector(".result-message").classList.remove("hidden");

        //             document.querySelector("button").disabled = true;
        //             // There's a risk of the customer closing the window before callback
        //             // execution. Set up a webhook or plugin to listen for the
        //             // payment_intent.succeeded event that handles any business critical
        //             // post-payment actions.

        //             document.querySelector('form').addEventListener('submit', function(e) {
        //                 e.preventDefault();
        //                 var card_name = document.getElementById('card_name').value;
        //                 stripe.createToken(card, {name: card_name}).then(setOutcome);
        //             });

        //         }
        //     }
        // });
    };

    form.addEventListener('submit', onStripeSubmit.bind(null,client_name, event));


</script>
        
        
@endsection
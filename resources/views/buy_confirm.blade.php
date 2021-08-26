@extends('layout')

<!-- Title -->
@section('title')
    Acheter :
@endsection


@section('content')


<!-- No JS warning -->
<div class="no-js-warning">
    <p>
        Le module de payement fonctionne avec JavaScript. Vous devez l'activer pour pouvoir payer en ligne. Vous pouvez également commander vos billet par mail à l'adresse <a href="mailto:{{$contact->e_mail}}">{{$contact->e_mail}}</a>.
    </p>
</div>




<!-- CONTENU DE LA PAGE -->
<section class="main_sec main_contact main_buy"> <!-- flex -->


    <!-- Module de payement -->



    
    <div>

        <p class="order_disp">Vous allez acheter <span>{{ $number }} tikets</span> au nom de <span>{{ $card_name }}<span></p>

         <!-- Module de payement -->
    <div>
        <form id="payment-form" class="pay">
            @csrf
        
            <!-- Module de Stripe-->
            <div class="payment-form">
                <div id="stripe_box">
                    <div id="card-element" ><!--Stripe.js injects the Card Element--></div>
                    <button id="submit">
                        <span class="spinner hidden" id="spinner"></span>
                        <span id="button-text">Payer</span>
                    </button>
                </div>

                <p id="card-error" role="alert"></p>
                <div class="result-message hidden">
                    <p>Merci de votre achat!</p>
                    <p>Vous avez été ajouté à la liste des inviters. Présentez-vous avec un document sur le-quel votre nom est indiqué le jour du marché. <a href="/buy">Retourner a l'acceuil</a> </p>
                </div>
            </div>
        </form>
    </div>

    </div>


        <!-- Informations sur l'event -->
        <div class="buy_info">
            <div class="date_box flex flex_col_m">
                @if($lastEdition->Note)
                <div class="flex info_cont">
                    <div>
                        <p>Note : {{ $lastEdition->Note }}</p>    
                    </div>
                </div>
                @endif
                <div class="flex info_cont">
                    <div>
                        <img src="{{ asset('img/map.svg') }}" alt="" class="icon_info">
                    </div>
                    <div>
                        <div class="info_title">Adress</div>
                        <div><a href="#" target="_blank" rel="noopener noreferrer">Voir sur Google Map</a></div>
                    </div>
                </div>
                <div class="flex info_cont">
                    <div>
                        <img src="{{ asset('img/cal.svg') }}" alt="" class="icon_info">
                    </div>
                    <div>
                        <div class="info_title">Date</div>
                    <div>
                        @isset($lastEdition->bigining_date)
                            @if ($lastEdition->bigining_date->monthName == $lastEdition->ending_date->monthName )
                            Du {{ $lastEdition->bigining_date->day }} au {{ $lastEdition->ending_date->day }} {{ $lastEdition->ending_date->monthName }}
                            @else
                            Du {{ $lastEdition->bigining_date->day }} {{ $lastEdition->bigining_date->monthName }} au {{ $lastEdition->ending_date->day }} {{ $lastEdition->ending_date->monthName }}
                            @endif
                        
                        @endisset
        
                        @empty($lastEdition->bigining_date)
                         {{ $lastEdition->aprox_date }}
                    
                        @endempty
        
        
                    
                        </div>
                    </div>
                </div>
    
    
    
    
                <div class="flex info_cont">
                    <div>
                        <img src="{{ asset('img/monay.svg') }}" alt="" class="icon_info">
                    </div>
                    <div>
                        <div class="info_title">Prix</div>
                        <div>Adultes : {{$lastEdition->price}}€</div>
                        <div>
                            @if($lastEdition->kids_price == 0)
                            Enfants : Gratuit
                            @else
                            Enfants : {{$lastEdition->kids_price}}€
                            @endif
                        </div>
                    </div>
        
        
                </div>
                <div class="cta_box">
                    <a href="/buy" class="cta">More abour us </a>
        
                </div>
            </div>
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
    // var client_name = document.getElementById('card_name').value;

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card,
                billing_details: {
                    name: '{{$card_name}}'
                }
            }
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    document.querySelector(".result-message").classList.remove("hidden");
                    document.querySelector("button").disabled = true;

                    document.getElementById('stripe_box').classList.add("hidden");

                    

                    fetch('/send_tikets', {
                        method: 'POST',
                        credentials: "same-origin",
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                                card_name:'{{ $card_name }}',
                                number:'{{ $number }}',
                                }),
                        })
                        .then(response => response.json())
                        .then(data => {
                        console.log('Success:', data);
                        })
                        .catch((error) => {
                        console.error('Error:', error);
                    });


                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                    document.querySelector('form').addEventListener('submit', function(e) {
                        e.preventDefault();
                        var card_name = document.getElementById('card_name').value;
                        stripe.createToken(card, {name: card_name}).then(setOutcome);
                    });
                }
            }
        });
    });
</script>
        
@endsection
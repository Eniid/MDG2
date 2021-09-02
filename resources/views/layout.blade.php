<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Informations sur le site  -->
    <meta name="description" content="Le marché des Gourmets est évènement culinaire organisé par le Rotary Club qui à lieu une fois par an en Belgique.">
    <meta name="keywords" content="nouriture, boisson, marché, bierre, vin, fête">
    <meta name="author" content="Enid">

    <!-- Flavicon  -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- To run web application in full-screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Status Bar Style (see Supported Meta Tags below for available values) -->
    <!-- Has no effect unless you have the previous meta tag -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    @if (Request::path() == 'buy')
    <!-- Scriptes pour Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    @endif

    <!-- Titre de la page  -->
    <title>@yield('title') Marché des gourmets</title>
</head>


<!-- CONTENU   -->
<body itemscope itemtype="https://schema.org/FoodEvent" class="no-js">

    <!-- Titre de la page  -->
    <a href="/">
        <h1 itemprop="name">Le {{$lastEdition->edition_number}}@if($lastEdition->edition_number == 1)er @else
eme @endif marché des <span>&nbsp;Gourmets</span></h1>
    </a>

    <!-- Nav timeline-->
    <x-timeline></x-timeline>



<!--MENU DE NAVIGATION -->
<div class="nav">
    <input type="checkbox" id="nav" class="nav_input visually-hidden">
    <div class="nav_control">
        <label for="nav" class="nav_lab link-like"><span class="open_nav">Menu</span><span class="close_nav">Fermer</span></label>
    </div>

    <nav class="main_nav">
        <h2 class="visually-hidden">menu de navigation</h2>      
        <ol class="">
            <li class="main_nav_item
            @if (Request::path() == '/')
                active
            @endif
            ">
                <a href="/"><span class="first_letter">A</span>ccueil</a>
            </li>
            <li class="main_nav_item
            @if (Request::path() == 'exposants')
                active
            @endif
        ">
                <a href="/exposants"><span class="first_letter">E</span>xposants</a>
            </li>

            <li class="main_nav_item
            @if (Request::path() == 'about')
                active
            @endif
        " >
                <a href="/about"><span class="first_letter">Q</span>ui sommes-nous ?</a>
            </li>
            <li class="main_nav_item
            @if (Request::path() == 'editions_precedents')
            active
            @endif
            ">
                <a href="/editions_precedents"><span class="first_letter">M</span>arché précédent</a>
            </li>
            <li class="main_nav_item
            @if (Request::path() == 'contact')
            active
            @endif
            ">
                <a href="/contact"><span class="first_letter">C</span>ontact</a>
            </li>
            <li class="h_cta">
                <a href="/buy">Acheter vos billets</a>
            </li>
        </ol>
    </nav>
    <label class="nav-bg" for="nav">
    </label>

</div>


<!-- Buy main CTA -->
<x-buy_cta></x-buy_cta>



    <!-- *** AJOUT DES PAGES ICI ***   -->
    @yield('content')

    
    <!-- Footer  -->


    @if(!$sponsors->isEmpty())
    <section class="partner-box">
        <h2><span class="dub_one">Nos</span><span class="dub_two">Partnenaires</span></h2>
            <div class="sponsor_cont">
                @foreach($sponsors as $sponsor)
                    @if($sponsor->lien)<a href="{{$sponsor->lien}}" target="_blank" rel="noopener noreferrer" >@endif
                        <img src="/storage/{{$sponsor->img}}" alt="{{$sponsor->nom}}">@if($sponsor->lien)</a>@endif
                @endforeach
            </div>
    </section>
    @endif
    <footer> <!-- Flex  -->
        <div class="footer">

            
                    <!-- Informations pratiques  -->
                    <div>
                        Date :
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
                            <br>
                        @if($lastEdition->place)
                            <strong>Lieu</strong> : <span>@if($lastEdition->google_map)</span><a href="{{$lastEdition->google_map}}" target="_blank" rel="noopener noreferrer">@endif<span itemprop="location">{{$lastEdition->place}}</span>@if($lastEdition->google_map)</a>@endif </p>
                        @endif
                    </div>
            
                    <!-- Site web Rotary  -->
                    <div class="foot_link">
                        <a href="{{$contact->web}}" target="_blank" rel="noopener noreferrer">{{$contact->web}}</a>
                    </div>
            
                    <!-- Informations de contacte  -->
                    <div>
                        <p>
                            <strong>Tel</strong> : {{$contact->tel}}<br>
                            <strong>Mail</strong> : <a href="mailto:{{$contact->e_mail}}" target="_blank" rel="noopener noreferrer">{{$contact->e_mail}}</a>
                        </p>
                    </div>
        </div>

    </footer>
    
    <!-- Ajout du JavaScript  -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
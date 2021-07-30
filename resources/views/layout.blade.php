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

    <!-- Scriptes pour Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    
    <!-- Titre de la page  -->
    <title>@yield('title') Marché des gourmets</title>
</head>


<!-- CONTENU   -->
<body itemscope itemtype="https://schema.org/FoodEvent" class="no-js">

    <!-- Titre de la page  -->
    <a href="/">
        <h1 itemprop="name">Le {{$lastEdition->edition_number}} marché des <span>&nbsp;Gourmets</span></h1>
    </a>

    <!-- Nav timeline-->
    <x-timeline></x-timeline>



<!--MENU DE NAVIGATION -->
<div class="nav">
    <input type="checkbox" id="nav" class="nav_input visually-hidden">
    <div class="nav_control">
        <label for="nav" class="nav_lab"><span class="open_nav">Menu</span><span class="close_nav">Fermer</span></label>
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
            <li class="main_nav_item">
                <a href="/editions_precedents"><span class="first_letter">M</span>arché précédent</a>
            </li>
            <li class="main_nav_item">
                <a href="contact"><span class="first_letter">C</span>ontact</a>
            </li>
            <li class="h_cta">
                <a href="/buy">Acheter vos billets</a>
            </li>

        </ol>
    </nav>
    <div class="nav-bg">
    </div>

</div>


<!-- Buy main CTA -->
<x-buy_cta></x-buy_cta>



    <!-- *** AJOUT DES PAGES ICI ***   -->
    @yield('content')

    
    <!-- Footer  -->
    @if($sponsors)
    <section class="partner-box">
        <h2><span class="dub_one">Nos</span><span class="dub_two">Partnenaires</span></h2>
            <div class="sponsor_cont">
                @foreach($sponsors as $sponsor)
                    @if($sponsor->lien)<a href="{{$sponsor->lien}}" target="_blank" rel="noopener noreferrer" >@endif
                        <img src="/storage/{{$sponsor->img}}" alt="{{$sponsor->nom}}">
                    @if($sponsor->lien)</a>@endif
                @endforeach
            </div>
    </section>
    @endif
    <footer> <!-- Flex  -->

        <!-- Informations pratiques  -->
        <div>
            @if($lastEdition->aprox_date)
                <p> Date : <span>{{$lastEdition->aprox_date}}</span>
            @endif
                <br>
            @if($lastEdition->place)
                Lieu : <span>@if($lastEdition->google_map)</span><a href="{{$lastEdition->google_map}}" target="_blank" rel="noopener noreferrer">@endif<span itemprop="location">{{$lastEdition->place}}</span>@if($lastEdition->google_map)</a>@endif </p>
            @endif
        </div>

        <!-- Site web Rotary  -->
        <div class="foot_link">
            <a href="{{$contact->web}}" target="_blank" rel="noopener noreferrer">{{$contact->web}}</a>
        </div>

        <!-- Informations de contacte  -->
        <div>
            <p>
                Tel : {{$contact->tel}}<br>
                Mail : <a href="mailto:{{$contact->e_mail}}">{{$contact->e_mail}}</a>
            </p>
        </div>

    </footer>
    
    <!-- Ajout du JavaScript  -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@extends('layout')
<!-- Title -->
@section('title')
    Qui sommes-nous ? :
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
            <li class="main_nav_item active" >
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


<!-- CONTENU DE LA PAGE -->
<section class="about_main ">

    <h2><span class="first_letter">Q</span>ui sommes-nous ?</h2>

    <!-- Partie 1 : Le marché des gourmets ? -->
    <section class="main_sec desc">
        <div class="exp">
            <h3>{{$about->mdg_title}}</h3>
            <div class="this_edition_pres">
                {!!$about->mdg_desc!!}
            </div>

            <a href="{{ asset('/editions_precedents') }}" class="cta">Editions précédents</a>
        </div>

        <div class="pres_img desc_img about_img">
            <img src="/storage/{!!$about->mdg_img!!}" alt="">
        </div>
    </section>

    <!-- Partie 2 : Pour la bonne cause -->
    <section class="main_sec char">
        <div class="exp annim">
            <h3>{{$about->why_title}}</h3>
            <div class="this_edition_pres">
                {!!$about->why_desc!!}
            </div>
            <a href="#" class="h_cta">Editions précédents</a>
        </div>
        <div class="pres_img desc_img  annim about_img">
            <img src="/storage/{!!$about->why_img!!}" alt="" class="test">
        </div>
    </section>

    <!-- Partie 3 : Rotari Club -->
    <section class="main_sec desc">
        <div class="exp annim">
            <h3>{{$about->rotari_title}}</h3>
            <div class="this_edition_pres">
                {!!$about->rotari_desc!!}
            </div>
            <a href="#" class="cta cta">Editions précédents</a><a href="#" class="cta h_cta">Editions précédents</a>
        </div>
        <div class="pres_img desc_img annim about_img">
            <img src="/storage/{!!$about->rotari_img!!}" alt="">
        </div>
    </section>



</section>

@endsection
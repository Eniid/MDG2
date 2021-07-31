@extends('layout')
<!-- Title -->
@section('title')
    Qui sommes-nous ? :
@endsection


@section('content')

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
            <a href="/buy" class="h_cta">Acheter vos billets</a>
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
            <a href="{{$contact->web}}" class="cta cta">Le Rotari Club</a><a href="/buy" class="cta h_cta">Acheter Vos billets</a>
        </div>
        <div class="pres_img desc_img annim about_img">
            <img src="/storage/{!!$about->rotari_img!!}" alt="">
        </div>
    </section>



</section>

@endsection
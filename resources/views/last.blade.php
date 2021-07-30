@extends('layout')


<!-- Title -->
@section('title')
    Marchés précédents :
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
            <li class="main_nav_item active">
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


<!-- LightBox : Agrendissement des images  -->
<input type="checkbox" id="lightbox">   
<div class="lightbox">
        <label for="lightbox" class="lightbox_button">
            FERMER
        </label>
        <div class="lightboxContainer"></div>
</div>



<!-- CONTENU DE LA PAGE -->
<section class="last_sec">
    <h2><span class="first_letter">M</span>archés précédents</h2>

    <!-- Cette édition  -->
    <section>
        <div class="last_title_contener">
            <div class="title_left"></div>
            <h3>{{$lastEdition->edition_number}} Marché des gourmets</h3>
            <div class="title_right"></div>
        </div>

        <div class="this_edition">
            <a href="{{ asset('/buy') }}" class="h_cta">Achetez vos billets</a>
        </div>
    </section>

    <!-- Les éditions qui ont des souvenirs  -->
    @foreach($larchives as $archive)
        <section>
            <div class="last_title_contener">
                <div class="title_left"></div>
                <h3>{{$archive->edition_id}}eme Marché des gourmets</h3>
                <div class="title_right"></div>
            </div>

            <div class="last_content">
                <div class="content_note this_edition_pres">
                    {{$archive->presentation}}
                </div>
                <div class="content_pics">
                    @foreach($archive->archivepic as $ap)
                        <a href="/storage/{{$ap->img}}" >
                            <img src="/storage/{{$ap->img}}" class="lightbox_image" alt="{{$ap->alt}}" >
                        </a>
                    @endforeach
                </div>
            </div>

        </section>
    @endforeach
 
   <!-- Pagination -->
   <div class="paginate">
        {{ $larchives->links() }}
    </div>
</section>


@endsection
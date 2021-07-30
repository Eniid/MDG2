@extends('layout')

<!-- Title -->
@section('title')
    Contact :
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
            <li class="main_nav_item active">
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
<section class="main_sec main_contact">

    <!-- Informations -->
    <div class="cont_infos">
        <h2><span class="first_letter">N</span>ous contacter</h2>
        <p>
            Vous avez besoin d’un renseignement ? N’hésitez pas à nous contacter, nous essayerons de vous répondre dans les meilleurs délais.
        </p>
        <p>
            Tel : {{$contact->tel}}<br>
            E-mail : {{$contact->e_mail}}
        </p>
        <a href="{{ asset('/about') }}" class="h_cta">Qui sommes nous ?</a>
    </div>

    <!-- Formulaire -->
    <div class="cont_form">
        <form action="/contact" method="post">
        @csrf

            <!-- Nom -->
            <div class="input_contener form_input">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                <div class="input"></div>
                @error('name')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- E-mail -->
            <div class="input_contener form_input mail_input">
                <label for="mail">E-mail :</label>
                <input type="text" id="mail" name="mail" class="mail" value="{{ old('mail') }}">
                <div class="input"></div>
                @error('mail')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Message + boutton -->
            <div class="input_contener form_input form_aria">
                <label for="body" class="aria_lable">Votre message :</label>
                <textarea name="body" id="body" cols="30" rows="10" class="aria input_aria">{{ old('body') }}</textarea>
                <div class="input input_aria"></div>
                <button class="h_cta form_send">Envoyer</button>
                @error('body')
                    <div class="input input_aria input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </form>
    </div>

</section>


@endsection
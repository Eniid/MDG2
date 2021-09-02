@extends('layout')

<!-- Title -->
@section('title')
    Contact :
@endsection


@section('content')






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

        @if ($message = Session::get('success'))
        <div class="valid">
            ✔️ Merci! Votre message à été envoyé avec success! 
        </div>
        @endif
    </div>

</section>


@endsection
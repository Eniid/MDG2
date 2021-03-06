@extends('layout')

<!-- Title -->
@section('title')
    Devenir exposants :
@endsection

@section('content')

<!--MENU DE NAVIGATION -->


<!-- Buy main CTA -->
<x-buy_cta></x-buy_cta>


<!-- PIC -->
<div class="about_cont"></div>


<!-- CONTENU DE LA PAGE -->
<section class="main_sec main_contact main_new">
    <!-- Texte d'explication -->
    <div class="cont_infos">
        <h2><span class="first_letter">D</span>evenir exposant</h2>
        <p>
            Comme chaque année, nous donnerons la priorité aux producteurs de produits authentiques et innovants, ce qui fait la réputation de notre Marché. Si vous vous reconnaissez dans cette description, remplisez le formulraire dans la mesure du possible nous vous accueillerons avec plaisir. 
        </p>
        <p>
            Vous avez une question avant d’intoduire votre demande ? <a href="/contact">contactez nous! </a>
        </p>
    </div>

    <!-- Formulaire -->
    <div class="cont_form">
        <form action="/exposants/demande" method="post" autocomplete="off">
            <input name="hidden" type="text" style="display:none;">

            @csrf

            <!-- Nom -->
            <div class="input_contener form_input">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="off">
                <div class="input"></div>
                @error('name')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- E-Mail -->
            <div class="input_contener form_input mail_input">
                <label for="mail">E-mail :</label>
                <input type="text" id="mail" name="mail" class="mail" value="{{ old('mail') }}">
                <div class="input"></div>
                @error('mail')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nom du stand -->
            <div class="input_contener form_input inl_input">
                <label for="s_name">Nom du stand :</label>
                <input type="text" id="s_name" name="s_name" class="s_name" value="{{ old('s_name') }}">
                <div class="input"></div>
                @error('s_name')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Produits -->
            <div class="input_contener form_input inl_input">
                <label for="prod">Produits :</label>
                <input type="text" id="prod" name="prod" class="prod" value="{{ old('prod') }}">
                <div class="input"></div>
                @error('s_name')
                    <div class="input input_all"></div>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Site web -->
            <div class="input_contener form_input inl_input">
                <label for="web">Site Web :</label>
                <input type="text" id="web" name="web" class="web" value="{{ old('web') }}">
                <div class="input"></div>
            </div>

            <!-- Votre message + Boutton -->
            <div class="input_contener form_input form_aria from_aria_exp">
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
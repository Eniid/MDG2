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
<!-- PIC -->
<div class="about_cont"></div>




<!-- CONTENU DE LA PAGE -->
<section class="main_contact main_buy main_sec"> <!-- flex -->


        <!-- Module de payement -->
        <div class="pay_inf">
            <h2><span class="first_letter">C</span>ommander vos billets</h2>


            <div>
                <p>Completer vos informations pour achter vos billets. Vous pouvez aussi réserver vos billets par teléphone au {{$contact->tel}}, par email <a href="mailto:{{$contact->e_mail}}" target="_blank" rel="noopener noreferrer">{{$contact->e_mail}}</a>. </p>
            
                <p class="import_note">Les enfants peuvent entré sans tikets</p>

            </div>


            <form id="payment-form" class="pay" method="post" action="/buy">
                @csrf
                <!-- Nom du cliant-->


                <div class="input_contener form_input inl_input name-box">
                    <div class="name">
                        <label for="card_name">Nom et Prénom :</label> 
                        <input type="text" id="card_name" placeholder="ex : Léa Jacquot" name="card_name" value="{{ old('name') }}">
                        <div class="input"></div>

                        @error('card_name')
                             <div class="input input_all"></div>
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                </div>

                <div class="input_contener form_input inl_input">
                   


                    <div class="mail name">
                        <label for="mail" class="mail_lable">Adress email:</label> 
                        <input type="text" id="mail" placeholder="ex : abs@hotmail.com" name="mail" value="{{ old('mail') }}">
                        @error('card_name')
                             <div class="input input_all"></div>
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
    
                   <div class="number">
                       <label for="number">Nombre de person</label><br>
                       <input type="number" id="number" class="num_im" name="number" value="{{ old('number') }}">
                       <div class="input"></div>
                       @error('number')
                            <div class="input input_all"></div>
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                   </div>
    
    
                    <div class="input"></div>
                    @error('name')
                        <div class="input input_all"></div>
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
    
    
    
                    <button class="cta h_cta">Send</button>
                </div>
            </form>
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
                <a href="/about" class="cta">More abour us </a>
    
            </div>
        </div>
    </div>


</section>



        
        
@endsection
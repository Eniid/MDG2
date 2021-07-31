@extends('layout')


@section('content')




<!-- CONTENU DE LA PAGE -->
    <!-- Présentation principale du site -->
    <section class="main_sec presentation">
        <div class="pres_text">
            <h2>Le {{$lastEdition->edition_number}}@if($lastEdition->edition_number == 1)er @else eme @endif marché des <span class="first_letter">Gourmets</span></h2>

            <div class="this_edition_pres">
                {!! $lastEdition->catch !!}
            </div>

            <div class="date_box flex flex_col_m">
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
                        <div>Adultes : {{$lastEdition->price}}</div>
                        <div>Enfants : {{$lastEdition->kids_price}}</a></div>
                    </div>


                </div>
                <div class="cta_box">
                    <a href="{{ asset('/buy') }}" class="h_cta">Achetez vos tickets </a>

                </div>
            </div>





        </div>
        <div class="pres_img">
            <img src="{{ asset('img/products.png') }}" alt="">
        </div>
    </section>

    <!-- Les plus du marché -->
    <section class="main_sec plus ">
        <h2 class="visually-hidden ">Les plus</h2>
            <div class="one_plus annim one">
                <div class="one_contener cont">
                    <img src="{{ asset('img/food.svg') }}" alt="">
                    <p class="plus_text">Des petits plats à déguster, préparer avec les produits exposés.</p>
                </div>
            </div>
            <div class="one_plus annim two " >
                <div class="two_contner cont">
                    <img src="{{ asset('img/kid.svg') }}" alt="">
                    <p>Une garderie pour vos enfants</p>
                </div>
            </div>        <div class="one_plus annim three">
            <div class="three_contner cont">
                <img src="{{ asset('img/atm.svg') }}" alt="">
                <p>Un banccontact pour retirer de l’argent à votre disponibilité</p>
            </div>
            </div>        <div class="one_plus annim four">
                <div class="four_contner cont">
                    <img src="{{ asset('img/gift.svg') }}" alt="">
                    <p>Des lots à reporter tout au long du week-end.</p>
                </div>
            </div>

    </section>

    <!-- Descirpition  -->
    <section class="main_sec desc">
        <div class="exp annim">
            <h2>Edition 2021</h2>

            <div class="this_edition_pres">
                {!!$lastEdition->presentation!!}
            </div>

            <a href="{{ asset('/about') }}" class="cta">En savoir plus sur nous</a>
            <a href="{{ asset('/buy') }}" class="h_cta">Achetez vos tickets</a>
        </div>
        <div class="pres_img desc_img annim">
            <img src="{{ asset('img/wine.png') }}" alt="">
        </div>
    </section>







@endsection
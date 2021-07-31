@extends('layout')

<!-- Title -->
@section('title')
    Exposants :
@endsection

@section('content')



<!-- PIC -->
<div class="about_cont"></div>


<!-- CONTENU DE LA PAGE -->
<section>

    <!-- Titre, lable et search bar -->
    <div class="exp_main_sec exp_head_contener">
        <div class="exp_head">
            <div class="title">
                <h2 class="title_exp"> <span class="first_letter">N</span>os exposants</h2> <a class="become_exp" href="{{ asset('/exposants/demande') }}">Devenir exposant</a>
                
                <!-- Lables -->
                <div class="labeles">
                    @foreach($lables as $lable)
                        <a href="/exposants/?s={{$lable->name}}" class="lable" style="color:{{$lable->color}}">{{$lable->name}}</a>
                    @endforeach
                    <a href="{{ asset('/exposants') }}" class="lable">Voir tout</a>
                </div>
            </div>

            <!-- Search barre-->
            <div class="expo_search">
                <form action="exposants" class="input_contener">
                    @csrf
                    <label for="search" class="visually-hidden">Recherche</label>
                    <input type="text" id="search" class="search_input" placeholder="recherche" name="search">
                    <div class="input"></div>
                    <button class="search_button"><img src="{{ asset('./img/search.svg') }}" alt=""></button>
                </form>
            </div>

        </div>
    </div>


    <!-- Liste des exposants -->
    <div class="exp_body exp_main_sec">
        @foreach($exposants as $exposant)
            <section class="exp_contener">
                @if($exposant->img)
                    <div class="exp_img" style="background-image: url('./storage/{{$exposant->img}}');">
                    </div>
                @endif

                <div class="exptext">
                    <div class="labeles inner_lable">
                        @foreach($exposant->lables as $lable)
                        <a href="/exposants/?s={{$lable->name}}" class="lable" style="color:{{$lable->color}}">{{$lable->name}}</a>
                        @endforeach
                    </div>
                    <h3>{{$exposant->name}}</h3>
                    <div class="exp_desc">{!!$exposant->desciption!!}</div>
                    @if($exposant->link)
                        <a href="{{$exposant->link}}" class="h_cta exp_cta" target="_blank" rel="noopener noreferrer">Leur site web</a>
                    @endif
                </div>
            </section>
        @endforeach

            @if($exposants->isEmpty())

            <div class="empty">
                Il n'y à pas encore d'exposant annoncé pour cette edition 
            </div>

            @else

            Nop

            @endif
        

    </div>

    <!-- Pagination -->
    <div class="paginate">
        {{ $exposants->links() }}
    </div>
</section>


@endsection
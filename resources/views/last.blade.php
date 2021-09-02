@extends('layout')


<!-- Title -->
@section('title')
    Marchés précédents :
@endsection


@section('content')




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
                
                <h3>{{$archive->edition_id}}@if($archive->edition_id == 1)er @else
eme @endif Marché des gourmets</h3>
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
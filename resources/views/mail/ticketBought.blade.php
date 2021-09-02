
<div class="mail">
    Bonjour <strong>{{ $card_name }}</strong>, 
    
    <p>
        Voici votre billet d'entré pour l'évènement! 
    </p>
    
    
    <div>
        <div class="tiket_img">
            <img src="{{ asset('img/tikets.svg') }}" alt="">
            <div class="texte">
                <p class="name">{{ $card_name }}</p>
                <p class="person">{{ $number }}persone(s)</p>
    
                <p class="date">
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

                </p>
            </div>
        </div>
    
    </div>
</div>


<style>

    .mail {
        font-family : Verdana, Geneva, sans-serif;

    }

    .date{
        POSITION: absolute;
    /* bottom: -2px; */
    font-size: 15px;

    }


    .person {
        font-size: 12px;
        position: relative;
        top: -12px;
    }


    .tiket{
        color: red;
    }

    img {
        width: 400px
    }
    .tiket_img {
        position: relative;


    }
    .texte {
        position: absolute;
        top: 40px;
        left: 70px;
        }

        .name{
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 12px;
        }
    
</style>
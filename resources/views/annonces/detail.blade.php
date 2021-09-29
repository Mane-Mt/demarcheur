
@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row pd-3 " style="margin-top: 7%">
            <div class="col-8 box">
                <div><b>Type de chambre : </b> {{ $annonce->type}}</div>
            <div><b>Quartier : </b> {{ $annonce->quartier}}</div>
            <p>
                <b>Description : </b> {{ $annonce->description}}
            </p>
            @if ($annonce->annonceType == 'Offre')
            <div class="row">
                <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo1)}}" alt="" > </div>
                <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo2)}}" alt="" > </div>
                <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo3)}}" alt="" > </div>
                <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo4)}}" alt="" > </div>
                <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo5)}}" alt="" > </div>

                {{-- <div class="col-lg-6"><img src="{{$image->photo}}" alt="" srcset=""> </div> --}}
            </div>
            @endif

            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
@endsection

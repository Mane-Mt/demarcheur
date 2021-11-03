
@extends('layouts.master')

@section('content')

    <div class="container mt-3">
        <div class="row pd-3  container-child">
            <div class="col-lg-8 box p-5">
                <ul>
                    @include('common.annonce-list-item')
                    <li class="overflow-hidden">{{$annonce->description }}</li>
                </ul>
                @if ($annonce->annonceType == 'Offre')
                <div class="row">


                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo2)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo3)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo4)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo5)}}" alt="" > </div>
                    {{-- <div class="col-lg-6"><img src="{{$image->photo}}" alt="" srcset=""> </div> --}}
                </div>


            @endif
            <div class="row">
                <div class="col-12">

                @include('common.postuler-btn')

            </div>
        </div>
    </div>
@endsection

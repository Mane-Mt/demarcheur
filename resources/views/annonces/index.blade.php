@extends('layouts.master')
@section('content')
<div class="container">
   <div class="row mt-lg-3 container-child" >
    <div class="col-lg-4 mt-3 d-lg-none">
        @component('components.serch-bar')
            @slot('class') d-none  @endslot
        @endcomponent  
    </div>

    <div class="col-lg-8" id="section">
         @forelse ($annonces as $annonce)
         {{-- {{dd($annonce)}} --}}
            {{-- --}}
            <div class="row my-3 box @if($annonce->annonceType == 'Demande') box-danger @else box-success @endif">
                <h3 class="text-center font-weight-bold">{{$annonce->annonceType}}</h3>
                <div class="col-lg-2 col-sm-12 text-center text-lg-right">
                    @if ($annonce->annonceType == 'Offre')
                    <div class=""><img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
                    @else
                    <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>
                    @endif


                </div>

                <div class="col-lg-8 col-sm-12 annonce ">

                    <ul>
                        @include('common.annonce-list-item')
                        <li class="overflow-hidden">{{ Str::substr($annonce->description, 0,200).'...' }}</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-12 text-center text-lg-right">
                    @include('common.postuler-btn')
                      <a href="{{route('annonces.show',$annonce->id)}}" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" >
                        Details
                      </a>


                </div>
            </div>
            @empty

            <div class="item">
        Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
                <img src="{{asset('assets/img/default/oops.jpg')}}" alt="" srcset="">
            </div>
      @endforelse
    </div>

    <div class="col-lg-4 mt-3 d-none d-lg-block">
        @component('components.serch-bar')
            @slot('class')  @endslot
        @endcomponent  
        {{-- <input type="search" name="search" class="form-control" style="border-radius: 15px; border: 2px solid blue;" placeholder="search"> --}}
    </div>


   </div>


@endsection
{{-- @section('js')
<script>

</script>
@endsection --}}


@extends('layouts.master')

@section('content')
<<<<<<< HEAD
    <div class="container">
        <div class="row pd-3 " style="margin-top: 7%">
            <div class="col-8 box">
=======
    <div class="container mt-3">
        <div class="row pd-3 mt-5">
            <div class="col-lg-8 box">
>>>>>>> 17222694a2f884be341976ce5196357d588b0687
                 <div>Type de chambre : <b>{{ $annonce->type}}</b> </div>

                <div>Ville: <b>{{ $annonce->town}}</b></div>
                        <div>Quartier:<b>{{ $annonce->quartier}}</b></div>
                        <div>Budget <b>{{ $annonce->price}}</b></div>
                <p>
                    <b>Description : </b> {{ $annonce->description}}
                </p>
                @if ($annonce->annonceType == 'Offre')
                <div class="row">
<<<<<<< HEAD
                    <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo1)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo2)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo3)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo4)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('images/'.$annonce->photo5)}}" alt="" > </div>
=======
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo2)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo3)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo4)}}" alt="" > </div>
                    <div class="col-lg-6"><img src="{{asset('public/images/'.$annonce->photo5)}}" alt="" > </div>
>>>>>>> 17222694a2f884be341976ce5196357d588b0687

                    {{-- <div class="col-lg-6"><img src="{{$image->photo}}" alt="" srcset=""> </div> --}}
                </div>


            @endif
            <div class="row">
                <div class="col-12">

                    <button type="button" class="btn btn-success btn-sm-block btn-circle mt-lg-1 mt-xs-5 " data-bs-toggle="modal" data-bs-target="#exampleModal{{$annonce->id}}">
                        Postuler
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$annonce->id}}" tabindex="-1" aria-labelledby="exampleModal{{$annonce->id}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModal{{$annonce->id}}Label">Saisie de l'annonce</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Numero du posteur : {{ $annonce->user->phone}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>

                            </div>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
@endsection

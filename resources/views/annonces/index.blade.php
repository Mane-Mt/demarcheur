@extends('layouts.master')
@section('content')
<div class="container" style="margin-top: 8%!important">
   {{-- <div class="row">
    <div class="tables-left-dec">
        <img src="welcome/assets/images/tables-left-dec.png" alt="">
      </div>
      <div class="tables-right-dec">
        <img src="welcome/assets/images/tables-right-dec.png" alt="">
      </div> --}}
    <div class="col-lg-8">
         @forelse ($annonces as $annonce)
            <div class="row my-3 box ">
                <div class="col-lg-1 col-sm-12 text-center text-lg-right">
                    @if ($annonce->annonceType == 'Offre')
                    <i class="fa fa-check-circle fa-10x text-success" aria-hidden="true" style="font-size: 3.5rem" ></i>
                    @else
                    <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem"  ></i>
                    @endif


                </div>
                {{-- <div class="col-8">
                    {{$annonce->type}}, dans le quartier de {{ $annonce->quartier}}, {{ Str::substr($annonce->description, 0, 100).'...' }}
                </div> --}}
                <div class="col-lg-8 col-sm-12 annonce overflow-hidden">
                    <ul>
                        <li><b>{{$annonce->type}}</b></li>
                        <li>Quartier de <b>{{ $annonce->quartier}}</b></li>
                        <li>{{ Str::substr($annonce->description, 0,20).'...' }}</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-12 text-center text-lg-right">
                    <button class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5 " >
                        Details
                    </button>
                    <button class="btn btn-success btn-sm-block btn-circle mt-lg-1 mt-xs-5 " >
                   Postuler
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$annonce->id}}">
                        Launch demo modal
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$annonce->id}}" tabindex="-1" aria-labelledby="exampleModal{{$annonce->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModal{{$annonce->id}}Label">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Numero du posteur : {{ $annonce->user->name}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- Button trigger modal -->

                </div>
            </div>
            @empty

            <div class="item">
        Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
            </div>
      @endforelse
    </div>
   </div>
</div>


@endsection

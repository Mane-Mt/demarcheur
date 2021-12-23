@php
//    $annonce = collect(json_decode($annonce));
//    dd($annonces)
@endphp
<div class="row my-3 box ">
    <div class="col-lg-2 col-sm-12 text-center text-lg-right">
        @if ($annonce->annonceType == 'Offre')
        <div class=""><img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
        @else
        <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>
        @endif


    </div>
    {{-- <div class="col-8">
        {{$annonce->type}}, dans le quartier de {{ $annonce->quartier}}, {{ Str::substr($annonce->description, 0, 100).'...' }}
    </div> --}}
    <div class="col-lg-8 col-sm-12 annonce ">
        <ul>
            <li><b>{{$annonce->type}}</b></li>
            <li>Ville: <b>{{ $annonce->town}}</b></li>
            <li>Quartier:<b>{{ $annonce->quartier}}</b></li>
            <li>Budget <b>{{ $annonce->price}}</b></li>
            <li class="overflow-hidden">{{ Str::substr($annonce->description, 0,200).'...' }}</li>
        </ul>
    </div>
    <div class="col-lg-2 col-sm-12 text-center text-lg-right">
        @if ($annonce->annonceType == 'Demande')
            @can('isDemarcheur')
            <button type="button" class="btn btn-success btn-sm-block btn-circle mt-lg-1 mt-xs-5 " data-bs-toggle="modal" data-bs-target="#exampleModal{{$annonce->id}}">
                Postuler
            </button>
            @endcan
        @endif

          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{$annonce->id}}" tabindex="-1" aria-labelledby="exampleModal{{$annonce->id}}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal{{$annonce->id}}Label">Saisie de l'annonce</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                &emsp;&emsp;
                @if ($annonce->user != null)
                    <span class="call-button">
                      <a href="tel:+{{$annonce->user->phone}}"><i class="fa fa-phone"></i> 
                        {{$annonce->user->phone}} &emsp;&emsp;
                      </a>
                    </span>
                    <span class="call-button">
                      <a href="https://wa.me/{{$annonce->user->phone}}"><i class="fa fa-whatsapp"></i></a>
                    </span>
                @else
                    <span class="call-button">
                      <a href="tel:+{{$annonce->phone}}"><i class="fa fa-phone"></i> 
                        {{$annonce->phone}} &emsp;&emsp;
                      </a>
                    </span>
                    <span class="call-button">
                      <a href="https://wa.me/{{$annonce->phone}}"><i class="fa fa-whatsapp"></i></a>
                    </span>
                @endif

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>

                </div>
              </div>
            </div>
          </div>

          @if ($annonce->annonceType == 'Offre')
          <a href="{{route('annonces.show',$annonce->id)}}" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" >
            Details
          </a>
          @else
          <button type="button" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" data-bs-toggle="modal" data-bs-target="#detailModal{{$annonce->id}}">
            Details
          </button>

          <!-- Modal -->
          <div class="modal fade" id="detailModal{{$annonce->id}}" tabindex="-1" aria-labelledby="detailModal{{$annonce->id}}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="detailModal{{$annonce->id}}Label">Detail de l'annonce</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body overflow-auto">
                    Type de chambre: <b>{{ $annonce->type}}</b> <br>
                   Quartier: <b>{{ $annonce->quartier}} </b> <br>
                    Detail : <b>{{ $annonce->description}}
                        <span class="text-center">Image : </span>
                      <img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" srcset="">
                    </b>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" data-bs-toggle="modal"  data-bs-target="#exampleModal{{$annonce->id}}">Postuler/Saisir</button>
                </div>
              </div>
            </div>
          </div>

          @endif


    </div>
</div>

@extends('layouts.master')
@section('content')
<div class="container">

   <div class="row mt-lg-3" >

    <div class="col-lg-8" id="section">
         @forelse ($annonces as $annonce)
         {{-- {{dd($annonce)}} --}}
            {{-- --}}
            <div class="row my-3 box ">
                <div class="col-lg-2 col-sm-12 text-center text-lg-right">
                    @if ($annonce->annonceType == 'Offre')
                    <div class=""><img src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
                    @else
                    <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>
                    @endif


                </div>

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
                              <h5 class="modal-title" id="exampleModal{{$annonce->id}}Label">Saisie de l'annonce(Cliquez un icon pour commencer la discution)</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            &emsp;&emsp;
                              <span class="call-button">
                                <a href="tel:+228{{$annonce->user->phone}}"><i class="fa fa-phone"></i> 
                                  +228{{$annonce->user->phone}} &emsp;&emsp;
                                </a>
                              </span>
                            <span class="call-button">
                              <a href="https://wa.me/228{{$annonce->user->phone}}"><i class="fa fa-whatsapp"></i></a>
                            </span>
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
            @empty

            <div class="item">
        Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
                <img src="{{asset('assets/img/default/oops.jpg')}}" alt="" srcset="">
            </div>
      @endforelse
    </div>

    <div class="col-lg-4 mt-3 d-none d-lg-block">
        <form action="">
            <div class="form-group mx-3">

                {{-- <label for="exampleInputPassword1 text-center">Nom d'utilisateur de la personne</label> --}}
                <div class="input-group">
                    {{-- <span class="input-group-prepend">
                        <button type="button" class="btn btn-gradient-primary"><i class="fas fa-search"></i></button>
                    </span> --}}
                    <input type="text" id="search_input" name="search_input" class="form-control form-control-lg" placeholder="Search">

                </div>

            </div>
            {{csrf_field()}}
        </form>
        {{-- <input type="search" name="search" class="form-control" id="search" style="border-radius: 15px; border: 2px solid blue;" placeholder="search"> --}}
    </div>


   </div>


@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#search_input').keyup(function (e) {
            var value = $(this).val();

            if(value != ''){
                var _token = $('input[name="_token"]').val();
                var find = false;

                var html = '<div class="card-body box">'+
                                    'Aucun resultat n\'as été trouvé pour <b> '+ value +' </b>'
                                '</div>'+
                            '</div>';

                $.ajax({
                    type: "POST",
                    url: "{{ route('annonces.search')}}",
                    data: {value:value,_token:_token},
                    success: function (response) {

                       if(response != ''){
                             html= '';
                                // if (element.annoceType== "Offre"){
                                            // '<div class=""><img src="public/images/.'+element.photo1+'" alt="" > </div>'+
                                            //    }else{  '<i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>'+
                                            // }
                            $.each(response,function (index, element) {
                                // alert(element.id)
                                html += '<div class="row my-3 box ">'+
                                          '<div class="col-lg-2 col-sm-12 text-center text-lg-right">'+
                                            '@if ('+element.annoceType+'== "Offre")'+
                                            '@else <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>@endif'+
                                            '</div>'+
                                            '<div class="col-lg-8 col-sm-12 annonce ">'+
                                            '<ul>'+
                                                '<li><b>'+element.type+'</b></li>'+
                                                '<li>Ville: <b>'+element.town+'</b></li>'+
                                                '<li>Budget <b>'+element.price+'</b></li>'+
                                                '<li>Quartier:<b>'+element.quartier+'</b></li>'+
                                                ' <li class="overflow-hidden">{{ Str::substr('+element.description+', 0,200)."..." }}</li>'+
                                            '</ul>'+
                                            '</div>'+
                                        '</div>'
                           });
                        }
                        // alert(html)
                        $('#section').fadeIn();
                        $('#section').html(html);
                   }
                });

            }

        });
    });
</script>
@endsection

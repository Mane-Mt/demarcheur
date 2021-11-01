@extends('layouts.master')
@section('content')
<div class="container">

   <div class="row mt-lg-3 container-child" >
    <div class="col-lg-4 mt-3 d-lg-none d-block">
        <form action="">
            <div class="form-group mx-3">
                <div class="input-group">
                    <input type="text" id="search_input" name="search_input" class="form-control form-control-lg" placeholder="Search">
                </div>
            </div>
            {{csrf_field()}}
        </form>
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
                                html += '<div class="row my-3 box ';
                                        if (element.annonceType == "Demande") {
                                html     += 'box-danger';
                                         }else{
                                html    += 'box-success';
                                         }
                                html+= '">'+

                                        '<h3 class="text-center font-weight-bold">'+element.annonceType+'</h3>'+
                                        '<div class="col-lg-2 col-sm-12 text-center text-lg-right">';
                                         if (element.annonceType =="Ofrre") {
                                html        += '';
                                        }else{
                                html        += '<i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>';
                                        }

                                 html      +='</div>'+
                                             '<div class="col-lg-8 col-sm-12 annonce ">'+
                                                '<ul>'+
                                                '<li><b>'+element.type+'</b>';
                                                if (element.offerType != null) {
                               html            += ' à <b> '+element.offerType+'</b>';
                                                }
                                html          +='</li>'+
                                                '<li>Pays: <b>'+element.country+'</b></li>'+
                                                '<li>Ville: <b>'+element.town+'</b></li>'+
                                                '<li>Budget <b>'+element.price+'</b></li>'+
                                                '<li>Quartier:<b>'+element.quartier+'</b></li>'+
                                                ' <li class="overflow-hidden">'+element.description+'</li>'+
                                            '</ul>'+
                                            '</div>';

                                    html  +='<div class="col-lg-2 col-sm-12 text-center text-lg-right">'+
                                                '<a href="annonces/",'+element.id+ ')}}" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" > Details </a>'+
                                            '</div>'+
                                        '</div>';
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ALLO DEMARCHEUR vous permet de rechercher de chambre, villa, maison et terrain à vendre selon vos critères en vous aidant d'un système d'annonce établi. Il offre la possibilité de publier votre annonce de recherche. " />
    <meta name="author" content="Phoecon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset(env('APP_LOGO')) }}" rel="icon" type="image/png">
    <title>{{env('APP_NAME')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('welcome/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('welcome/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/templatemo-onix-digital2.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/owl.css') }}">
   <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">

    @yield('link')
   
<!--

TemplateMo 565 Onix Digital

https://templatemo.com/tm-565-onix-digital

-->
<!-- Global site tag (gtag.js) - Google Analytics -->


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-211674658-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-211674658-1');
</script>

<!-- Google Adsense -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3783796964558828"
     crossorigin="anonymous"></script>
</head>

<body>



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->


            <a href="{{route('welcome')}}" class="logo">
              <img src="{{asset(env('APP_LOGO'))}}" width="auto" height="70">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->


            <i class="fa fa-search d-lg-none  search-icon" aria-hidden="true" style="font-size:2rem"  id="search-icon"></i>
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{route('welcome')}}#top" class="active">Accueil</a></li>
              <li ><a href="{{route('annonces.index')}}">Annonces</a></li>
              <li class="scroll-to-section"><a href="{{route('welcome')}}#services">Demandes</a></li>
              <li class="scroll-to-section"><a href="{{route('welcome')}}#portfolio">Offres</a></li>
              {{-- <li class="scroll-to-section"><a href="{{route('welcome')}}#video">Categories</a></li> --}}
              <li class="scroll-to-section"><a href="{{route('welcome')}}#about">A propos</a></li>
              <li class="scroll-to-section"><a href="{{route('welcome')}}#contact">Contacts</a></li>
              @guest
                <li>
                   <div class="main-btn" >
                     <a href="{{ route('login') }}"  style="background-color: red; border-radius: 30px;" data-bs-toggle="modal" data-bs-target="#type_annone" > Publier</a>

                    </div>
                </li>
                               
                
              @endguest
              @auth
              <li ><div class="main-btn"><a href="{{ route('home') }}"  style="background-color: red; border-radius: 30px;"  >Publier</a></div></li>

              @endauth
              {{-- <li> <a href="#"></a></li> --}}
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>

    @yield('content')

    @yield('modalannonce')

  <!-- Scripts -->
  <script src="{{asset('welcome/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset('welcome/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('welcome/assets/js/owl-carousel.js') }}"></script>
  <script src="{{asset('welcome/assets/js/animation.js') }}"></script>
  <script src="{{asset('welcome/assets/js/imagesloaded.js') }}"></script>
  <script src="{{asset('welcome/assets/js/custom.js') }}"></script>

  {{-- Mes propres js --}}
  <script src="{{asset('welcome/assets/js/search-bar.js') }}"></script>
  {{-- <script src="{{asset('welcome/assets/js/annonce-search.js') }}"></script> --}}
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

  @yield('js')

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });

    $(document).ready(function () {
    $('.search').keyup(function (e) {
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
                                            '<a href="annonces/'+element.id+'" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" > Details </a>'+
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
</body>
 </html>

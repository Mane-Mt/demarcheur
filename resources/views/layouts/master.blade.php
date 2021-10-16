<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>{{env('APP_NAME')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('welcome/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('welcome/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/templatemo-onix-digital.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{asset('welcome/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
<!--

TemplateMo 565 Onix Digital

https://templatemo.com/tm-565-onix-digital

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

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
            <ul class="nav">
              <li class=""><a href="{{route('welcome')}}#top" class="active">Accueil</a></li>
              <li class=""><a href="{{route('welcome')}}#services">Demandes</a></li>
              <li class=""><a href="{{route('welcome')}}#about">A propos</a></li>
              <li class=""><a href="{{route('welcome')}}#portfolio">Offres</a></li>
              <li class=""><a href="{{route('welcome')}}#video">Categories</a></li>
              <li ><a href="{{route('annonces.index')}}">Annonces</a></li>
              <li class=""><a href="{{route('welcome')}}#contact">Contacts</a></li>
              @guest
                <li> <div class="main-red-button-hover" ><a href="{{ route('login') }}">Se connecter</a></div></li>
              @endguest
              @auth
              <li ><div class="main-red-button-hover"><a href="{{ route('home') }}">Dashboard</a></div></li>
              @endauth


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

  <!-- Scripts -->
  <script src="{{asset('welcome/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset('welcome/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('welcome/assets/js/owl-carousel.js') }}"></script>
  <script src="{{asset('welcome/assets/js/animation.js') }}"></script>
  <script src="{{asset('welcome/assets/js/imagesloaded.js') }}"></script>
  <script src="{{asset('welcome/assets/js/custom.js') }}"></script>

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
  </script>
</body>
</html>

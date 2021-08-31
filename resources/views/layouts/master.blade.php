<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Miabe Demarcheur</title>

    <!-- Bootstrap core CSS -->
    <link href="welcome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="welcome/assets/css/fontawesome.css">
    <link rel="stylesheet" href="welcome/assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="welcome/assets/css/animated.css">
    <link rel="stylesheet" href="welcome/assets/css/owl.css">
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
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="welcome/assets/images/logo.png">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Accueil</a></li>
              <li class="scroll-to-section"><a href="#services">Demandes</a></li>
              <li class="scroll-to-section"><a href="#about">A propos</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Annonces</a></li>
              <li class="scroll-to-section"><a href="#video">Videos</a></li>
              <li class="scroll-to-section"><a href="#contact">Contacts</a></li>
              <li class="scroll-to-section"><a href="{{ route('register') }}">S'inscrire</a></li>
              <li class="scroll-to-section"><div class="main-red-button-hover"><a href="{{ route('login') }}">Se connecter</a></div></li>
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
  <script src="welcome/vendor/jquery/jquery.min.js"></script>
  <script src="welcome/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="welcome/assets/js/owl-carousel.js"></script>
  <script src="welcome/assets/js/animation.js"></script>
  <script src="welcome/assets/js/imagesloaded.js"></script>
  <script src="welcome/assets/js/custom.js"></script>

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

@extends('layouts.master')

@section('link')

  <!-- Code pay manager -->
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

@endsection

@section('content')

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row d-lg-none">
            <div class="col-5 pull-right main-btn ">
              @guest
                <li>                  
                  <<a href="{{ route('login') }}"  style="background-color: red; border-radius: 30px;" data-bs-toggle="modal" data-bs-target="#type_annone" > Publier</a>
                </li>
              @endguest
              @auth
                <li ><div class="main-btn"><a href="{{ route('home') }}"  style="background-color: red; border-radius: 30px;"  >Publier</a></div></li>
              @endauth
            </div>
        </div>
        <link rel="preconnect" href="https://fonts.gstatic.com">    <div class="row">
          <div class="col-12 col-lg-4 d-block my-3">
            <!--@component('components.serch-bar')
                @slot('class') d-none d-lg-block @endslot
            @endcomponent-->
            <div class="search-box d-none d-lg-display ">
              <form action="">
                <input type="text" name="search" class=" search" placeholder="Search">
                <span for="" class="icon"> <i class="fa fa-search"></i> </span>
                {{csrf_field()}}
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" id="section">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="owl-carousel owl-banner">
                  <div class="item header-text">
                    <h6>{{ env('APP_NAME')}}</h6>
                    <h2>Contactez nous pour <em>Devenir</em> un <span>Demarcheur</span></h2>
                    <p>Avoir un compte demarcheur vous permettra de toucher un grand public pour vos annonces</p>
                    <div class="down-buttons">
                      <div class="main-blue-button-hover">
                        <a href="#contact">Contactez Nous</a>
                      </div>
                      <div class="call-button">
                        <a href="#"><i class="fa fa-whatsapp"></i> +228 70888992</a>
                      </div>

                    </div>
                  </div>
                  <div class="item header-text">
                    <h6>{{ env('APP_NAME')}}</h6>
                    <h2>Voulez vous <em>publier</em> une <span>annonce</span> ?</h2>
                    <p>Veuillez créer un compte ou contacter nous...</p>
                    <div class="down-buttons">
                      <!--<div class="main-blue-button-hover">
                        <a href="#pricing">Nos services</a>
                      </div-->
                      <div class="call-button">
                        <a href="#"><i class="fa fa-phone"></i> +228 70888992</a>
                      </div>
                    </div>
                  </div>
                  <div class="item header-text">
                    <h6>{{ env('APP_NAME')}}</h6>
                    <h2><em>BIENVENUE</em> sur <span>{{ env('APP_NAME')}}</span></h2>
                    <div class="down-buttons">
                      <!--div class="main-blue-button-hover">
                        <a href="#about">GUide d'utilisation</a>
                      </div-->
                      <div class="call-button">
                        <a href="#"><i class="fa fa-facebook"></i> {{ env('APP_NAME')}}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row mt-lg-3 container-child" >
      <div class="col-lg-8" id="section">
        @forelse ($annonces as $annonce)
            <div class="row my-3 rounded-pill hover-overlay hover-zoom hover-shadow ripple box @if($annonce->annonceType == 'Demande') box-white @else box-success @endif">
              @if($annonce->annonceType == 'Demande')
                <h3 class="text-center font-weight-bold text-danger">Je cherches </h3>
              @else
                  <h3 class="text-center font-weight-bold">{{$annonce->annonceType}}</h3>
              @endif
            
              <div class="col-lg-2 col-sm-12 text-center text-lg-right">
                @if ($annonce->annonceType == 'Offre')
                <div class=""><img style="height:60%; width: 60%;" src="{{asset('public/images/'.$annonce->photo1)}}" alt="" > </div>
                @else
                <i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>
                @endif
              </div>
              <div class="col-lg-8 col-sm-12 annonce ">

                <ul>
                  @include('common.annonce-list-item')
                  <li class="overflow-hidden">{{ Str::substr($annonce->description, 0,25).'...' }}</li>
                  <br/>
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
    </div>
  </div>

  <div class="footer-dec">
    <img src="welcome/assets/images/footer-dec.png" alt="">
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="about footer-item">
            <div class="logo">
              <a href="#"><img src="/assets/img/default/logo.png" width="auto" height="50"></a>
            </div>
            <a href="mailto:contact@allodemarcheur.com">contact@allodemarcheur.com</a>
            <ul>
              <li><a href="https://www.facebook.com/Allo-Demarcheur-105452788589316/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/in/demarcheur-allo-208162225"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://vm.tiktok.com/ZM8m4f68k/" style="background: url(welcome/assets/images/tiktok.png) width: 22px; height: 35px;"><span class="iconify" data-icon="fa-brands:tiktok"></span></a></li>
              <li><a href="https://wa.me/message/4NF4FQTACWWZN1"><i class="fa fa-whatsapp"></i></a></li>
              <li><a href=" https://www.instagram.com/invites/contact/?i=1x9n7915bn48o&utm_content=mycre6x"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="services footer-item">
            <h4>Services</h4>
            <ul>
              <li><a href="#">Graphisme</a></li>
              <li><a href="#">creation d'application mobile</a></li>
              <li><a href="#">creation d'application desktop</a></li>
              <li><a href="#">creation d'application web</a></li>
              <li><a href="#">creation des aquarium</a></li>
              <li><a href="#">maper vos maison,entreprise...</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="community footer-item">
            <h4>Communaute</h4>
            <ul>
              <li><a href="https://aqualab.allodemarcheur.com">Aqualab Togo</a></li>
              <li><a href="https://phoecon.allodemarcheur.com">PhoeCon</a></li>

            </ul>
          </div>
        </div>
        <!--div class="col-lg-3">
          <div class="subscribe-newsletters footer-item">
            <h4>Subscribe Newsletters</h4>
            <p>Get our latest news and ideas to your inbox</p>
            <form action="#" method="get">
              <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
              <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane-o"></i></button>
            </form>
          </div>
        </div-->
        <div class="col-lg-12">
          <div class="copyright">
            <p>Copyright © {{ date('Y') }} Allodemarcheur. All Rights Reserved.
            <br>
            Designed by <a rel="nofollow" href="https://phoecon.allodemarcheur.com" title="Aller sur le site des developpeur">PhoeCon</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

@endsection




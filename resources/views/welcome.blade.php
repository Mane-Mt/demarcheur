@extends('layouts.master')
@section('content')

  <div class="main-banner" id="top">

    <div class="container">
        <div class="row d-lg-none">
            <div class="col-8"></div>
            <div class="col-4 pull-right main-btn ">
                <a href="{{ route('home') }}" class="my-3 " >Publier</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 my-4 d-block">
                <form action="">
                    <div class="form-group mx-3">
                        <div class="input-group">
                            <input type="text" id="search" name="search" class="d-none d-lg-block form-control form-control-lg search mb-5" placeholder="Search">
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
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
                      <a href="#contact">Message Us Now</a>
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
                    <div class="main-blue-button-hover">
                      <a href="#pricing">Nos services</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> +228 70888992</a>
                    </div>
                  </div>
                </div>
                <div class="item header-text">
                  <h6>{{ env('APP_NAME')}}</h6>
                  <h2><em>BIENVENUE</em> sur <span>{{ env('APP_NAME')}}</span></h2>
                  {{-- <p>Please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal if this digital marketing HTML template is useful for you. Thank you.</p> --}}
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#about">GUide d'utilisation</a>
                    </div>
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

  <div id="services" class="our-services section">
    <div class="services-right-dec">
      <img src="welcome/assets/images/services-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="services-left-dec">
        <img src="welcome/assets/images/services-left-dec.png" alt="">
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h2>Les demande de <em> chambre </em> et <span> locations</span></h2>
            <span>Les Demandes</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
            <div class="owl-carousel owl-services" style="margin-bottom: 0px !important;">
              @forelse ($request_annonces as $request_annonce)
                <div class="item">
                    <h5>Recherche d'une maison <b><i>{{$request_annonce->type}}</i></b> , dans le quartier <b>{{$request_annonce->quartier}}</b> </h5>
                    <div class="icon mt-2"><img src="welcome/assets/images/service-icon-01.png" alt=""></div>
                    {{-- <div class="icon"><img src="welcome/assets/images/service-icon-03.png" alt=""></div> --}}
                    <p>{{ Str::substr($request_annonce->description, 0, 100).'...' }}</p>
                    <div class="text-left">
                        <a href="{{route('annonces.show',$request_annonce->id)}}" class="btn btn-primary btn-sm btn-circle">
                            detail
                        </a>


                    </div>
                </div>

              @empty

              <div class="item">
                    Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
              </div>

              @endforelse


            </div>


            {{-- <div class="text-center mt-5">
                <a href="{{route('annonces.index','Demande')}}" class="btn btn-circle btn-danger">Voir plus de demande</a>
            </div> --}}

            <div class="text-center mt-5">
                <a href="{{route('annonces.index','Offre')}}" class="btn btn-block btn-lg btn-circle btn-danger">Voir plus d'offre </a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .abel{
      color:red;

    }

  </style>
  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="welcome/assets/images/demarcheur2.jpeg" alt="Two Girls working together" class="rounded-pill">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>A propos de <em>Allô</em> <span> Demarcheur</span> </h2>
            <span>Nos Statistiques</span>
            {{-- <p>
                <p><em class="text-primary">Publier une annonce</em>.... </p>
                <ul>
                    <li>Connectez vous à votre compte ou créer un compte si vous n'en avez pas</li>
                    <li>Cliquer sur le boutton nouveau sur le tableau de bord et renseigner les informations</li>
                    <li>Enfin Cliquez sur le button publier</li>
                </ul>
            </p> --}}
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="count-digit"> {{$users->count()}} </div>
                    <div class="count-title">Utilisateurs</div>
                    {{-- <p>Lorem ipsum dolor sitti amet, consectetur.</p> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-02.png" alt="">
                    </div>
                    <div class="count-digit">{{$demarcheurs->count()}}</div>
                    <div class="count-title">Demarcheurs</div>
                    {{-- <p>Lorem ipsum dolor sitti amet, consectetur.</p> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-03.png" alt="">
                    </div>
                    <div class="count-digit">{{$annonces->count()}}</div>
                    <div class="count-title">Publications</div>
                    {{-- <p>Lorem ipsum dolor sitti amet, consectetur.</p> --}}
                  </div>
                </div>
              </div>
            </div>

            {{-- <p><em class="text-primary">Postuler à une annonce</em>.... </p>
                <ul>
                    <li>Cliquer sur le boutton postuler de l'annonce</li>
                    <li>Contacter la personne par son numéro de telephone</li>
                </ul> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="welcome/assets/images/demarcheur.jpeg" alt="" class="rounded-pill">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h2>Les <em>Annonces</em> &amp; des <span>Demarcheurs</span></h2>
            <span>Les Offres</span>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
              @forelse ($offer_annonces as $offer_annonce)
                <div class="item">
                    <div class="thumb">
                    <img src="{{asset('public/images/
                    '.$offer_annonce->photo1)}}" alt="" height="600px" width="auto">
                    <div class="hover-effect">
                        <div class="inner-content">
                            <span>{{$offer_annonce->type}}</span><br>
                            <span>Quartier <b>{{$offer_annonce->quartier}}</b> </span> <br>
                            <span>{{ Str::substr($offer_annonce->description, 0, 20).'....'}}</span><br>
                        <a rel="sponsored" class="btn btn-primary  btn-circle" href="{{route('annonces.show',$offer_annonce->id)}}" target="_parent">Detail</a>


                        </div>
                    </div>
                    </div>
                </div>
              @empty
              <div class="item">
                Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
              </div>

              @endforelse

          </div>

            <div class="text-center mt-5">
                <a href="{{route('annonces.index','Offre')}}" class="btn btn-block btn-lg btn-circle btn-danger">Voir plus d'offre </a>
            </div>

        </div>
      </div>
    </div>
  </div>

  <!--div id="pricing" class="pricing-tables">
    <div class="tables-left-dec">
      <img src="welcome/assets/images/tables-left-dec.png" alt="">
    </div>
    <div class="tables-right-dec">
      <img src="welcome/assets/images/tables-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Nous <em>proposons</em> d'autres <span>services</span></h2>
            <span>Nos Services</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="item first-item">
            <h4>Developpement</h4>
            <em>$160/mo</em>
            <span>$140</span>
            <ul>
              <li>10 Projects</li>
              <li>100 GB space</li>
              <li>20 SEO checkups</li>
              <li>Basic Support</li>
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item second-item">
            <h4>Réseaux</h4>
            <em>$240/mo</em>
            <span>$200</span>
            <ul>
              <li>20 Projects</li>
              <li>200 GB space</li>
              <li>50 SEO checkups</li>
              <li>Pro Support</li>
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">Get it Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item third-item">
            <h4>Infographie</h4>
            <em>$360/mo</em>
            <span>$280</span>
            <ul>
              <li>30 Projects</li>
              <li>300 GB space</li>
              <li>100 SEO checkups</li>
              <li>Best Support</li>
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->


  <div id="video" class="our-videos section">
    <div class="videos-left-dec">
      <img src="welcome/assets/images/videos-left-dec.png" alt="">
    </div>
    <div class="videos-right-dec">
      <img src="welcome/assets/images/videos-right-dec.png" alt="">
    </div>

    <div class="call-button" style="position:fixed; bottom:1%;right:1%; z-index:9999;">
      <a href="https://wa.me/22870888992"><i class="fa fa-whatsapp fa-spin fa-3x fa-fw"></i></a>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="nacc">

                      @if ($villa_annonce!= null)
                      <li class="active">
                        <div>
                          <div class="thumb">
                            {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            <img src="{{asset('public/images/'.$villa_annonce->photo1)}}" alt="" srcset="">
                            <div class="overlay-effect">
                                <a href="#"><h4>{{$villa_annonce->type}}</h4></a>
                                <span>{{$villa_annonce->quartier}}</span> <br>
                                <span> <a href="{{route('annonces.show',$villa_annonce->id)}}">Detail</a> </span>
                            </div>
                          </div>
                        </div>
                      </li>
                      @else
                        @include('common.house-type-thumb')
                      @endif

                      @if ($deux_chambre_annonce!= null)
                      <li>
                        <div>
                          <div class="thumb">
                            {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            <img src="{{asset('public/images/
                            '.$deux_chambre_annonce->photo1)}}" alt="" srcset="">
                            <div class="overlay-effect">
                              <a href="#"><h4>{{$deux_chambre_annonce->type}}</h4></a>
                              <span>{{$deux_chambre_annonce->quartier}}</span> <br>
                              <span> <a href="{{route('annonces.show',$deux_chambre_annonce->id)}}">Detail</a> </span>
                            </div>
                          </div>
                        </div>
                      </li>
                      @else
                        @include('common.house-type-thumb')
                      @endif

                      @if ($chambre_salon_annonce!= null)
                      <li>
                        <div>
                          <div class="thumb">
                            {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            <img src="{{asset('public/images/
                            '.$chambre_salon_annonce->photo1)}}" alt="" srcset="">
                            <div class="overlay-effect">
                                <a href="#"><h4>{{$chambre_salon_annonce->type}}</h4></a>
                                <span>{{$chambre_salon_annonce->quartier}}</span> <br>
                                <span> <a href="{{route('annonces.show',$chambre_salon_annonce->id)}}">Detail</a> </span>
                            </div>
                          </div>
                        </div>
                      </li>
                      @else
                        @include('common.house-type-thumb')
                      @endif

                      @if ($une_piece_annonce!= null)
                      {{-- {{dd($une_piece_annonce->photo1)}} --}}
                      <li>
                        <div>
                          <div class="thumb">
                            {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            <img src="{{asset('public/images/
                            '.$une_piece_annonce->photo1)}}" alt="" srcset="">
                            <div class="overlay-effect">
                                <a href="#"><h4>{{$une_piece_annonce->type}}</h4></a>
                                <span>{{$une_piece_annonce->quartier}}</span> <br>
                                <span> <a href="{{route('annonces.show',$une_piece_annonce->id)}}">Detail</a> </span>
                            </div>
                          </div>
                        </div>
                      </li>
                      @else
                        @include('common.house-type-thumb')
                      @endif


                  </ul>
                </div>

                <!--style>

                  .haut{
                    height: 170px;
                  }
                </style>
                <div class="col-lg-4">
                  <div class="menu">
                    <div class="active">
                      <div class="thumb">
                        <img src="welcome/assets/images/demarcheur4.jpeg" alt="Villa" class="haut">
                        <div class="inner-content">
                          <h4>Villa</h4>
                          <span>Dernière annonce de villa</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/demarcheur4.jpeg" alt="Deux chambres salon" class="haut">
                        <div class="inner-content">
                          <h4>Deux chambres salon</h4>
                          <span>Dernière annonce de deux chambres salon</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/demarcheur4.jpeg" alt="chambre salon" class="haut">
                        <div class="inner-content">
                          <h4>Chambre salon</h4>
                          <span>Dernière annonce de  chambre salon</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/demarcheur4.jpeg" alt="Piece" class="haut">
                        <div class="inner-content">
                          <h4>Une pièce</h4>
                          <span>Dernière annonce d'une pièce</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--
  <div id="subscribe" class="subscribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <h2>Know Your Website SEO Score by Email</h2>
                <form id="subscribe" action="" method="get">
                  <input type="text" name="website" id="website" placeholder="Your Website URL" required="">
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                  <button type="submit" id="form-submit" class="main-button ">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 --}}


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="section-heading">
            <h2>Nous <em>Contacter</em> <span>!</span></h2>
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.574391019117!2d1.1908113147689825!3d6.187666695520455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnMTUuNiJOIDHCsDExJzM0LjgiRQ!5e0!3m2!1sfr!2stg!4v1633451403792!5m2!1sfr!2stg" width="100%" height="360px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              {{-- <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <form id="contact" action="" method="get">
            <div class="row">
            <div class="info">
              <div class="col-lg-12">
                <fieldset>
                  <span><i class="fa fa-phone"></i> <a href="tel:+22870888992">+22870888992</a></span>
                  <span><i class="fa fa-envelope"></i> <a href="mailto:contact@allodemarcheur.com">contact@allodemarcheur.com</a></span>
                </fieldset>
              </div>
              </div>

              <!--div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="website" id="website" placeholder="Your Website URL" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Submit Request</button>
                </fieldset>
              </div-->
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="contact-dec">
      <img src="welcome/assets/images/contact-dec.png" alt="">
    </div>
    <div class="contact-left-dec">
      <img src="welcome/assets/images/contact-left-dec.png" alt="">
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

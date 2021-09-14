@extends('layouts.master')
@section('content')

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="owl-carousel owl-banner">
                <div class="item header-text">
                  <h6>Miabe Demarcheur</h6>
                  <h2>Contactez nous pour <em>Devenir</em> un <span>Demarcheur</span></h2>
                  <p>Avoir un compte demarcheur vous permettra de toucher un grand public pour vos annonces</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#contact">Message Us Now</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 010-020-0340</a>
                    </div>
                  </div>
                </div>
                <div class="item header-text">
                  <h6>Miabe Demarcheur</h6>
                  <h2>Voulez vous <em>publier</em> une <span>annonce</span> ?</h2>
                  <p>Veuillez créer un compte ou contacter nous...</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#services">Our Services</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 090-080-0760</a>
                    </div>
                  </div>
                </div>
                <div class="item header-text">
                  <h6>Miabe Demarcheur</h6>
                  <h2><em>BIENVENUE</em> sur <span>MIABE DEMARCHEUR</span></h2>
                  <p>Please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal if this digital marketing HTML template is useful for you. Thank you.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#video">Watch Videos</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 050-040-0320</a>
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
            {{-- <span>LES DEMANDES DES UTILISATEURS</span> --}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
            <div class="owl-carousel owl-services" style="margin-bottom: 0px !important;">
              @forelse ($request_annonces as $request_annonce)
                <div class="item">
                    <h5>Recherche d'une maison <b><i>{{$request_annonce->type}}</i></b> , dans le quartier <b>{{$request_annonce->quartier}}</b> </h5>
                    <div class="icon"><img src="welcome/assets/images/service-icon-03.png" alt=""></div>
                    <p>{{ Str::substr($request_annonce->description, 0, 100).'...' }}</p>
                    <div class="text-left">
                        {{-- <button class="btn btn-primary btn-sm" style="border-radius:20px!important">
                            detail
                        </button> --}}
                        <button type="button" class="btn btn-primary btn-sm btn-circle" data-bs-toggle="modal" data-bs-target="#requestModal{{$request_annonce->id}}">
                            Detail
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="requestModal{{$request_annonce->id}}" tabindex="-1" aria-labelledby="requestModal{{$request_annonce->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="requestModal{{$request_annonce->id}}Label">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
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


                <div class="text-center">
                    <a href="{{route('annonces.index','Demande')}}" class="btn btn-circle btn-danger">Voir plus de demande</a>
                    </div>

{{--
            <div class="item">
              <h4>Optimizing your websites for Speed</h4>
              <div class="icon"><img src="welcome/assets/images/service-icon-01.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
             --}}




        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="welcome/assets/images/about-left-image.png" alt="Two Girls working together">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Les informations sur <em>Miabe Devis</em> &amp; <span>Project</span> Management</h2>
            <p>You can browse free HTML templates on Too CSS website. Visit the website and explore latest website templates for your projects.</p>
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="count-digit">320</div>
                    <div class="count-title">Utilisateurs</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-02.png" alt="">
                    </div>
                    <div class="count-digit">640</div>
                    <div class="count-title">Demarcheurs</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="welcome/assets/images/service-icon-03.png" alt="">
                    </div>
                    <div class="count-digit">120</div>
                    <div class="count-title">Publications</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="welcome/assets/images/portfolio-left-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h2>Les <em>Annonces</em> &amp; des <span>Demarcheurs</span></h2>
            <span>Our Portfolio</span>
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
                  <img src="{{asset('images/'.$offer_annonce->photo1)}}" alt="" height="600px" width="auto">
                  <div class="hover-effect">
                    <div class="inner-content">
                        <span>{{$offer_annonce->type}}</span><br>
                        <span>Quartier <b>{{$offer_annonce->quartier}}</b> </span> <br>
                        <span>{{ Str::substr($offer_annonce->description, 0, 20).'....'}}</span>
                      <a rel="sponsored" href="{{route('annonces.show',$offer_annonce->id)}}" target="_parent"><h4>Detail</h4></a>

                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="item">
                Ooops ! desolé.... Nous n'avons pas d'annonce  pour vous
              </div>

              @endforelse



            {{-- <div class="item">
              <div class="thumb">
                <img src="welcome/assets/images/portfolio-02.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Two</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="welcome/assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a rel="sponsored" href="https://templatemo.com/tm-562-space-dynamic" target="_parent"><h4>Third Project</h4></a>
                    <span>Space Dynamic SEO</span>
                  </div>
                </div>
              </div>
            </div>


            <div class="item">
              <div class="thumb">
                <img src="welcome/assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>12th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        <div class="text-center mt-5">
            <a href="{{route('annonces.index','Offre')}}" class="btn btn-block btn-lg btn-circle btn-danger">Voir plus d'offre </a>
        </div>

        </div>
      </div>
    </div>
  </div>

  <div id="pricing" class="pricing-tables">
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
            <h2>Select a suitable <em>plan</em> for your next <span>projects</span></h2>
            <span>Our Plans</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="item first-item">
            <h4>Starter Plan</h4>
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
            <h4>Standard Plan</h4>
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
            <h4>Advanced Plan</h4>
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
  </div>


  <div id="video" class="our-videos section">
    <div class="videos-left-dec">
      <img src="welcome/assets/images/videos-left-dec.png" alt="">
    </div>
    <div class="videos-right-dec">
      <img src="welcome/assets/images/videos-right-dec.png" alt="">
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
                            <img src="{{asset('images/'.$villa_annonce->photo1)}}" alt="" srcset="">
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
                            <img src="{{asset('images/'.$deux_chambre_annonce->photo1)}}" alt="" srcset="">
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
                            <img src="{{asset('images/'.$chambre_salon_annonce->photo1)}}" alt="" srcset="">
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
                      <li>
                        <div>
                          <div class="thumb">
                            {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            <img src="{{asset('images/'.$une_piece_annonce->photo1)}}" alt="" srcset="">
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
                <div class="col-lg-4">
                  <div class="menu">
                    <div class="active">
                      <div class="thumb">
                        <img src="welcome/assets/images/video-thumb-01.png" alt="">
                        <div class="inner-content">
                          <h4>Villa</h4>
                          <span>Dernière annonce de villa</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/video-thumb-02.png" alt="">
                        <div class="inner-content">
                          <h4>Deux chambres salon</h4>
                          <span>Dernière annonce de deux chambres salon</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/video-thumb-03.png" alt="Marketing">
                        <div class="inner-content">
                          <h4>Chambre salon</h4>
                          <span>Dernière annonce de  chambre salon</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="welcome/assets/images/video-thumb-04.png" alt="SEO Work">
                        <div class="inner-content">
                          <h4>Une pièce</h4>
                          <span>Dernière annonce d'une pièce</span>
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
    </div>
  </div>

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


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="section-heading">
            <h2>Feel free to <em>Contact</em> us via the <span>HTML form</span></h2>
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
            <div class="info">
              <span><i class="fa fa-phone"></i> <a href="#">010-020-0340<br>090-080-0760</a></span>
              <span><i class="fa fa-envelope"></i> <a href="#">info@company.com<br>mail@company.com</a></span>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <form id="contact" action="" method="get">
            <div class="row">
              <div class="col-lg-12">
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
              </div>
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
              <a href="#"><img src="welcome/assets/images/logo.png" alt="Onix Digital TemplateMo"></a>
            </div>
            <a href="#">info@company.com</a>
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="services footer-item">
            <h4>Services</h4>
            <ul>
              <li><a href="#">SEO Development</a></li>
              <li><a href="#">Business Growth</a></li>
              <li><a href="#">Social Media Managment</a></li>
              <li><a href="#">Website Optimization</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="community footer-item">
            <h4>Community</h4>
            <ul>
              <li><a href="#">Digital Marketing</a></li>
              <li><a href="#">Business Ideas</a></li>
              <li><a href="#">Website Checkup</a></li>
              <li><a href="#">Page Speed Test</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="subscribe-newsletters footer-item">
            <h4>Subscribe Newsletters</h4>
            <p>Get our latest news and ideas to your inbox</p>
            <form action="#" method="get">
              <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
              <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane-o"></i></button>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright">
            <p>Copyright © 2021 Onix Digital Co., Ltd. All Rights Reserved.
            <br>
            Designed by <a rel="nofollow" href="https://templatemo.com" title="free CSS templates">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


@endsection

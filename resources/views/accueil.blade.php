@extends('app')

@section('title', 'NextGen - Accueil')

@section('content')

@include('header.header')

        <!-- Banner Section-->
        <section class="banner-section-four -type-16" style="background-color: #66022b;">

            <div class="banner-carousel owl-carousel owl-theme default-nav">
                <!-- Slide Item 1 -->
                <div class="container-fluid bg-image">
                    <div class="row h-100">
                        <!-- Colonne de texte à gauche -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="hero-content">
                                <h1>Commence ta carrière ici</h1>
                                <ul class="list-style-one">
                                        <li>Accède aux opportunités qui te sont dédiées. Trouve des offres d'emploi et de stages adaptées à ton profil et à tes aspirations.</li>
                                        <li>Connecte-toi avec des recruteurs : Rencontre des entreprises et des recruteurs qui cherchent des talents comme le tien.</li>
                                        <li>Fais le premier pas vers une carrière réussie. Inscris-toi dès maintenant et démarre ton aventure professionnelle avec confiance !</li>
                                </ul>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="{{route('register')}}" class="theme-btn btn-style-one">Inscris-toi maintenant</a>
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Inscris-toi maintenant</a>
>>>>>>> master
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Inscris-toi maintenant</a>
>>>>>>> 40fc94a (Initial commit)
                            </div>
                        </div>
                        <!-- Colonne d'image à droite -->
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <img src="images/index-14/images/1.png" alt="Homme qui croise les bras" class="img-fluid">
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> master
=======
                
>>>>>>> 40fc94a (Initial commit)
                <!-- Slide Item 2 -->
                <div class="container-fluid bg-image">
                    <div class="row h-100">
                        <!-- Colonne de texte à gauche -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="hero-content">
                                <h1>Dénichez votre jeune talent avec NextGen</h1>
                                <ul class="list-style-one">
                                    <li>Rencontrez les futurs leaders : une réserve de jeunes professionnels prêts à apporter leur énergie et leurs idées novatrices à votre équipe.</li>
                                    <li>Trouvez des profils qui résonnent avec vos valeurs : Sélectionnez des candidats enthousiastes et engagés, alignés avec vos objectifs et votre culture d’entreprise.</li>
                                    <li>Faites grandir votre équipe avec des talents prometteurs.</li>
                                </ul>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="{{route('register')}}" class="theme-btn btn-style-one">Découvrez les talents</a>
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Découvrez les talents</a>
>>>>>>> master
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Découvrez les talents</a>
>>>>>>> 40fc94a (Initial commit)
                            </div>
                        </div>
                        <!-- Colonne d'image à droite -->
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <img src="images/index-19/hero-img-1.png" alt="Image description" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> master
=======
        
>>>>>>> 40fc94a (Initial commit)
        <!-- End Banner Section-->

        <!--Clients Section-->
        <section class="clients-section">
            <div class="sponsors-outer wow fadeInUp">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-1.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-2.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-3.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-4.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-5.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-6.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1-7.png" alt=""></a></figure>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Clients Section-->

        <!-- About Section -->
        <section class="about-section" >
            <div class="auto-container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                        <div class="inner-column wow fadeInUp">
                            <div class="sec-title">
                                <h2>Commencez votre parcours <br>dès maintenant.</h2>
                                <div class="text">La première fois peut être intimidante, mais chez NextGen, nous
                                    facilitons votre transition vers le monde professionnel.</div>
                            </div>
                            <ul class="list-style-one">
                                <li>Accédez à des offres d'emploi réservées à nos membres</li>
                                <li>Recevez des conseils pour optimiser vos candidatures</li>
                                <li>Connectez-vous avec des recruteurs et élargissez votre réseau</li>
                            </ul>
                            <a href="{{route('connexion')}}" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Découvrir les
                                    opportunités</span></a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <figure class="image wow fadeInLeft"><img src="images/resource/image-2.jpg" alt=""></figure>

                        <!-- Count Employers -->
                        <div class="count-employers wow fadeInUp">
                            <div class="check-box"><span class="flaticon-tick"></span></div>
                            <span class="title">+ de 20 partenaires</span>
                            <figure class="image"><img src="images/resource/multi-logo.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section-two">
            <div class="auto-container">
                <div class="row align-items-center">
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 order-2">
                        <div class="inner-column wow fadeInRight pt-0">
                            <div class="sec-title mb-4">
                                <h2>Accédez au plus grand vivier de talents sur NextGen</h2>
                                <div class="text">Découvrez les jeunes talents les plus prometteurs et innovants pour
                                    dynamiser votre entreprise.</div>
                            </div>
                            <ul class="list-style-one at-home22 mb40 mt40">
                                <li>Une communauté de talents exceptionnels</li>
                                <li>Des jeunes talents qualifiés</li>
                                <li>La plateforme carrière officielle d'établissements d'enseignement supérieur</li>
                            </ul>
<<<<<<< HEAD
<<<<<<< HEAD
                            <a href="{{route('register')}}" class="theme-btn btn-style-one">Rejoindre NextGen<i
=======
                            <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Rejoindre NextGen<i
>>>>>>> master
=======
                            <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Rejoindre NextGen<i
>>>>>>> 40fc94a (Initial commit)
                                    class="fal fa-long-arrow-left ms-3"></i></a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 mb-4 mb-lg-0">
                        <figure class="image-box wow fadeInLeft mx-0"><img src="images/index-22/home22-img-3.png"
                                alt=""></figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->


        <section class="features__section">
            <div class="auto-container">
                <div class="row features__grid justify-content-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="features -type-1">
                            <div class="icon-wrap">
                                <div class="icon icon-contact"></div>
                            </div>
                            <div class="title">Créez un compte sur notre plateforme</div>
                        </div>
                    </div>

                    <div class="col-lg-auto features-line-col">
                        <div class="features-line"></div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="features -type-1">
                            <div class="icon-wrap">
                                <div class="icon icon-case"></div>
                            </div>
                            <div class="title">Découvrez tous les postes disponibles</div>
                        </div>
                    </div>

                    <div class="col-lg-auto features-line-col">
                        <div class="features-line"></div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="features -type-1">
                            <div class="icon-wrap">
                                <div class="icon icon-doc"></div>
                            </div>
                            <div class="title">Postulez à ceux qui correspondent à vos intérêts</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features Section-->
        <section class="registeration-banners">
            <div class="auto-container">
                <div class="row wow fadeInUp">
                    <!-- Banner Style One -->
                    <div class="banner-style-one col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <h3>Entreprise</h3>
                                <p>Connectez-vous avec les professionnels de demain et propulsez votre
                                    entreprise vers de nouveaux sommets avec NextGen.</p>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="{{route('register')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
>>>>>>> master
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
>>>>>>> 40fc94a (Initial commit)
                            </div>
                            <figure class="image"><img src="images/resource/employ.png" alt=""></figure>
                        </div>
                    </div>

                    <!-- Banner Style Two -->
                    <div class="banner-style-two col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <h3>Service carrière</h3>
                                <p>Préparez vos étudiants pour l'avenir en les connectant avec les meilleures
                                    opportunités de carrière grâce à NextGen.</p>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="{{route('register')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
>>>>>>> master
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
>>>>>>> 40fc94a (Initial commit)
                            </div>
                            <figure class="image"><img src="images/resource/candidate.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Section Two -->
        <section class="testimonial-section">
            <div class="container-fluid">
              <!-- Sec Title -->
              <div class="sec-title text-center">
                <h2>Témoignages</h2>
              </div>
<<<<<<< HEAD
<<<<<<< HEAD

              <div class="carousel-outer wow fadeInUp">

                <!-- Testimonial Carousel -->
                <div class="testimonial-carousel owl-carousel owl-theme">

=======
=======
>>>>>>> 40fc94a (Initial commit)
      
              <div class="carousel-outer wow fadeInUp">
      
                <!-- Testimonial Carousel -->
                <div class="testimonial-carousel owl-carousel owl-theme">
      
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
                  <!--Testimonial Block -->
                  <div class="testimonial-block">
                    <div class="inner-box">
                      <h4 class="title">Good theme</h4>
                      <div class="text">Without NextGen i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                      <div class="info-box">
                        <div class="thumb"><img src="images/resource/testi-thumb-1.png" alt=""></div>
                        <h4 class="name">Nicole Wells</h4>
                        <span class="designation">Web Developer</span>
                      </div>
                    </div>
                  </div>
<<<<<<< HEAD
<<<<<<< HEAD

=======
      
>>>>>>> master
=======
      
>>>>>>> 40fc94a (Initial commit)
                  <!--Testimonial Block -->
                  <div class="testimonial-block">
                    <div class="inner-box">
                      <h4 class="title">Great quality!</h4>
                      <div class="text">Without NextGen i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                      <div class="info-box">
                        <div class="thumb"><img src="images/resource/testi-thumb-2.png" alt=""></div>
                        <h4 class="name">Gabriel Nolan</h4>
                        <span class="designation">Consultant</span>
                      </div>
                    </div>
                  </div>
<<<<<<< HEAD
<<<<<<< HEAD

=======
      
>>>>>>> master
=======
      
>>>>>>> 40fc94a (Initial commit)
                  <!--Testimonial Block -->
                  <div class="testimonial-block">
                    <div class="inner-box">
                      <h4 class="title">Awesome Design </h4>
                      <div class="text">Without NextGen i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality</div>
                      <div class="info-box">
                        <div class="thumb"><img src="images/resource/testi-thumb-3.png" alt=""></div>
                        <h4 class="name">Ashley Jenkins</h4>
                        <span class="designation">Designer</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <!-- End Testimonial Section -->
<<<<<<< HEAD
<<<<<<< HEAD

        <!-- Features Section-->

=======
        
        <!-- Features Section-->
        
>>>>>>> master
=======
        
        <!-- Features Section-->
        
>>>>>>> 40fc94a (Initial commit)

        <!-- Registeration Banners -->
        <!-- End Registeration Banners -->

        <!-- Call To Action Three -->
        <section class="call-to-action-three style-two">
            <div class="auto-container wow fadeInUp">
                <div class="outer-box">
                    <div class="sec-title light">
                        <h2>Vous avez une question?</h2>
                        <div class="text text-white">Nous sommes là pour vous aider. Consultez notre FAQ, envoyez-nous
                            un courrier<br />ou appelez au +261 20 24 245 12.</div>
                    </div>

                    <div class="btn-box">
                        <a href="#" class="theme-btn btn-style-two">Consulter la FAQ<i
                                class="fal fa-long-arrow-left ms-3"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <style>
            /* Style par défaut pour les écrans plus grands */
            .banner-carousel .bg-image img {
                display: block; /* Assurez-vous que l'image est visible par défaut */
            }

            /* Masquer l'image sur les petits écrans */
            @media (max-width: 768px) {
                .banner-carousel .bg-image img {
                    display: none; /* Masquer l'image sur les petits écrans */
                }
            }
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> master
=======
    
>>>>>>> 40fc94a (Initial commit)
        </style>

        <script>
            $(document).ready(function(){
            $(".banner-carousel").owlCarousel({
            items: 1, // Number of items to show
            loop: true, // Infinite loop
            margin: 0, // Margin between items
            autoplay: true, // Enable autoplay
            autoplayTimeout: 5000, // Time between slides (in milliseconds)
            autoplayHoverPause: true, // Pause on hover
            dots: true, // Show pagination dots
            nav: false // Hide navigation arrows
            });
        });
<<<<<<< HEAD
<<<<<<< HEAD

        </script>
@endsection
=======
    
        </script>
@endsection
>>>>>>> master
=======
    
        </script>
@endsection
>>>>>>> 40fc94a (Initial commit)

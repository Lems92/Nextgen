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
                                <h2>NextGen connecte les talents de demain aux meilleures entreprises. </h2>
                                    <p>Trouvez un stage, 
                                    une alternance ou un premier emploi en quelques clics</p>
                                <ul class="list-style-one">
                                        <li>Connectez-vous aux talents de demain, sans frontières.</li>
                                </ul>
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Inscris-toi maintenant</a>
                            </div>
                        </div>
                        <!-- Colonne d'image à droite -->
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <img src="images/index-14/images/1.png" alt="Homme qui croise les bras" class="img-fluid">
                        </div>
                    </div>
                </div>
                
                <!-- Slide Item 2 -->
                <div class="container-fluid bg-image">
                    <div class="row h-100">
                        <!-- Colonne de texte à gauche -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="hero-content">
                                <h2>NextGen connecte les talents de demain aux meilleures entreprises. </h2>
                                    <p>Trouvez un stage, 
                                    une alternance ou un premier emploi en quelques clics</p>
                                <ul class="list-style-one">
                                    <li>Le recrutement inclusif commence ici.</li>    
                                </ul>
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Découvrez les talents</a>
                            </div>
                        </div>
                        <!-- Colonne d'image à droite -->
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <img src="images/index-19/hero-img-1.png" alt="Image description" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="container-fluid bg-image">
                    <div class="row h-100">
                        <!-- Colonne de texte à gauche -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="hero-content">
                                <h2>NextGen connecte les talents de demain aux meilleures entreprises. </h2>
                                    <p>Trouvez un stage, 
                                    une alternance ou un premier emploi en quelques clics</p>
                                <ul class="list-style-one">
                                    <li>Un avenir accessible à tous.</li>                                   
                                </ul>
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Découvrez les talents</a>
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

        <!-- About Section -->
<section class="apropos-section">
    <div class="auto-container">
        <div class="row align-items-center">
            <!-- Content Column -->
            <div class="content-column col-lg-12">
                <div class="inner-column text-center">
                    <h2>À propos de NextGen</h2>
                    <p>NextGen, c’est l’ambition de rapprocher jeunes talents et entreprises. Notre mission : simplifier le recrutement et maximiser les opportunités pour tous.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->
        
        <!-- End Banner Section-->

        <!--Clients Section
        <section class="clients-section">
            <div class="sponsors-outer wow fadeInUp">
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
        End Clients Section-->

        <!-- About Section -->
        <section class="about-section" >
            <div class="auto-container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                        <div class="inner-column wow fadeInUp">
                            <div class="sec-title">
                                <h2>Préparez votre avenir avec NextGen.</h2>
                                <div class="text"> Trouvez rapidement des offres adaptées à votre profil 
                                    Inscrivez-vous et accélérez votre carrière. </div>
                            </div>
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
                                <h2>Accédez aux meilleurs jeunes talents.</h2>
                                <div class="text">Publiez vos offres, présélectionnez des candidats 
                                    qualifiés et recrutez efficacement. </div>
                            </div>
                            <a href="{{route('inscription')}}" class="theme-btn btn-style-one">Rejoindre NextGen<i
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
                                <p>Accédez aux meilleurs jeunes talents. Publiez vos offres, présélectionnez des candidats 
                                    qualifiés et recrutez efficacement.</p>
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
                            </div>
                            <figure class="image"><img src="images/resource/employ.png" alt=""></figure>
                        </div>
                    </div>

                    <!-- Banner Style Two -->
                    <div class="banner-style-two col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <h3>Service carrière</h3>
                                <p>Facilitez l’insertion professionnelle de vos étudiants avec NextGen.</p>
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-two">Nous rejoindre</a>
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
      
              <div class="carousel-outer wow fadeInUp">
      
                <!-- Testimonial Carousel -->
                <div class="testimonial-carousel owl-carousel owl-theme">
      
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
        
        <!-- Features Section-->
        

        <!-- Registeration Banners -->
        <!-- End Registeration Banners -->

        <!-- Call To Action Three -->
        <section class="call-to-action-three style-two">
            <div class="auto-container wow fadeInUp">
                <div class="outer-box">
                    <div class="sec-title light">
                        <h2>Besoin d’aide ?</h2>
                        <div class="text text-white"> Contactez notre équipe via le formulaire en ligne ou par email : 
                            support@nextgen.com.<br />ou appelez au +261 20 24 245 12.</div>
                    </div>

                    <div class="btn-box">
                        <a href="#" class="theme-btn btn-style-two">Consulter la FAQ<i
                                class="fal fa-long-arrow-left ms-3"></i></a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>FAQ</h2>
                </div>
                <div class="faq-content">
                    <div class="faq-item">
                        <h4>Comment s’inscrire ?</h4>
                        <p>Créez un compte et complétez votre profil en quelques minutes.</p>
                    </div>
                    <div class="faq-item">
                        <h4>Quels types d’offres ?</h4>
                        <p>Stages, alternances et premiers emplois.</p>
                    </div>
                    <div class="faq-item">
                        <h4>Comment contacter un recruteur ?</h4>
                        <p>Postulez et échangez directement via la plateforme.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End FAQ Section -->

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
            .faq-section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }
    
    .faq-section .sec-title {
        margin-bottom: 40px;
    }

    .faq-section .faq-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-section .faq-item {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .faq-section .faq-item h4 {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 600;
    }

    .faq-section .faq-item p {
        margin: 0;
        font-size: 16px;
        color: #555;
    }
.apropos-section {
    padding: 60px 0;
    background-color: #f9f9f9;
    text-align: center
}

.apropos-section .inner-column {
    max-width: 800px;
    margin-left: 100px;
}
.apropos-section .auto-container {
    max-width: 100%;
    width: 100%;
    padding: 0; /* Optionnel : enlève les marges internes */
    margin: 0; /* Optionnel : enlève les marges externes */
}


.apropos-section h2 {
    margin-bottom: 20px;
    font-size: 28px;
    font-weight: 700;
}

.apropos-section p {
    font-size: 18px;
    color: #555;
}
.apropos-section .content-column {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.auto-container {
    width: 100% !important;
    max-width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin: 0 !important;
}

.row.align-items-center {
    margin: 0 auto !important;
    width: 100% !important;
    max-width: 100% !important;
    display: flex;
    flex-wrap: wrap;
}


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
    
        </script>
@endsection
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<<<<<<< HEAD
<<<<<<< HEAD
<style>

header{
    background-color: #66022b;
}
    /* Adjust the navbar links */
.nav-outer .navigation > li > a,
.nav-outer .navigation > li > span {
    padding: 8px 12px; /* Reduce padding to make buttons smaller */
    font-size: 14px; /* Adjust the font size */
    line-height: 1.5; /* Adjust line height for better spacing */
}

/* Adjust the login/register buttons */
.btn-box .theme-btn {
    padding: 8px 16px; /* Reduce padding */
    font-size: 14px; /* Adjust font size */
    border-radius: 4px; /* Optional: Adjust border-radius */
    margin-left: 10px; /* Adjust margin between buttons */
}

.sticky-header .theme-btn {
    padding: 6px 12px; /* Further reduce padding for sticky header */
}

/* Optional: Adjust logo size */
.logo-box img, .sticky-logo img {
    height: 40px; /* Adjust logo size */
}
.navigation li.has-dropdown:hover .dropdown {
    display: block; /* Show the submenu on hover */
    visibility: visible; /* Ensure it's visiblea */
    opacity: 1; /* Ensure it's not transparent */
}

.navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
        }


/* Mobile adjustments */
@media (max-width: 768px) {
    .nav-outer .navigation > li > a,
    .nav-outer .navigation > li > span {
        font-size: 12px; /* Smaller font on mobile */
        padding: 6px 8px; /* Reduce padding on mobile */
    }

    .btn-box .theme-btn {
        font-size: 12px; /* Smaller font on mobile */
        padding: 6px 10px;
        display: inline-block !important; /* Reduce padding on mobile */
    }
    .page-wrapper {
            padding-top: 0px; /* Ajustez cette valeur en fonction de la hauteur de votre navbar */
        }
}


</style>
<div class="page-wrapper">
    <div class="preloader"></div>
=======

<div class="page-wrapper">
    <div class="preloader"></div>      
>>>>>>> master
=======

<div class="page-wrapper">
    <div class="preloader"></div>      
>>>>>>> 40fc94a (Initial commit)
    <header class="main-header header-style-four">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a></div>
                    </div>
<<<<<<< HEAD
<<<<<<< HEAD

                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li><a href="{{route('accueil')}}"><span>Accueil</span></a></li>
                            <li class="has-dropdown">
                                <a href="#"><span>Étudiant</span></a>
                                <ul class="dropdown">
                                    <li><a href="#">Trouver un travail</a></li>
                                    <li><a href="#">Explorer les catégories</a></li>
                                    <li><a href="#">Tableau de bord</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#"><span>Entreprise</span></a>
                                <ul class="dropdown">
                                    <li><a href="#">Trouver des candidats</a></li>
                                    <li><a href="#">Tableau de bord</a></li>
                                    <li><a href="#">Ajouter offre</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#"><span>Service carrière</span></a>
                                <ul class="dropdown">
                                    <li><a href="#">Trouver des candidats</a></li>
                                    <li><a href="#">Tableau de bord</a></li>
                                    <li><a href="#">Ajouter évènement</a></li>
                                </ul>
                            </li>
=======
=======
>>>>>>> 40fc94a (Initial commit)
    
                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li><a href="{{route('accueil')}}"><span>Accueil</span></a></li>
                            <li class="dropdown">
                                <span>Étudiant</span>
                                <ul class="dropdown">
<<<<<<< HEAD
                                    <li><a href="{{route('explorer-offre')}}">Explorer les offres</a></li>
                                    <li><a href="#">Explorer les évenements</a></li>
=======
                                    <li><a href="{{route('offers.index')}}">Explorer les offres</a></li>
                                    <li><a href="{{route('explorer-event')}}">Explorer les évenements</a></li>
>>>>>>> 40fc94a (Initial commit)
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>Entreprise</span>
                                <ul>
                                    <li><a href="{{route('gerer-candidat')}}">Gerer les candidat</a></li>
                                    <li><a href="{{route('offre')}}">Publier une offre</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown">
                                <span>Service carrière</span>
                                <ul class="dropdown">
                                    <li><a href="{{route('publier-event')}}">Publier un évenement</a></li>
                                    <li><a href="{{route('gestion-etudiants')}}">Gerer les étudiants</a></li>
                                </ul>
                            </li>
                             <li class="dropdown">
                                <span>NextGen</span>
                                <ul>
                                    <li><a href="blog-list-v1.html">A propos</a></li>
                                    <li><a href="blog-list-v2.html">F.A.Q</a></li>
                                    <li><a href="blog-list-v3.html">Nous contacter</a></li>
                                </ul>
                </li>
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
                        </ul>
                        <div class="outer-box">
                            <!-- Login/Register -->
                            <div class="btn-box">
                                <a href="{{route('connexion')}}" class="theme-btn btn-style-two">Se connecter</a>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="{{route('register')}}" class="theme-btn btn-style-three">Créer un compte</a>
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-three">Créer un compte</a>
>>>>>>> master
=======
                                <a href="{{route('inscription')}}" class="theme-btn btn-style-three">Créer un compte</a>
>>>>>>> 40fc94a (Initial commit)
                            </div>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
<<<<<<< HEAD
<<<<<<< HEAD

            </div>
        </div>

=======
=======
>>>>>>> 40fc94a (Initial commit)
    
            </div>
        </div>
    
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="main-box">
                    <div class="logo-box">
                        <div class="sticky-logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a></div>
                    </div>
                    <!--Keep This Empty / Menu will come through Javascript-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->
<<<<<<< HEAD
<<<<<<< HEAD

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a></div>

=======
=======
>>>>>>> 40fc94a (Initial commit)
    
        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a></div>
    
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <div class="outer-box">
                    <!-- Login/Register -->
                    <div class="login-box">
                        <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                    </div>
                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
                </div>
            </div>
        </div>
<<<<<<< HEAD
<<<<<<< HEAD

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </header>
=======
=======
>>>>>>> 40fc94a (Initial commit)
    
        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </header>
    <style>

        header{
            background-color: #66022b;
        }
            /* Adjust the navbar links */
        .nav-outer .navigation > li > a,
        .nav-outer .navigation > li > span {
            padding: 8px 12px; /* Reduce padding to make buttons smaller */
            font-size: 14px; /* Adjust the font size */
            line-height: 1.5; /* Adjust line height for better spacing */
        }
        
        /* Adjust the login/register buttons */
        .btn-box .theme-btn {
            padding: 8px 16px; /* Reduce padding */
            font-size: 14px; /* Adjust font size */
            border-radius: 4px; /* Optional: Adjust border-radius */
            margin-left: 10px; /* Adjust margin between buttons */
        }
        
        .sticky-header .theme-btn {
            padding: 6px 12px; /* Further reduce padding for sticky header */
        }
        
        /* Optional: Adjust logo size */
        .logo-box img, .sticky-logo img {
            height: 40px; /* Adjust logo size */
        }
        .navigation li.has-dropdown:hover .dropdown {
            display: block; /* Show the submenu on hover */
            visibility: visible; /* Ensure it's visiblea */
            opacity: 1; /* Ensure it's not transparent */
        }
        
        .navbar {
                    position: fixed;
                    top: 0;
                    width: 100%;
                    z-index: 1050;
                }
        .main-menu .navigation{
                margin-left: -90px;
              }
        
        /* Mobile adjustments */
        @media (max-width: 768px) {
            .nav-outer .navigation > li > a,
            .nav-outer .navigation > li > span {
                font-size: 12px; /* Smaller font on mobile */
                padding: 6px 8px; /* Reduce padding on mobile */
            }
        
            .btn-box .theme-btn {
                font-size: 12px; /* Smaller font on mobile */
                padding: 6px 10px;
                display: inline-block !important; /* Reduce padding on mobile */
            }
            .page-wrapper {
                    padding-top: 0px; /* Ajustez cette valeur en fonction de la hauteur de votre navbar */
                }
        }
        
        
<<<<<<< HEAD
        </style>
>>>>>>> master
=======
        </style>
>>>>>>> 40fc94a (Initial commit)

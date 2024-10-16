@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    if($user) {
        $user->load('userable');
    }

@endphp

<link href="{{ asset('css/header.css') }}" rel="stylesheet">

<div class="page-wrapper">
    <div class="preloader"></div>
    <header class="main-header header-style-four">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt=""
                                                                              title=""></a></div>
                    </div>

                    <nav class="nav main-menu d-flex justify-content-between align-items-center">
                        <ul class="navigation" id="navbar">
                            <li><a href="{{route('accueil')}}"><span>Accueil</span></a></li>
                            <li class="dropdown">
                                <span>Étudiant</span>
                                <ul class="dropdown">
                                    <li><a href="{{route('etudiants.explorer_offre')}}">Explorer les offres</a></li>
                                    <li><a href="{{route('etudiants.explorer_event')}}">Explorer les évenements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>Entreprise</span>
                                <ul>
                                    <li><a href="{{route('entreprise.gerer-candidat')}}">Gerer les candidat</a></li>
                                    <li><a href="{{route('entreprise.offres.create')}}">Publier une offre</a></li>
                                </ul>
                            </li>
                            <li class=" dropdown">
                                <span>Service carrière</span>
                                <ul class="dropdown">
                                    <li><a href="{{route('universite.gerer_event')}}">Mes évenement</a></li>
                                    <li><a href="{{route('universite.gestion_etudiants')}}">Gerer les étudiants</a></li>
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
                        </ul>
                        @guest
                            <div class="outer-box">
                                <!-- Login/Register -->
                                <div class="btn-box d-flex">
                                    <a href="{{route('connexion')}}" class="theme-btn btn-style-two">Se connecter</a>
                                    <a href="{{route('inscription')}}" class="theme-btn btn-style-three">Créer un
                                        compte</a>
                                </div>
                            </div>
                        @endguest
                        @auth
                            <div class="outer-box">
                                <div class="custom-dropdown dropdown">
                                    <a href="#" class="d-flex align-items-center text-decoration-none gap-2 custom-dropdown-toggle"
                                       id="userDropdown" aria-expanded="false">
                                        <!-- Avatar -->
                                        @if($user->hasRole('admin'))
                                            <img src="{{asset('storage/images/default-avatar.png')}}" alt="avatar"
                                                 class="rounded-circle"
                                                 width="40" height="40">
                                            <i class="la la-caret-down" style="color: white;"></i>
                                        @else
                                            <img
                                                src="{{asset('storage/' . (($user->userable->profile_picture !== null && $user->userable->profile_picture !== "") ? $user->userable->profile_picture : 'images/default-avatar.png'))}}"
                                                alt="avatar" class="rounded-circle"
                                                width="40" height="40">
                                            <i class="la la-caret-down" style="color: white;"></i>
                                        @endif
                                    </a>
                                    <ul class="custom-dropdown-menu" id="customDropdownMenu">
                                        <!-- Email non clickable -->
                                        <li class="px-3 py-2">
                                            @if($user->hasRole('admin'))
                                                <span class="d-block fw-bold">Administration</span>
                                            @elseif($user->hasRole('etudiant'))
                                                <span class="d-block fw-bold">{{$user->userable->prenom}}</span>
                                            @elseif($user->hasRole('service-carriere'))
                                                <span class="d-block fw-bold">{{$user->userable->nom_etablissement}}</span>
                                            @elseif($user->hasRole('entreprise'))
                                                <span class="d-block fw-bold">{{$user->userable->nom_entreprise}}</span>
                                            @endif
                                            <span class="text-muted">{{$user->email}}</span>
                                        </li>
                                        <hr class="dropdown-divider">
                                        <!-- Menu items -->
                                        <li>
                                            @php
                                                $route = 'admin.dashboard';
                                                if($user->hasRole('etudiant')) {
                                                    $route = 'etudiants.dashboard';
                                                } else if($user->hasRole('entreprise')) {
                                                    $route = 'entreprise.dashboard';
                                                } else if($user->hasRole('service-carriere')) {
                                                    $route = 'universite.dashboard';
                                                }
                                            @endphp
                                            <a href="{{route($route)}}">Dashboard</a>
                                        </li>
                                        <li><a href="#">Profile</a></li>
                                        <hr class="dropdown-divider">
                                        <li>
                                            <form id="dropdown-logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault(); document.getElementById('dropdown-logout-form').submit();">Déconnexion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth
                    </nav>
                    <!-- Main Menu End-->
                </div>

            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="main-box">
                    <div class="logo-box">
                        <div class="sticky-logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg"
                                                                                     alt="" title=""></a></div>
                    </div>
                    <!--Keep This Empty / Menu will come through Javascript-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{route('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a>
            </div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <div class="outer-box">
                    <!-- Login/Register -->
                    <div class="login-box">
                        <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                    </div>
                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                            class="flaticon-menu-1"></span></a>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </header>

    <script>
        @auth
        document.addEventListener("DOMContentLoaded", function () {
            const dropdownToggle = document.getElementById("userDropdown");
            const dropdownMenu = document.getElementById("customDropdownMenu");

            // Toggle the dropdown menu on click
            dropdownToggle.addEventListener("click", function (event) {
                event.preventDefault();
                dropdownMenu.classList.toggle("show");

                // Optionally close dropdown if clicked outside
                document.addEventListener("click", function (event) {
                    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.remove("show");
                    }
                });
            });
        });
        @endauth

    </script>


    <style>

        header {
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

        .main-menu .navigation {
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

        .custom-dropdown {
            position: relative;
        }

        .custom-dropdown-menu {
            position: absolute;
            right: 0;
            display: none;
            background-color: #fff;
            border: 1px solid #ddd;
            list-style: none;
            padding: 0;
            margin: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 200px;
        }

        .custom-dropdown-menu li {
            padding: 8px 16px;
        }

        .custom-dropdown-menu li a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .custom-dropdown-menu li:hover {
            background-color: #f1f1f1;
        }

        .dropdown-divider {
            border-top: 1px solid #939393;
            margin: 0;
        }

        .custom-dropdown-menu.show {
            display: block;
        }


    </style>


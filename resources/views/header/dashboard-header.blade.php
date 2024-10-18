@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $user->load('userable');

    function is_active ($url_pattern): bool {
        return request()->is("$url_pattern*");
    }

@endphp

<div class="page-wrapper dashboard">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header header-shaddow fixed">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo"><a href="{{route ('accueil')}}"><img
                                    src="{{asset('images/NextGen-logo.svg')}}" alt=""
                                    title=""></a></div>
                    </div>

                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li><a href="{{route('accueil')}}"><span>Accueil</span></a></li>
                            @if($user->hasRole('etudiant'))
                                <li class="dropdown">
                                    <span>Étudiant</span>
                                    <ul class="dropdown">
                                        <li><a href="{{route('etudiants.explorer_offre')}}">Explorer les offres</a></li>
                                        <li><a href="{{route('etudiants.explorer_event')}}">Explorer les évenements</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($user->hasRole('entreprise'))
                                <li class="dropdown">
                                    <span>Entreprise</span>
                                    <ul>
                                        <li><a href="{{route('entreprise.gerer-candidat')}}">Gerer les candidat</a></li>
                                        <li><a href="{{route('entreprise.offres.create')}}">Publier une offre</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if($user->hasRole('service-carriere'))
                                <li class=" dropdown">
                                    <span>Service carrière</span>
                                    <ul class="dropdown">
                                        <li><a href="{{route('universite.gerer_event')}}">Mes évenement</a></li>
                                        <li><a href="{{route('universite.gestion_etudiants')}}">Gerer les étudiants</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                <span>NextGen</span>
                                <ul>
                                    <li><a href="blog-list-v1.html">A propos</a></li>
                                    <li><a href="blog-list-v2.html">F.A.Q</a></li>
                                    <li><a href="blog-list-v3.html">Nous contacter</a></li>
                                </ul>
                            </li>
                            <!-- End header -->

                            <!-- Only for Mobile View -->
                            <li class="mm-add-listing">
                                <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
                                <span>
                    <span class="contact-info">
                      <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                      <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                      <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                    </span>
                    <span class="social-links">
                      <a href="#"><span class="fab fa-facebook-f"></span></a>
                      <a href="#"><span class="fab fa-twitter"></span></a>
                      <a href="#"><span class="fab fa-instagram"></span></a>
                      <a href="#"><span class="fab fa-linkedin-in"></span></a>
                    </span>
                  </span>
                            </li>
                        </ul>
                    </nav>
                    <!-- Main Menu End-->
                </div>

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
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="logo"><a href="{{route('accueil')}}"><img src="{{asset('images/logo.svg')}}" alt=""
                                                                      title=""></a></div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">

                    <div class="outer-box">
                        <!-- Login/Register -->
                        <button id="toggle-user-sidebar"><img src="{{asset('images/icons/icon-user-2.svg')}}"
                                                              alt="avatar"
                                                              class="thumb">
                        </button>
                        <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                                class="flaticon-menu-1"></span></a>
                    </div>
                </div>

            </div>

            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <div class="user-sidebar">

        <div class="sidebar-inner">
            <ul class="navigation">

                @if($user->is_accepted_by_admin && $user->email_verified_at)

                    <!-- Etudiant -->
                    @if($user->hasRole('etudiant'))
                        <li class="{{ is_active('etudiants/dashboard') ? 'active' : '' }}">
                            <a href="{{route('etudiants.dashboard')}}"> <i class="la la-home"></i>Tableau de bord</a>
                        </li>
                        <li class="{{ is_active('etudiants/explorer-offre') ? 'active' : '' }}">
                            <a href="{{route('etudiants.explorer_offre')}}"><i class="la la-hashtag"></i>Explorer offres</a>
                        </li>
                        <li class="{{ is_active('etudiants/mes-candidatures') ? 'active' : '' }}">
                            <a href="{{route('etudiants.mes_candidatures')}}"><i class="la la-briefcase"></i>Mes
                                candidatures</a>
                        </li>
                        <li class="{{ is_active('etudiants/explorer-event') ? 'active' : '' }}">
                            <a href="{{route('etudiants.explorer_event')}}"><i
                                    class="lar la-calendar"></i>Evenements</a>
                        </li>
                        <li class="{{ is_active('/portfolio') ? 'active' : '' }}">
                            <a href="{{route('etudiants.portfolio', ['etudiant' => $user->userable->slug])}}"> <i class="la la-user-tie"></i>Mon portfolio</a>
                        </li>
                        <li class="{{ is_active('etudiants/modfier-profile') ? 'active' : '' }}">
                            <a href="{{route('etudiants.edit_profile')}}"> <i class="la la-pen"></i>Modifier profil</a>
                        </li>
                        <li>
                            <a href="{{route('etudiant.demande_affiliation_univ_get')}}"> <i class="la la-university"></i>Mon Université</a>
                        </li>

                        <!--- Entreprise -->
                    @elseif($user->hasRole('entreprise'))
                        <li class="{{ is_active('entreprises/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.dashboard') }}"><i class="la la-home"></i>Tableau de bord</a>
                        </li>
                        <li class="{{ is_active('entreprises/offres') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.offres') }}"><i class="la la-briefcase"></i>Gérer mes
                                offres</a>
                        </li>
                        <li class="{{ is_active('entreprises/gerer-candidat') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.gerer-candidat') }}"><i class="la la-file-invoice"></i>Mes
                                candidats</a>
                        </li>
                        @if($user->hasPermissionTo('page_presentation_entreprise'))
                        <li class="{{ is_active('entreprises/page-entreprise') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.page_entreprise') }}"><i class="la la-stream"></i>Page entreprise</a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('shortlist_vip'))
                        <li class="{{ is_active('entreprises/shortlist-vip') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.shortlist_vip') }}"><i class="la la-award"></i>Shortlist VIP</a>
                        </li>
                        @endif
                        <li class="{{ is_active('entreprises/mon-abonnement') ? 'active' : '' }}">
                            <a href="{{ route('entreprise.mon_abonnement') }}"><i class="la la-tag"></i>Mon abonnement</a>
                        </li>

                        <!--- Université -->
                    @elseif($user->hasRole('service-carriere'))
                        <li class="{{ is_active('service-carriere/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('universite.dashboard') }}"><i class="la la-home"></i>Tableau de bord</a>
                        </li>
                        <li class="{{ is_active('service-carriere/gerer-event') ? 'active' : '' }}">
                            <a href="{{ route('universite.gerer_event') }}"><i class="la la-briefcase"></i>Gérer événements</a>
                        </li>
                        <li class="{{ is_active('service-carriere/gestion-etudiants') ? 'active' : '' }}">
                            <a href="{{ route('universite.gestion_etudiants') }}"><i class="la la-user-graduate"></i>Gerer étudiants</a>
                        </li>

                        <!-- Admin --->
                    @elseif($user->hasRole('admin'))
                        <li class="{{ is_active('admin/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i>Tableau de bord</a>
                        </li>
                        <li class="{{ is_active('admin/entreprises') ? 'active' : '' }}">
                            <a href="{{ route('admin.list_entreprises') }}"><i class="las la-briefcase"></i>Entreprises</a>
                        </li>
                        <li class="{{ is_active('admin/abonnements') ? 'active' : '' }}">
                            <a href="{{ route('admin.subscriptions.index') }}"><i class="las la-tags"></i>Abonnements</a>
                        </li>
                        <li class="{{ is_active('admin/universites') ? 'active' : '' }}">
                            <a href="{{ route('admin.list_universites') }}"><i class="las la-university"></i>Universités</a>
                        </li>
                        <li class="{{ is_active('admin/etudiants') ? 'active' : '' }}">
                            <a href="{{ route('admin.list_etudiants') }}"><i class="las la-user-graduate"></i>Etudiants</a>
                        </li>
                        <li class="{{ is_active('admin/type-abonnements') ? 'active' : '' }}">
                            <a href="{{ route('admin.type_subscriptions') }}"><i class="las la-tag"></i>Type abonnement</a>
                        </li>
                        <li class="{{ is_active('admin/parametrages') ? 'active' : '' }}">
                            <a href="{{ route('admin.parametrages') }}"><i class="las la-cog"></i>Parametrages</a>
                        </li>
                        <li class="{{ is_active('admin/list-avec-categories') ? 'active' : '' }}">
                            <a href="{{ route('admin.list_categories') }}"><i class="las la-list"></i>Liste avec
                                categorie</a>
                        </li>
                    @endif

                @endif
            </ul>
        </div>
    </div>
    <!-- End User Sidebar -->

    <script>
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

    </script>

    <style>

        .fixed {
            position: fixed;
        }

        header {
            background-color: #66022b;
        }

        .nav-outer .navigation > li > a,
        .nav-outer .navigation > li > span {
            padding: 8px 12px;
            font-size: 14px;
            line-height: 1.5;
        }

        .btn-box .theme-btn {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            margin-left: 10px;
        }

        .sticky-header .theme-btn {
            padding: 6px 12px;
        }

        /* Optional: Adjust logo size */
        .logo-box img, .sticky-logo img {
            height: 40px;
        }

        .navigation li.has-dropdown:hover .dropdown {
            display: block;
            visibility: visible;
            opacity: 1;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
        }

        .main-menu .navigation {
            margin-left: 70px;
        }

        .user-sidebar .navigation li a {
            position: relative;
            display: flex;
            align-items: center;
            padding: 10px 10px;
            line-height: 30px;
            font-weight: 400;
            font-size: 15px;
            color: #696969;
            text-align: left;
            border-radius: 8px;
            transition: all 500ms ease;
        }

        @media (max-width: 768px) {
            .nav-outer .navigation > li > a,
            .nav-outer .navigation > li > span {
                font-size: 12px;
                padding: 6px 8px;
            }

            .btn-box .theme-btn {
                font-size: 12px;
                padding: 6px 10px;
                display: inline-block !important;
            }

            .page-wrapper {
                padding-top: 0px;
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

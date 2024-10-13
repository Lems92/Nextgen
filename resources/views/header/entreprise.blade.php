<div class="page-wrapper dashboard">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header header-shaddow">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="{{route ('accueil')}}"><img src="images/NextGen-logo.svg" alt="" title=""></a></div>
            </div>

            <nav class="nav main-menu">
              <ul class="navigation" id="navbar">
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

            <!-- Dashboard Option -->

          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="images/logo.svg" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <button id="toggle-user-sidebar"><div class="la la-user-tie"></div></button>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
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
              <li class="{{ request()->is('dashboard-entreprise') ? 'active' : '' }}">
                  <a href="{{ route('entreprise.dashboard') }}"><i class="la la-home"></i>Tableau de bord</a>
              </li>
              <li class="{{ request()->is('offre') ? 'active' : '' }}">
                  <a href="{{ route('offre') }}"><i class="la la-paper-plane"></i>Publier une offre</a>
              </li>
              <li class="{{ request()->is('gerer-offre') ? 'active' : '' }}">
                  <a href="{{ route('gerer-offre') }}"><i class="la la-briefcase"></i>Gérer mes offres</a>
              </li>
              <li class="{{ request()->is('gerer-candidat') ? 'active' : '' }}">
                  <a href="{{ route('gerer-candidat') }}"><i class="la la-file-invoice"></i>Mes candidats</a>
              </li>
              <li class="{{ request()->is('change-password') ? 'active' : '' }}">
                  <a href="{{ route('accueil') }}"><i class="la la-lock"></i>Mot de passe</a>
              </li>
              <li>
                  <a href="{{ route('deconnexion') }}"><i class="la la-sign-out"></i>Déconnecter</a>
              </li>
          </ul>
      </div>
  </div>

    <!-- End User Sidebar -->

    <style>

      header{
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
      .main-menu .navigation{
        margin-left: 70px;
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


      </style>

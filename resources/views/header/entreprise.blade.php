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
                <li>
                  <span>Accueil</span>
                </li>

                <li class="dropdown">
                  <span>Etudiant</span>
                  <ul>
                      <li><a href="job-list-v1.html">Explorer les offres</a></li>
                      <li><a href="dashboard.html">Explorer les évenements</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <span>Entreprise</span>
                  <ul>
                    <li><a href="dashboard.html">Trouver un candidat</a></li>
                    <li><a href="dashboard.html">Publier une offre</a></li>
                  </ul>
                </li>
                
                <li class="dropdown">
                  <span>Service carrière</span>
                  <ul>
                    <li><a href="dashboard.html">Publier un évenement</a></li>
                    <li><a href="dashboard.html">Publier une offre</a></li>
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
            <button id="toggle-user-sidebar"><img src="images/icons/icon-user-2.svg" alt="avatar" class="thumb"></button>
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
          <li class="active"><a href="#" wire:click="showSection('dashboard')"><i class="la la-home"></i>Tableau de bord</a></li>
          <li><a href="#" wire:click="showSection('company-profile')"><i class="la la-user-tie"></i>Mon entreprise</a></li>
          <li><a href="#" wire:click="showSection('post-job')"><i class="la la-paper-plane"></i>Publier une offre</a></li>
          <li><a href="#" wire:click="showSection('manage-job')"><i class="la la-briefcase"></i>Gérer mes offres</a></li>
          <li><a href="#" wire:click="showSection('applicants')"><i class="la la-file-invoice"></i>Mes candidats</a></li>
          <li><a href="#" wire:click="showSection('change-password')"><i class="la la-lock"></i>Mot de passe</a></li>
          <li><a href="#"></i class="la la-sign-out"></i>déconnecter</a></li>
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
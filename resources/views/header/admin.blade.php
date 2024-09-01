@extends('app')

@section('title', 'Admin Page')

@section('content')

<div class="page-wrapper">
    <div class="preloader"></div>  

    <!-- Preloader -->
    <header class="main-header header-shaddow fixed-header">
        <div class="container-fluid">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/NextGen-logo.svg" alt="" title="">
                            </a>
                        </div>
                    </div>
                </div>
    
                <div class="outer-box">
                    <!-- Dashboard Option -->
                    <div class="dropdown dashboard-option">
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.html"><i class="la la-home"></i>Tableau de bord</a></li>
                            <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Mon entreprise</a></li>
                            <li class="active"><a href="dashboard-post-job.html"><i class="la la-paper-plane"></i>Publier une offre</a></li>
                            <li><a href="dashboard-manage-job.html"><i class="la la-briefcase"></i>Gérer mes offres</a></li>
                            <li><a href="dashboard-applicants.html"><i class="la la-file-invoice"></i>Mes candidats</a></li>
                            <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Mot de passe</a></li>
                            <li><a href="index.html"><i class="la la-sign-out"></i>Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
    
@endsection

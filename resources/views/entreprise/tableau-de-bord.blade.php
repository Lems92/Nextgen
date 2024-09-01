@extends('app')

@section('title', 'NextGen - Inscription')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Superio | Just another HTML Template | Dashboard</title>

    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <style>
        .ui-item-link {
    text-decoration: none;
    color: inherit;
}

    </style>

    <div class="page-wrapper dashboard ">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- Header Span -->
        <span class="header-span"></span>

        <!-- Main Header-->
        <header class="main-header header-shaddow fixed-header">
            <div class="container-fluid">
                <!-- Main box -->
                <div class="main-box">
                    <!--Nav Outer -->
                    <div class="nav-outer">
                        <div class="logo-box">
                            <div class="logo"><a href="index.html"><img src="images/NextGen-logo.svg" alt=""
                                        title=""></a></div>
                        </div>
                    </div>

                    <div class="outer-box">

                        <!-- Dashboard Option -->
                        <div class="dropdown dashboard-option">
                            <ul class="dropdown-menu">
                                <li><a href="dashboard.html"><i class="la la-home"></i>Tableau de bord</a></li>
                                <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Mon
                                        entreprise</a></li>
                                <li class="active"><a href="dashboard-post-job.html"><i
                                            class="la la-paper-plane"></i>Publier une
                                        offre</a></li>
                                <li><a href="dashboard-manage-job.html"><i class="la la-briefcase"></i>Gérer mes
                                        offres</a></li>
                                <li><a href="dashboard-applicants.html"><i class="la la-file-invoice"></i>Mes
                                        candidats</a></li>
                                <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Mot de passe</a>
                                </li>
                                <li><a href="index.html"><i class="la la-sign-out"></i>Se déconnecter</a></li>
                            </ul>
                        </div>
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
                        <div class="login-box">
                            <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                        </div>

                        <button id="toggle-user-sidebar"><img src="images/resource/company-6.png" alt="avatar"
                                class="thumb"></button>
                        <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                                class="flaticon-menu-1"></span></a>
                    </div>
                </div>

            </div>

            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
        </header>
        <!--End Main Header -->

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

        <!-- Dashboard -->
        <section class="user-dashboard">
            <div class="dashboard-outer">
                <div class="upper-title-box">
                    <h3>Howdy, Invision!</h3>
                    <div class="text">Ready to jump back in?</div>
                </div>
                <div class="row">
                    <div class="ui-block col-md-6 col-sm-12">
                        <a href="offre.html" class="ui-item-link">
                            <div class="ui-item">
                                <div class="left">
                                    <i class="icon flaticon-briefcase"></i>
                                </div>
                                <div class="right">
                                    <h4>22</h4>
                                    <p>Posted Jobs</p>
                                </div>
                            </div>
                            </a>
                    </div>
                    <div class="ui-block col-md-6 col-sm-12">
                        <a href="offre.html" class="ui-item-link">
                            <div class="ui-item ui-red">
                                <div class="left">
                                    <i class="icon la la-file-invoice"></i>
                                </div>
                                <div class="right">
                                    <h4>9382</h4>
                                    <p>Application</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- OFFRE GOLD 
                    <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <a href="offre.html" class="ui-item-link">
                            <div class="ui-item ui-green">
                                <div class="left">
                                    <i class="icon la la-bookmark-o"></i>
                                </div>
                                <div class="right">
                                    <h4>32</h4>
                                    <p>Shortlist</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    -->
                </div>
            </div>
        </section>
        <!-- End Dashboard -->

        <section class="user-dashboard">
            <div class="dashboard-outer">
              <div class="upper-title-box">
                <h3>Manage Jobs</h3>
                <div class="text">Ready to jump back in?</div>
              </div>
      
              <div class="row">
                <div class="col-lg-12">
                  <!-- Ls widget -->
                  <div class="ls-widget">
                    <div class="tabs-box">
                      <div class="widget-title">
                        <h4>My Job Listings</h4>
      
                        <div class="chosen-outer">
                          <!--Tabs Box-->
                          <select class="chosen-select">
                            <option>Last 6 Months</option>
                            <option>Last 12 Months</option>
                            <option>Last 16 Months</option>
                            <option>Last 24 Months</option>
                            <option>Last 5 year</option>
                          </select>
                        </div>
                      </div>
      
                      <div class="widget-content">
                        <div class="table-outer">
                          <table class="default-table manage-job-table">
                            <thead>
                              <tr>
                                <th>Title</th>
                                <th>Applications</th>
                                <th>Created & Expired</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
      
                            <tbody>
                              <tr>
                                <td>
                                  <h6>Senior Full Stack Engineer, Creator Success</h6>
                                  <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                                </td>
                                <td class="applied"><a href="#">3+ Applied</a></td>
                                <td>October 27, 2017 <br>April 25, 2011</td>
                                <td class="status">Active</td>
                                <td>
                                  <div class="option-box">
                                    <ul class="option-list">
                                      <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                      <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                      <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h6>Senior Product Designer</h6>
                                  <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                                </td>
                                <td class="applied"><a href="#">3+ Applied</a></td>
                                <td>October 27, 2017 <br>April 25, 2011</td>
                                <td class="status">Active</td>
                                <td>
                                  <div class="option-box">
                                    <ul class="option-list">
                                      <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                      <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                      <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h6>Sr. Full Stack Engineer</h6>
                                  <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                                </td>
                                <td class="applied"><a href="#">3+ Applied</a></td>
                                <td>October 27, 2017 <br>April 25, 2011</td>
                                <td class="status">Active</td>
                                <td>
                                  <div class="option-box">
                                    <ul class="option-list">
                                      <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                      <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                      <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h6>Product Manager, Studio</h6>
                                  <span class="info"><i class="icon flaticon-map-locator"></i> London, UK</span>
                                </td>
                                <td class="applied"><a href="#">3+ Applied</a></td>
                                <td>October 27, 2017 <br>April 25, 2011</td>
                                <td class="status">Active</td>
                                <td>
                                  <div class="option-box">
                                    <ul class="option-list">
                                      <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                      <li><button data-text="Reject Aplication"><span class="la la-pencil"></span></button></li>
                                      <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
      
              </div>
            </div>
          </section>
        <section class="user-dashboard">
            <div class="dashboard-outer">
              <div class="upper-title-box">
                <h3>All Aplicants</h3>
                <div class="text">Ready to jump back in?</div>
              </div>
      
              <div class="row">
                <div class="col-lg-12">
                  <!-- Ls widget -->
                  <div class="ls-widget">
                    <div class="tabs-box">
                      <div class="widget-title">
                        <h4>Applicant</h4>
                      <div class="widget-content">
      
                        <div class="tabs-box">
                          <div class="aplicants-upper-bar">
                            <h6>Senior Product Designer</h6>
                            <ul class="aplicantion-status tab-buttons clearfix">
                              <li class="tab-btn active-btn totals" data-tab="#totals">Total(s): 6</li>
                              <li class="tab-btn approved" data-tab="#approved">Approved: 2</li>
                              <li class="tab-btn rejected" data-tab="#rejected">Rejected(s): 4</li>
                            </ul>
                          </div>
      
                          <div class="tabs-content">
                            <!--Tab-->
                            <div class="tab active-tab" id="totals">
                              <div class="row">
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-1.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-2.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Wade Warren</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-3.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Leslie Alexander</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-1.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-2.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Wade Warren</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-3.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Leslie Alexander</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
      
                            <!--Tab-->
                            <div class="tab" id="approved">
                              <div class="row">
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-1.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-2.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Wade Warren</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                              </div>
                            </div>
      
                            <!--Tab-->
                            <div class="tab" id="rejected">
                              <div class="row">
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-3.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Leslie Alexander</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-1.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-2.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Wade Warren</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
      
                                <!-- Candidate block three -->
                                <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                  <div class="inner-box">
                                    <div class="content">
                                      <figure class="image"><img src="images/resource/candidate-3.png" alt=""></figure>
                                      <h4 class="name"><a href="#">Leslie Alexander</a></h4>
                                      <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                      </ul>
                                      <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                      </ul>
                                    </div>
                                    <div class="option-box">
                                      <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                        <li><button data-text="Approve Aplication"><span class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                      </ul>
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
            </div>
          </section>

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© 2021 Superio. All Right Reserved.</p>
        </div>

    </div><!-- End Page Wrapper -->


    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/chosen.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery.modal.min.js"></script>
    <script src="js/mmenu.polyfills.js"></script>
    <script src="js/mmenu.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/rellax.min.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>

    <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
    <script src="js/chart.min.js"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = "Sofia Pro";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');

        var chart = new Chart(ctx, {

            type: 'line',
            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June"],
                // Information about the dataset
                datasets: [{
                    label: "Views",
                    backgroundColor: 'transparent',
                    borderColor: '#1967D2',
                    borderWidth: "1",
                    data: [196, 132, 215, 362, 210, 252],
                    pointRadius: 3,
                    pointHoverRadius: 3,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#1967D2",
                    pointHoverBackgroundColor: "#1967D2",
                    pointBorderWidth: "2",
                }]
            },

            // Configuration options
            options: {

                layout: {
                    padding: 10,
                },

                legend: {
                    display: false
                },
                title: {
                    display: false
                },

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        },
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            },
        });
    </script>

</body>

</html>
@endsection
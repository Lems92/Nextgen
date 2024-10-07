@extends('app')

@section('title', 'NextGen - Inscription')

@section('content')

@include('header.univ')

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
                                    <p>Evenements</p>
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
                                    <p>Etudiants</p>
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
                <h3>Gerer les évenements</h3>
                <div class="text">Prêt pour organiser des évenements ?</div>
              </div>
          
              <div class="row">
                <div class="col-lg-12">
                  <!-- Ls widget -->
                  <div class="ls-widget">
                    <div class="tabs-box">
                      <div class="widget-title">
                        <h4>Mes Evenements</h4>
          
                        <div class="chosen-outer">
                          <!--Tabs Box-->
                          <select class="chosen-select">
                            <option>Last 6 Months</option>
                            <option>Last 12 Months</option>
                            <option>Last 16 Months</option>
                            <option>Last 24 Months</option>
                            <option>Last 5 years</option>
                          </select>
                        </div>
                      </div>
          
                      <div class="widget-content">
                        <div class="table-outer">
                          <table class="default-table manage-event-table">
                            <thead>
                              <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
          
                            <tbody>
                              <tr>
                                <td><h6>Annual Tech Conference</h6></td>
                                <td>October 27, 2024</td>
                                <td>09:00 AM - 05:00 PM</td>
                                <td>A full-day conference focusing on the latest trends in technology.</td>
                                <td>
                                  <div class="option-box">
                                    <ul class="option-list">
                                      <li><button data-text="View Event"><span class="la la-eye"></span></button></li>
                                      <li><button data-text="Edit Event"><span class="la la-pencil"></span></button></li>
                                      <li><button data-text="Delete Event"><span class="la la-trash"></span></button></li>
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
                <h3>Tous les étudiants</h3>
                <div class="text">Prêts ?</div>
              </div>
      
              <div class="row">
                <div class="col-lg-12">
                  <!-- Ls widget -->
                  <div class="ls-widget">
                    <div class="tabs-box">
                      <div class="widget-title">
                        <h4>Etudiants</h4>
                      <div class="widget-content">
      
                        <div class="tabs-box">
                          <div class="aplicants-upper-bar">
                            <h6>Etudiants</h6>
                            <ul class="aplicantion-status tab-buttons clearfix">
                              <li class="tab-btn active-btn totals" data-tab="#totals">Total(s): 6</li>
                              <li class="tab-btn approved" data-tab="#approved">Apprové(s): 2</li>
                              <li class="tab-btn rejected" data-tab="#rejected">Rejeté(s): 4</li>
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

    </div><!-- End Page Wrapper -->


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

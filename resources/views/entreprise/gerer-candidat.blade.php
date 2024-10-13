@extends('app')

@section('title', 'NextGen - Inscription')

@section('content')

@include('header.entreprise')

        <section class="user-dashboard">
            <div class="dashboard-outer">
              <div class="upper-title-box">
                <h3>Candidats</h3>
              </div>
      
                <div class="col-lg-12">
                  <!-- Ls widget -->
                  <div class="ls-widget">
                    <div class="tabs-box">
                      <div class="widget-title">
                        <h4>Candidats</h4>
                      <div class="widget-content">
      
                        <div class="tabs-box">
                          <div class="aplicants-upper-bar">
                            <h6>Senior Product Designer</h6>
                            <ul class="aplicantion-status tab-buttons clearfix">
                              <li class="tab-btn active-btn totals" data-tab="#totals">Total(s): 6</li>
                              <li class="tab-btn approved" data-tab="#approved">Apprové(s): 2</li>
                              <li class="tab-btn rejected" data-tab="#rejected">Rejecté(s): 4</li>
                            </ul>
                          </div>
      
                          <div class="candidate-block-three">
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
                                  <li><a href="{{route('voir-candidat')}}"><button data-text="Voir Candidat"><span class="la la-eye"></span></button></a></li>
                                  <li><button data-text="Approver"><span class="la la-check"></span></button></li>
                                  <li><button data-text="Rejeter"><span class="la la-times-circle"></span></button></li>
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

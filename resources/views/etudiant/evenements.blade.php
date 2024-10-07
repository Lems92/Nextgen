
<<<<<<< HEAD
=======
@extends('app')

@section('title', 'Dashboard')

@section('content')

@include('header.etudiant')

<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>

            <!-- Content Column -->
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result">
                            <div class="text">Showing <strong>1-3</strong> of <strong>3</strong> events</div>
                        </div>
                    </div>

                    <!-- Event Block -->
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                                <h4><a href="#">Event Title 1</a></h4>
                                <ul class="job-info">
                                    <li><span class="icon flaticon-calendar"></span> Start Date: 2024-09-15</li>
                                    <li><span class="icon flaticon-calendar"></span> End Date: 2024-09-16</li>
                                    <li><span class="icon flaticon-clock-3"></span> Start Time: 10:00 AM</li>
                                    <li><span class="icon flaticon-clock-3"></span> End Time: 4:00 PM</li>
                                </ul>
                                <p>Description of the event goes here. This is a brief summary of what the event will cover.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Event Block -->
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                                <h4><a href="#">Event Title 2</a></h4>
                                <ul class="job-info">
                                    <li><span class="icon flaticon-calendar"></span> Start Date: 2024-09-20</li>
                                    <li><span class="icon flaticon-calendar"></span> End Date: 2024-09-21</li>
                                    <li><span class="icon flaticon-clock-3"></span> Start Time: 9:00 AM</li>
                                    <li><span class="icon flaticon-clock-3"></span> End Time: 3:00 PM</li>
                                </ul>
                                <p>Description of the event goes here. This is a brief summary of what the event will cover.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Event Block -->
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                                <h4><a href="#">Event Title 3</a></h4>
                                <ul class="job-info">
                                    <li><span class="icon flaticon-calendar"></span> Start Date: 2024-09-25</li>
                                    <li><span class="icon flaticon-calendar"></span> End Date: 2024-09-26</li>
                                    <li><span class="icon flaticon-clock-3"></span> Start Time: 11:00 AM</li>
                                    <li><span class="icon flaticon-clock-3"></span> End Time: 5:00 PM</li>
                                </ul>
                                <p>Description of the event goes here. This is a brief summary of what the event will cover.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Show More -->
                    <div class="ls-show-more">
                        <p>Showing 3 of 3 Events</p>
                        <div class="bar"><span class="bar-inner" style="width: 100%"></span></div>
                    </div>
                </div>
            </div>
    </div>
</section>

  
  

  <script src="js/jquery.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/chosen.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
<style>
    .ls-section {
    position: relative;
    padding: 50px 50px 100px;
}
</style>
@endsection
>>>>>>> 40fc94a (Initial commit)

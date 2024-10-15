@extends('dashboard-layout')

@section('title', 'NextGen - Inscription')

@section('content')

@include('header.dashboard-header')

<section class="job-detail-section">
    <!-- Upper Box -->
    <div class="upper-box">
      <div class="auto-container">
        <!-- Job Block -->
        <div class="job-block-seven style-three">
          <div class="inner-box">
            <div class="content">
              <span class="company-logo"><img src="images/resource/company-logo/5-1.png" alt=""></span>
              <h4>Invision</h4>
              <ul class="job-other-info">
                <li class="time">Offres disponible  – 3</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="job-detail-outer">
      <div class="auto-container">
        <div class="row">
          <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
            <div class="job-detail">
              <h4>Apropos de l'entreprise</h4>
              <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial services company. It is the holding company for Moody’s Investors Service (MIS), an American credit rating agency, and Moody’s Analytics (MA), an American provider of financial analysis software and services.</p>
              <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to stocks and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In 2000, Dun & Bradstreet spun off Moody’s Corporation as a separate company that was listed on the NYSE under MCO. In 2007, Moody’s Corporation was split into two operating divisions, Moody’s Investors Service, the rating agency, and Moody’s Analytics, with all of its other products.</p>
              <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial services company. It is the holding company for Moody’s Investors Service (MIS), an American credit rating agency, and Moody’s Analytics (MA), an American provider of financial analysis software and services.</p>
              <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to stocks and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In 2000, Dun & Bradstreet spun off Moody’s Corporation as a separate company that was listed on the NYSE under MCO. In 2007, Moody’s Corporation was split into two operating divisions, Moody’s Investors Service, the rating agency, and Moody’s Analytics, with all of its other products.</p>
            </div>

            <!-- Related Jobs -->
            <div class="related-jobs">
              <div class="title-box">
                <h3>3 postes sur l'entreprise</h3>
              </div>

              <!-- Job Block -->
              <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-3.png" alt=""></span>
                    <h4><a href="#">Senior Full Stack Engineer, Creator Success</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Full Time</li>
                      <li class="required">Urgent</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-3.png" alt=""></span>
                    <h4><a href="#">Web Developer</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Part Time</li>
                      <li class="required">Urgent</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div>

              <!-- Job Block -->
              <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-3.png" alt=""></span>
                    <h4><a href="#">Sr. Full Stack Engineer</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Part Time</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
            <aside class="sidebar pd-right">

              <div class="sidebar-widget company-widget">
                <div class="widget-content">
                  <ul class="company-info mt-0">
                    <li>Secteur: <span>Software</span></li>
                    <li>Taille de l'entreprise : <span>501-1,000</span></li>
                    <li>Crée en: <span>2011</span></li>
                    <li>Tel.: <span>123 456 7890</span></li>
                    <li>Email: <span>info@joio.com</span></li>
                    <li>Emplacement: <span>London, UK</span></li>
                  </ul>

                  <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
                </div>
              </div>

              <div class="sidebar-widget contact-widget">
                <h4 class="widget-title">Nous-contacter</h4>
                <div class="widget-content">
                  <!-- Comment Form -->
                  <div class="default-form">
                    <!--Comment Form-->
                    <form>
                      <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <input type="text" name="username" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <textarea class="darma" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <button class="theme-btn btn-style-one" type="submit" name="submit-form">Envoyer un message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </aside>
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

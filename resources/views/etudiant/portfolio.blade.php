@extends('dashboard-layout')

@section('title', 'Dashboard')

@section('content')

@include('header.dashboard-header')
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-box">
        <div class="auto-container">
          <!-- Candidate block Six -->
          <div class="candidate-block-six">
            <div class="inner-box">
              <figure class="image"><img src="images/resource/candidate-4.png" alt=""></figure>
              <h4 class="name"><a href="#">Darlene Robertson</a></h4>
              <span class="designation">UI Designer at Invision</span>
              <div class="content">
                <ul class="post-tags">
                  <li><a href="#">App</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Digital</a></li>
                </ul>

                <ul class="candidate-info">
                  <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="candidate-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
              <div class="job-detail">
                <h4>Candidates About</h4>

                <p>Hello my name is Nicole Wells and web developer from Portland. In pharetra orci dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.</p>
                <p>Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>

                <!-- Resume / Education -->
                <div class="resume-outer">
                  <div class="upper-title">
                    <h4>Education</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name">M</span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Bachlors in Fine Arts</h3>
                          <span>Modern College</span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2012 - 2014</span>
                          <div class="edit-btns">
                            <button><span class="la la-pencil"></span></button>
                            <button><span class="la la-trash"></span></button>
                          </div>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>

                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name">H</span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Computer Science</h3>
                          <span>Harvard University</span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2008 - 2012</span>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>
                </div>

                <!-- Resume / Work & Experience -->
                <div class="resume-outer theme-blue">
                  <div class="upper-title">
                    <h4>Work & Experience</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name">S</span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Product Designer</h3>
                          <span>Spotify Inc.</span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2008 - 2012</span>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>

                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name">D</span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Sr UX Engineer</h3>
                          <span>Dropbox Inc.</span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2012 - 2014</span>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>
                </div>

                <!-- Portfolio -->
                <div class="portfolio-outer">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-1.jpg" class="lightbox-image"><img src="images/resource/portfolio-1.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-2.jpg" class="lightbox-image"><img src="images/resource/portfolio-2.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-3.jpg" class="lightbox-image"><img src="images/resource/portfolio-3.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-4.jpg" class="lightbox-image"><img src="images/resource/portfolio-4.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                  </div>
                </div>

                <!-- Resume / Awards -->
                <div class="resume-outer theme-yellow">
                  <div class="upper-title">
                    <h4>Awards</h4>
                  </div>
                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name"></span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Perfect Attendance Programs</h3>
                          <span></span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2012 - 2014</span>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>


                  <!-- Resume BLock -->
                  <div class="resume-block">
                    <div class="inner">
                      <span class="name"></span>
                      <div class="title-box">
                        <div class="info-box">
                          <h3>Top Performer Recognition</h3>
                          <span></span>
                        </div>
                        <div class="edit-box">
                          <span class="year">2012 - 2014</span>
                        </div>
                      </div>
                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                    </div>
                  </div>
                </div>

                <!-- Video Box -->
                <div class="video-outer">
                  <h4>Candidates About</h4>
                  <div class="video-box">
                    <figure class="image">
                      <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption="">
                        <img src="images/resource/video-img.jpg" alt="">
                        <i class="icon flaticon-play-button-3" aria-hidden="true"></i>
                      </a>
                    </figure>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
                        <i class="icon icon-calendar"></i>
                        <h5>Experience:</h5>
                        <span>0-2 Years</span>
                      </li>

                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Age:</h5>
                        <span>28-33 Years</span>
                      </li>

                      <li>
                        <i class="icon icon-rate"></i>
                        <h5>Current Salary:</h5>
                        <span>11K - 15K</span>
                      </li>

                      <li>
                        <i class="icon icon-salary"></i>
                        <h5>Expected Salary:</h5>
                        <span>26K - 30K</span>
                      </li>

                      <li>
                        <i class="icon icon-user-2"></i>
                        <h5>Gender:</h5>
                        <span>Female</span>
                      </li>

                      <li>
                        <i class="icon icon-language"></i>
                        <h5>Language:</h5>
                        <span>English, German, Spanish</span>
                      </li>

                      <li>
                        <i class="icon icon-degree"></i>
                        <h5>Education Level:</h5>
                        <span>Master Degree</span>
                      </li>

                    </ul>
                  </div>

                </div>

                <div class="sidebar-widget social-media-widget">
                  <h4 class="widget-title">Social media</h4>
                  <div class="widget-content">
                    <div class="social-links">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>


                <div class="sidebar-widget">
                  <!-- Job Skills -->
                  <h4 class="widget-title">Professional Skills</h4>
                  <div class="widget-content">
                    <ul class="job-skills">
                      <li><a href="#">app</a></li>
                      <li><a href="#">administrative</a></li>
                      <li><a href="#">android</a></li>
                      <li><a href="#">wordpress</a></li>
                      <li><a href="#">design</a></li>
                      <li><a href="#">react</a></li>
                    </ul>
                  </div>
                </div>

                <div class="sidebar-widget contact-widget">
                  <h4 class="widget-title">Contact Us</h4>
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
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>
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
      </div>
    </section>
    <!-- End Dashboard -->

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
@endsection

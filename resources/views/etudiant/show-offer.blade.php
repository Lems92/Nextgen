@extends('dashboard-layout')

@section('title', 'NextGen - Voir offre')

@section('content')

    @include('header.dashboard-header')

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
          <div class="auto-container">
            <!-- Job Block -->
            <div class="job-block-seven">
              <div class="inner-box">
                <div class="content">
                  <span class="company-logo"><img src="images/resource/company-logo/5-1.png" alt=""></span>
                  <h4><a href="#">Product Designer / UI Designer</a></h4>
                  <ul class="job-info">
                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                  </ul>
                  <ul class="job-other-info">
                    <li class="time">Full Time</li>
                    <li class="privacy">Private</li>
                    <li class="required">Urgent</li>
                  </ul>
                </div>
  
                <div class="btn-box">
                  <a href="#" class="theme-btn btn-style-one">Postuler</a>
                  <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="job-detail-outer">
          <div class="auto-container">
            <div class="row">
              <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="job-detail">
                  <h4>Description</h4>
                  <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                  <h4>Skill & Experience</h4>
                  <ul class="list-style-three">
                    <li>You have at least 3 years’ experience working as a Product Designer.</li>
                    <li>You have experience using Sketch and InVision or Framer X</li>
                    <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                    <li>You are familiar using Jira and Confluence in your workflow</li>
                  </ul>
                </div>
  
                <!-- Related Jobs -->
              </div>
  
              <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                  <div class="sidebar-widget">
                    <!-- Job Overview -->
                    <h4 class="widget-title">Job Overview</h4>
                    <div class="widget-content">
                      <ul class="job-overview">
                        <li>
                          <i class="icon icon-calendar"></i>
                          <h5>Date Posted:</h5>
                          <span>Posted 1 hours ago</span>
                        </li>
                        <li>
                          <i class="icon icon-expiry"></i>
                          <h5>Expiration date:</h5>
                          <span>April 06, 2021</span>
                        </li>
                        <li>
                          <i class="icon icon-location"></i>
                          <h5>Location:</h5>
                          <span>London, UK</span>
                        </li>
                        <li>
                          <i class="icon icon-user-2"></i>
                          <h5>Job Title:</h5>
                          <span>Designer</span>
                        </li>
                        <li>
                          <i class="icon icon-clock"></i>
                          <h5>Hours:</h5>
                          <span>50h / week</span>
                        </li>
                        <li>
                          <i class="icon icon-rate"></i>
                          <h5>Rate:</h5>
                          <span>$15 - $25 / hour</span>
                        </li>
                        <li>
                          <i class="icon icon-salary"></i>
                          <h5>Salary:</h5>
                          <span>$35k - $45k</span>
                        </li>
                      </ul>
                    </div>
  
  
                    <!-- Job Skills -->
                    <h4 class="widget-title">Job Skills</h4>
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
  
                  <div class="sidebar-widget company-widget">
                    <div class="widget-content">
                      <div class="company-title">
                        <div class="company-logo"><img src="images/resource/company-7.png" alt=""></div>
                        <h5 class="company-name">InVision</h5>
                        <a href="#" class="profile-link">View company profile</a>
                      </div>
  
                      <ul class="company-info">
                        <li>Primary industry: <span>Software</span></li>
                        <li>Company size: <span>501-1,000</span></li>
                        <li>Founded in: <span>2011</span></li>
                        <li>Phone: <span>123 456 7890</span></li>
                        <li>Email: <span>info@joio.com</span></li>
                        <li>Location: <span>London, UK</span></li>
                        <li>Social media:
                          <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                          </div>
                        </li>
                      </ul>
  
                      <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
          </div>
        </div>
      </section>

<style>
    .job-block-seven {
    position: relative;
    padding-left: 50px;
}
</style>

@endsection

@extends('dashboard-layout')

@section('title', 'NextGen - Shortlist')

@section('content')

@include('header.dashboard-header')

        <section class="user-dashboard">
            <div class="dashboard-outer">
              <div class="upper-title-box">
                <h3>All Aplicants</h3>
                <div class="text">Ready to jump back in?</div>
              </div>

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
                                    <div class="btn-box">
                                      <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                      <a href="#" class="theme-btn btn-style-three"><span class="btn-title">View Profile</span></a>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                                <!-- Candidate block three -->
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

</body>

</html>
@endsection

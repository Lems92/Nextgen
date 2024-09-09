@extends('app')

@section('title', 'Dashboard')

@section('content')

@include('header.etudiant')

        <section class="ls-section">
            <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">

                <!-- Filters Column -->
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="filters-outer">
                    <button type="button" class="theme-btn close-filters">X</button>

                    <!-- Filter Block -->
                    <div class="filter-block">
                        <h4>Search by Keywords</h4>
                        <div class="form-group">
                        <input type="text" name="listing-search" placeholder="Job title, keywords, or company">
                        <span class="icon flaticon-search-3"></span>
                        </div>
                    </div>

                    <!-- Filter Block -->
                    <div class="filter-block">
                        <h4>Location</h4>
                        <div class="form-group">
                        <input type="text" name="listing-search" placeholder="City or postcode">
                        <span class="icon flaticon-map-locator"></span>
                        </div>
                        <p>Radius around selected destination</p>
                        <div class="range-slider-one">
                        <div class="area-range-slider"></div>
                        <div class="input-outer">
                            <div class="amount-outer"><span class="area-amount"></span>km</div>
                        </div>
                        </div>
                    </div>

                    <!-- Filter Block -->
                    <div class="filter-block">
                        <h4>Category</h4>
                        <div class="form-group">
                        <select class="chosen-select">
                            <option>Choose a category</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Industrial</option>
                            <option>Apartments</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Industrial</option>
                            <option>Apartments</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Industrial</option>
                            <option>Apartments</option>
                        </select>
                        <span class="icon flaticon-briefcase"></span>
                        </div>
                    </div>

                    <!-- Switchbox Outer -->
                    <div class="switchbox-outer">
                        <h4>Job type</h4>
                        <ul class="switchbox">
                        <li>
                            <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                            <span class="title">Freelance</span>
                            </label>
                        </li>
                        <li>
                            <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            <span class="title">Full Time</span>
                            </label>
                        </li>
                        <li>
                            <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            <span class="title">Internship</span>
                            </label>
                        </li>
                        <li>
                            <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            <span class="title">Part Time</span>
                            </label>
                        </li>
                        <li>
                            <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            <span class="title">Temporary</span>
                            </label>
                        </li>
                        </ul>
                    </div>

                    <!-- Checkboxes Ouer -->
                    <div class="checkbox-outer">
                        <h4>Date Posted</h4>
                        <ul class="checkboxes">
                        <li>
                            <input id="check-f" type="checkbox" name="check">
                            <label for="check-f">All</label>
                        </li>
                        <li>
                            <input id="check-a" type="checkbox" name="check">
                            <label for="check-a">Last Hour</label>
                        </li>
                        <li>
                            <input id="check-b" type="checkbox" name="check">
                            <label for="check-b">Last 24 Hours</label>
                        </li>
                        <li>
                            <input id="check-c" type="checkbox" name="check">
                            <label for="check-c">Last 7 Days</label>
                        </li>
                        <li>
                            <input id="check-d" type="checkbox" name="check">
                            <label for="check-d">Last 14 Days</label>
                        </li>
                        <li>
                            <input id="check-e" type="checkbox" name="check">
                            <label for="check-e">Last 30 Days</label>
                        </li>
                        </ul>
                    </div>

                    <!-- Checkboxes Ouer -->
                    <div class="checkbox-outer">
                        <h4>Experience Level</h4>
                        <ul class="checkboxes square">
                        <li>
                            <input id="check-ba" type="checkbox" name="check">
                            <label for="check-ba">All</label>
                        </li>
                        <li>
                            <input id="check-bb" type="checkbox" name="check">
                            <label for="check-bb">Internship</label>
                        </li>
                        <li>
                            <input id="check-bc" type="checkbox" name="check">
                            <label for="check-bc">Entry level</label>
                        </li>
                        <li>
                            <input id="check-bd" type="checkbox" name="check">
                            <label for="check-bd">Associate</label>
                        </li>
                        <li>
                            <input id="check-be" type="checkbox" name="check">
                            <label for="check-be">Mid-Senior level4</label>
                        </li>
                        <li>
                            <button class="view-more"><span class="icon flaticon-plus"></span> View More</button>
                        </li>
                        </ul>
                    </div>

                    <!-- Filter Block -->
                    <div class="filter-block">
                        <h4>Salary</h4>

                        <div class="range-slider-one salary-range">
                        <div class="salary-range-slider"></div>
                        <div class="input-outer">
                            <div class="amount-outer">
                            <span class="amount salary-amount">
                                $<span class="min">0</span>
                                $<span class="max">0</span>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Filter Block -->
                    <div class="filter-block">
                        <h4>Tags</h4>
                        <ul class="tags-style-one">
                        <li><a href="#">app</a></li>
                        <li><a href="#">administrative</a></li>
                        <li><a href="#">android</a></li>
                        <li><a href="#">wordpress</a></li>
                        <li><a href="#">design</a></li>
                        <li><a href="#">react</a></li>
                        </ul>
                    </div>
                    </div>

                    <!-- Call To Action -->
                    <div class="call-to-action-four">
                    <h5>Recruiting?</h5>
                    <p>Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.</p>
                    <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start Recruiting Now</span></a>
                    <div class="image" style="background-image: url(images/resource/ads-bg-4.png);"></div>
                    </div>
                    <!-- End Call To Action -->
                </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                    <div class="showing-result">
                        <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> jobs</div>
                    </div>
                    <div class="sort-by">
                        <select class="chosen-select">
                        <option>New Jobs</option>
                        <option>Freelance</option>
                        <option>Full Time</option>
                        <option>Internship</option>
                        <option>Part Time</option>
                        <option>Temporary</option>
                        </select>

                        <select class="chosen-select">
                        <option>Show 10</option>
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                        <option>Show 50</option>
                        <option>Show 60</option>
                        </select>
                    </div>
                    </div>


                    <!-- Job Block -->
                    @foreach($offers as $offre)
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                                <span class="company-logo">
                                    <img src="{{ asset('images/resource/company-logo/' . $offre->logo) }}" alt="">
                                </span>
                                <h4><a href="{{ route('offers.show', ['id' => $offre->id]) }}">{{ $offre->titre_poste }}</a></h4>
                                <ul class="job-info">
                                    <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}</li>
                                    <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}</li>
                                    <li><span class="icon flaticon-clock-3"></span> Posté le {{ $offre->date_debut->format('d M Y') }}</li>
                                    <li><span class="icon flaticon-money"></span> <!-- Salaire si disponible --></li>
                                </ul>
                                <ul class="job-other-info">
                                    <li class="time">{{ $offre->duree_contrat }}</li>
                                    <li class="privacy">Disponible</li>
                                    <li class="required">Urgent</li>
                                </ul>
                                <form id="application-form-{{ $offre->id }}" action="{{ route('offers.apply', ['id' => $offre->id]) }}" method="POST">
                                    @csrf
                                    <button type="button" class="theme-btn btn-style-one" onclick="confirmApply({{ $offre->id }})">Postuler</button>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                @endforeach

                    


                    <!-- Listing Show More -->
                    <div class="ls-show-more">
                    <p>Showing 36 of 497 Jobs</p>
                    <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                    <button class="show-more">Show More</button>
                    </div>
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
    function confirmApply(offreId) {
    if (confirm("Êtes-vous sûr de vouloir postuler pour ce poste ?")) {
        // Soumet le formulaire si l'utilisateur confirme
        document.getElementById('application-form-' + offreId).submit();
    }
}
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
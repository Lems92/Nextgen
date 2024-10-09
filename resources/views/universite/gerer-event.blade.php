@extends('dashboard-layout')

@section('title', 'NextGen - Inscription')

@section('content')

@include('header.dashboard-header')

        <!-- Dashboard -->
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
        <!-- Copyright -->
        <div class="copyright-text">
            <p>© 2021 Superio. All Right Reserved.</p>
        </div>

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

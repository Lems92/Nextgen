@extends('app')

@section('title', 'NextGen - Inscription')

@section('content')

@include('header.entreprise')


<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Manage Jobs</h3>
            <div class="text">Ready to jump back in?</div>
        </div>

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
                                                        <li><button data-text="Modifier"><span class="la la-pencil"></span></button></li>
                                                        <li><button data-text="Supprimer"><span class="la la-trash"></span></button></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Additional rows -->
                                    </tbody>
                                </table>
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
    <style>
        /* Ensure the entire section fills the screen */
.user-dashboard {
    min-height: 100vh; /* Ensure the section fills the screen height */
    display: flex;
    flex-direction: column;
}

.dashboard-outer {
    flex: 1; /* Allow the dashboard to take up remaining space */
    display: flex;
    flex-direction: column;
}

.row {
    flex: 1;
}

.ls-widget {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.tabs-box {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.widget-content {
    flex: 1;
    overflow: auto; /* Ensure content is scrollable if it overflows */
}

.table-outer {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.default-table {
    flex: 1;
    width: 100%;
    table-layout: fixed;
    margin-bottom: 0;
}

.default-table th, 
.default-table td {
    padding: 10px;
    text-align: left;
    vertical-align: middle;
    border-top: 1px solid #ddd;
    word-wrap: break-word; /* Prevent content from overflowing cells */
}

    </style>

</body>

</html>
@endsection
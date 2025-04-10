@extends('dashboard-layout')

@section('title', 'Dashboard')

@section('content')

@include('header.dashboard-header')
<section class="user-dashboard">
  <div class="dashboard-outer">
    <div class="upper-title-box">
      <h3>Change Password</h3>
      <div class="text">Ready to jump back in?</div>
    </div>

    <!-- Ls widget -->
    <div class="ls-widget">
      <div class="widget-title">
        <h4>Change Password</h4>
      </div>

      <div class="widget-content">
        <form class="default-form">
          <div class="row">
            <!-- Input -->
            <div class="form-group col-lg-7 col-md-12">
              <label>Old Password </label>
              <input type="password" name="name" placeholder="">
            </div>

            <!-- Input -->
            <div class="form-group col-lg-7 col-md-12">
              <label>New Password</label>
              <input type="password" name="name" placeholder="">
            </div>

            <!-- Input -->
            <div class="form-group col-lg-7 col-md-12">
              <label>Confirm Password</label>
              <input type="password" name="name" placeholder="">
            </div>

            <!-- Input -->
            <div class="form-group col-lg-6 col-md-12">
              <button class="theme-btn btn-style-one">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
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

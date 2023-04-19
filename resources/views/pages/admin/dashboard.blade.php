@extends('layouts.app',['class' => 'g-sidenav-show bg-yellow-200'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="row mt-4 mx-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Dashboard</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2 mx-4 mt-3 ">
        <!-- Dashboard for admin -->
        <div class="row" id="admin-dashboard">
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Teachers</h5>
                <p class="card-text display-4">{{$teacher_count}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Candidates</h5>
                <p class="card-text display-4">{{$candidat_count}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Tests</h5>
                <p class="card-text display-4">{{$test_count}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Results</h5>
                <p class="card-text display-4">{{$result_count}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="./assets/js/plugins/chartjs.min.js"></script>
      <script>
        // Function to get last 10 days
        function get_last_10_days() {
          const days = [];
          const date = new Date();
          for (let i = 0; i < 10; i++) {
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            days.push(`${day}-${month}`);
            date.setDate(date.getDate() - 1);
          }
          return days.reverse();
        }
      </script>
      <div class="container">
        <div class="row" id="charts-row">
          <!-- Column for line chart -->
          <div class="col-6">
            <!-- Chart for teachers -->
            <div class="row" id="teacher-chart">
              <div class="col-12">
                <canvas id="test-bar-chart"></canvas>
                <script>
                  // Get the context of the canvas element
        var ctx = document.getElementById("test-bar-chart").getContext("2d");

        const recent_tests = Object.values( @json($recent_data['tests']));
        console.log(recent_tests);
        // Create the line chart data
        var data = {
          labels: get_last_10_days(),
          datasets: [
            {
              label: "Tests Created",
              data: recent_tests,
              borderColor: "#007bff",
              backgroundColor: "rgba(0,123,255,0.2)",
              fill: true,
            },
          ],
        };

        // Create the line chart options
        var options = {
          responsive: true,
          title: {
            display: true,
            text: "Number of Tests Created by Teachers in the Last 10 Days",
          },
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        };

        // Create the line chart object
        var lineChart = new Chart(ctx, {
          type: "line",
          data: data,
          options: options,
        });
                </script>
              </div>
            </div>
          </div>
          <!-- Column for line chart -->
          <div class="col-6">
            <!-- Chart for candidates -->
            <div class="row" id="candidate-chart">
              <div class="col-12">
                <canvas id="result-bar-chart"></canvas>
                <script>
                  // Get the context of the canvas element
        var ctx = document.getElementById("result-bar-chart").getContext("2d");

        // Create the bar chart data
        const recent_results = Object.values( @json($recent_data['results']));
        console.log(recent_results);

        var data = {
          labels: get_last_10_days(),
          datasets: [
            {
              label: "Tests Passed",
              data: recent_results,
              backgroundColor: "#28a745",
            },
          ],
        };

        // Create the bar chart options
        var options = {
          responsive: true,
          title: {
            display: true,
            text: "Number of Tests Passed by Candidates in the Last 10 Days",
          },
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        };

        // Create the bar chart object
        var barChart = new Chart(ctx, {
          type: "bar",
          data: data,
          options: options,
        });
                </script>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-2 p-2" id="charts-row-2">
          <div class="col-3">
            <canvas id="teacher-vs-candidats"></canvas>
            <!-- Include the Chart.js code from above -->
            <script>
              // The same code as before
          var data = {
            labels: ['Candidates', 'Teachers'],
            datasets: [{
              data: [{{$teacher_count}}, {{$candidat_count}}],
              backgroundColor: ['#36A2EB', '#FFCE56']
            }]
          };
      
          var config = {
            type: 'doughnut',
            data: data,
            options: {
              cutout: '50%'
            }
          };
      
          var myChart = new Chart(
            document.getElementById('teacher-vs-candidats'),
            config
          );
            </script>
          </div>
          <div class="col-3">
            <canvas id="passed-vs-non-passed"></canvas>
            <!-- Include the Chart.js code from above -->
            <script>
              // The same code as before
              const data2 = {
                labels: ['Passed', 'Non Passed'],
                datasets: [{
                  data: [{{$tests_with_results}}, {{$tests_without_results}}],
                  backgroundColor: ['#4BC0C0', '#FF6384']
                }]
              };

              const config2 = {
                type: 'doughnut',
                data: data2,
                options: {
                  cutout: '50%'
                }
              };

              const myChart2 = new Chart(
                document.getElementById('passed-vs-non-passed'),
                config2
              );
            </script>
          </div>
          <div class="col-6">
            <canvas id="test-destr"></canvas>
            <script>
              var tests_notes = Object.values(@json($tests_notes)).reverse();

              var ctx = document.getElementById('test-destr');
              var myChart = new Chart(
                ctx, { type: 'bar',
                  data: { labels: ['Trivial', 'Easy', 'Fair', 'Moderate', 'Hard', 'Challenging'],
                    datasets: [
                      { 
                        label: 'tests Destribution',
                        data: tests_notes,
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(221, 200, 100, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)' ], 
                          borderColor: [ 
                            'rgba(255, 99, 132, 1)', 
                            'rgba(54, 162, 235, 1)', 
                            'rgba(255, 206, 86, 1)', 
                            'rgba(221, 200, 100, 1)',
                            'rgba(75, 192, 192, 1)', 
                            'rgba(153, 102, 255, 1)'], 
                            borderWidth: 1 
                      }
                    ] 
                  },
                  options: { scales: { y: { beginAtZero: true } } } }); 
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
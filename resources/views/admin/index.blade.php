@extends('admin.layouts.main')
@section('css')
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // Get today's date
  var today = new Date();
  today.setHours(0,0,0,0);

  // Set the start and end date
  var startDate = new Date(today.getTime() - 30 * 24 * 60 * 60 * 1000); // 30 days ago
  startDate.setHours(0,0,0,0);

  // Convert the data to the required format
  var chartData = [['Date', 'Count']];
  var dateMap = {}; // Map to store data by date
  @foreach ($data as $row)
    dateMap['{{ $row->date }}'] = {{ $row->count }};
  @endforeach
  var currentDate = new Date(startDate.getTime());
  while (currentDate <= today) {
    var dateString = currentDate.toISOString().slice(0,10);
    chartData.push([dateString, dateMap[dateString] || 0]);
    currentDate.setDate(currentDate.getDate() + 1);
  }

  // Set Data
  var data = google.visualization.arrayToDataTable(chartData);
  // Set Options
  var options = {
    title: 'Cars added per day this month',
    hAxis: {title: 'Date'},
    vAxis: {
      title: 'Number of cars',
      ticks: [0, 3, 6, 9, 12],
      minValue: 0
    },
    legend: 'none'
  };
  // Draw
  var chart = new google.visualization.LineChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>
<!-- ------------transaction histroy ---- -->
@endsection
@section('main_content')
<main id="main" class="main">

  <div class="pagetitle mb-5">
    <h1>Dashboard</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Users <span>| All</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$driver}}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Cars <span>| All</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-car-front-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$cars}}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <!-- <div class="col-xxl-4 col-md-4">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Vendors <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>$</h6>

                  </div>
                </div>

              </div>
            </div>

          </div> -->
          <!-- End Customers Card -->
          
          <div>
          <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

        </div>

        </div>
      </div>
    </div><!-- End Left side columns -->

    </div>
  </section>

</main>
@endsection

@push('child-scripts')
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

@endpush
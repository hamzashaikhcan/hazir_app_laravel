@extends('admin.layouts.main')
@section('css')
<style>
  .toast-success {
    background-color: #2e844a !important;
  }

  /* Set the text color of success messages to white */
  .toast-success .toast-message {
    color: white !important;
  }
</style>
@endsection
@section('main_content')

<main id="main" class="main">

  <div class="pagetitle mb-5">
    <h1>All Cars</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cars</h5>

              <!-- Default Table -->
              <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Model</th>
                    <th scope="col">Model Year</th>
                    <th scope="col">City</th>
                    <th scope="col">Car No</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cars as $key => $car)
                  <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td><img style="width: 80px; height:80px; border-radius:50%;" src="{{asset('car-images/'. $car->image)}}" alt=""></td>
                    <td>{{$car->driver->name}}</td>
                    <td>{{$car->driver->phone_no}}</td>
                    <td>{{$car->car_make}}</td>
                    <td>{{$car->car_model}}</td>
                    <td>{{$car->model_year}}</td>
                    <td>{{$car->between_cities}}</td>
                    <td>{{$car->car_no}}</td>
                    <td> <a href="{{url('delete-car', $car->id)}}"><span class="badge bg-danger">Delete</span></a></td>
                    
                  
                  @endforeach
                </tbody>
              </table>
              </div>
              {!! $cars->links() !!}
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
      <!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->

@endsection
@push('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> -->
<script>
  // ------
  @if(Session::has('message'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.success("{{ session('message') }}");
  @endif
</script>
@endpush
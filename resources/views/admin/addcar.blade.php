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
    <h1>Add New Car</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Car</h5>
              <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Driver Id</label>
                        <input type="text" name="driver_id" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Model</label>
                        <input type="text" name="car_model" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Make</label>
                        <input type="text" name="car_make" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Model Year</label>
                        <input type="text" name="model_year" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Assembly</label>
                        <input type="text" name="car_assembly" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Varient</label>
                        <input type="text" name="car_varient" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Transmission</label>
                        <input type="text" name="car_tranmission" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Engin Capacity</label>
                        <input type="text" name="engine_capacity" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Body Color</label>
                        <input type="text" name="body_color" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Between Cities</label>
                        <input type="text" name="between_cities" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Registration City</label>
                        <input type="text" name="registration_city" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car No</label>
                        <input type="text" name="car_no" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Seats</label>
                        <input type="text" name="car_seats" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Seats Capacity</label>
                        <input type="text" name="seats_capacity" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Engine Type</label>
                        <input type="text" name="engine_type" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Type</label>
                        <input type="text" name="car_type" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Pickup City</label>
                        <input type="text" name="pickup_city" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Driver Availablity</label>
                        <input type="text" name="driver_availability" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Mileage</label>
                        <input type="text" name="car_mileage" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Rent</label>
                        <input type="text" name="car_rent" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Discription</label>
                        <input type="text" name="description" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Insured</label>
                        <input type="text" name="insured" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Car Status</label>
                        <input type="text" name="car_status" class="form-control" >
                    </div>

                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              <!-- Default Table -->
             
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
  @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endpush
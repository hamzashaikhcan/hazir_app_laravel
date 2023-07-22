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
    <h1>Add New User</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User</h5>
              <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">CNIC</label>
                        <input type="text" name="cnic" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Phone No</label>
                        <input type="number" name="phone_no" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">CNIC Front Image</label>
                        <input type="file" name="cnic_front" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">CNIC Back Image</label>
                        <input type="file" name="cnic_back" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Licence</label>
                        <input type="file" name="licence" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Profile Photo</label>
                        <input type="file" name="profile_photo" class="form-control" >
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </div>
               
                </form>
              <!-- Default Table -->
             
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
      <!-- End Left side columns -->

    <!-- </div> -->
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
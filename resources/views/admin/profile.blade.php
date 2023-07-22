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
    <h1>Profile</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">User Profile</h5>
              <form action="{{route('profile.update')}}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control" >
                    </div>
                    
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </div>
            
            </form>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Change Password</h5>
              <form action="{{route('profile.password')}}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" >
                </div>
                    
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </div>
            
            </form>
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
  @if(Session::has('error'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.error("{{ session('error') }}");
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
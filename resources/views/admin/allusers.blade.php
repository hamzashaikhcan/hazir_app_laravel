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
    <div class="d-flex justify-content-between">
      <h1>All Users</h1>
      <!-- <button class="btn btn-success">Add User</button> -->
    </div>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">CNIC</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $key => $user)
                  <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td><img style="width: 80px; height:80px; border-radius:50%;" src="{{asset('driver-profile/'. $user->profile_photo)}}" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_no}}</td>
                    <td>{{$user->cnic}}</td>
                    <td>{{$user->location}}</td>
                    <td> <a href="{{url('delete-user', $user->id)}}"><span class="badge bg-danger">Delete</span></a></td>
                    
                  
                  @endforeach
                </tbody>
              </table>
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
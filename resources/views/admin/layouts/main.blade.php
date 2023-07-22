<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('css')
</head>

<body>
    <!-- Navbar -->
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @section('main_content')
        @show
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')

    @include('admin.layouts.scripts')
    @stack('scripts')
</body>

</html>
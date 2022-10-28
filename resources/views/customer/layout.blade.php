<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('customer.layout.head')
{{--    @include('sweetalert::alert')--}}
    @stack('head')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
{{--        @include('customer.layout.sidebar')--}}
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('customer.layout.header')
            <!-- main header @e -->

            <!-- content @s -->
            @yield('main')

            <!-- footer @s -->
            @include('customer.layout.footer')
            <!-- footer @e -->

        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<!-- thêm cái editor cho trang create product -->
<script src="{{asset('boarding_house/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('boarding_house/js/bootstrap.bundle.min.js')}}"></script>
<!-- counter js -->
<script src="{{asset('boarding_house/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('boarding_house/js/waypoints.min.js')}}"></script>
<script src="{{asset('boarding_house/js/jquery.counterup.min.js')}}"></script>
<!-- venobox js -->
<script src="{{asset('boarding_house/js/venobox.min.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('boarding_house/js/owl.carousel.min.js')}}"></script>
<!-- portfolio js -->
<script src="{{asset('boarding_house/js/jquery.mixitup.min.js')}}"></script>
<!-- datepicker js -->
<script src="{{asset('boarding_house/js/datepicker.min.js')}}"></script>
<!-- script js -->
<script src="{{asset('boarding_house/js/custom.js')}}"></script>
@stack('footer')
</body>
</html>


<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('admin.custom_auth.layout')
    @stack('head')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        @include('admin.custom_auth.layout.head')
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('admin.custom_auth.layout.header')
            <!-- main header @e -->

            <!-- content @s -->
            @yield('main')

            <!-- footer @s -->
            @include('admin.custom_auth.layout.footer')
            <!-- footer @e -->

        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<!-- thêm cái editor cho trang create product -->
<script src="{{asset('login-form/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('login-form/js/popper.min.js')}}"></script>
<script src="{{asset('login-form/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login-form/js/main.js')}}"></script>
{{--<script src="js/popper.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/main.js"></script>--}}
@stack('footer')
</body>
</html>


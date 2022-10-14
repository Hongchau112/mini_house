<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.layout.test')
    @stack('test')
</head>

<body>
<!-- HEADER  -->
@include('guest.layout.header2')
<!-- Banner  -->
<main>
    <div class="main">
        <!-- content @s -->
    @yield('main')
    <!-- content @e -->

    </div>
</main>

<!-- FOOTER -->
@include('guest.layout.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- OWL JS -->

<!-- APP JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
<script src="{{asset('mystore/js/jquery.min.js')}}"></script>
<script src="{{asset('mystore/js/bootstrap.min.js')}}"></script>
<script src="{{asset('mystore/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('mystore/js/lightslider.js')}}"></script>
<script src="{{asset('mystore/js/prettify.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>--}}

@stack('footer')
</body>

</html>

@extends('customer.layout', [
'title' => ( $title ?? '' )
])

@section('main')
    @yield('content')
@endsection

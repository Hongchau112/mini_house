@extends('customer.layout', [
'title' => ( $title ?? 'Giới thiệu' )
])

@section('main')
    @yield('content')
@endsection

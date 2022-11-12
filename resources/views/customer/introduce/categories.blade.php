@extends('customer.introduce.layout', [
    'title' => ( $title ?? 'about us' )
])

@section('content')
<!-- ================ Inner banner ================ -->
<div class="inner-banner inner-banner-bg pt-70 pb-40" style=" background-color: lightblue !important;background-image: url("{{asset('boarding_house/img/category.png')}}")">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 mb-30">
                <!-- page-title -->
                <div class="page-title">
                    <h1>Danh mục</h1>
                </div>
                <!-- page-title end -->
            </div>
            <div class="col-lg-4 col-md-4 mb-30">
                <!-- breadcrumb -->
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
                </ol>
                <!-- breadcrumb end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Inner banner end ================ -->

<!-- ================ Gallery page ================ -->
<div class="gallery-page pt-70 pb-40">
    <div class="container">
        <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1">
            @foreach($categories as $category)
            <div class="col mb-30">
                <!-- gallery box -->
                <div class="gallery-box">
                    <div class="img-holder-overlay">
                        <div class="img-holder"><img src="{{asset('boarding_house/img/categories.png')}}" alt=""></div>
                        <div class="overlay"><a href="" class="venobox" data-gall="gallery1"><i class="far fa-image"></i></a></div>
                    </div>
                    <div class="title">
                        <h3>{{$category->name}}</h3>
                    </div>
                </div>
                <!-- gallery box end -->
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

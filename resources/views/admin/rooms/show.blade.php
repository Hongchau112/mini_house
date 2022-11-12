@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Chi tiết phòng trọ' )
])

@section('content')
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                            <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                @if(count($images)>0)
                                    @foreach($images as $image)
                                    <div class="slider-item rounded">
                                        <img src="{{asset('/images/'.$image->image_path)}}" class="rounded w-100" width="500px" height="500px" alt="">
                                    </div>
                                    @endforeach
                                @else
                                    <h4 style="padding: 70px;">Nhấp vào  <a href="{{route('admin.rooms.upload_images', ['id'=>$room->id])}}">đây để tải ảnh lên</a></h4>
                                @endif
                            </div><!-- .slider-init -->
                            <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>
                                @foreach($images as $image)
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('/images/'.$image->image_path)}}" width="72px" height="69px" class="rounded" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- .slider-nav -->
                        </div><!-- .product-gallery -->
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="product-info mt-5 mr-xxl-5">
                            <h4 class="product-price text-primary">{{number_format($room->cost)}} VND</h4>
                            <h2 class="product-title">{{$room->name}}</h2>
{{--                            <div class="product-rating">--}}
{{--                                <ul class="rating">--}}
{{--                                    <li><em class="icon ni ni-star-fill"></em></li>--}}
{{--                                    <li><em class="icon ni ni-star-fill"></em></li>--}}
{{--                                    <li><em class="icon ni ni-star-fill"></em></li>--}}
{{--                                    <li><em class="icon ni ni-star-fill"></em></li>--}}
{{--                                    <li><em class="icon ni ni-star-half"></em></li>--}}
{{--                                </ul>--}}
{{--                                <div class="amount">(2 Reviews)</div>--}}
{{--                            </div><!-- .product-rating -->--}}
                            <div class="product-excrept text-soft">
                                <p class="lead">{{$room->short_intro}}</p>
                                <p >Chiều dài: {{$room->length}} m</p>
                                <p >Chiều rộng: {{$room->width}} m</p>
                            </div>
                            <div class="product-meta">
                                <ul class="d-flex g-3 gx-5">
                                    <li>
                                        <div class="fs-16px fw-bold">Loại phòng: <span class="fs-16px text">{{$room_category}}</span></div>

                                    </li>
                                </ul>
                            </div>
                            <div class="product-meta">
                                <h6 class="title">Tiện ích phòng trọ: </h6>
                                <ul class="custom-control-group" style="margin-top:10px">
                                    @if($room->maylanh == 1)
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="maylanh" id="maylanh">
                                            <label class="custom-control-label" for="maylanh">Máy lạnh</label>
                                        </div>
                                    </li>
                                    @endif
                                    @if($room->bep == 1)
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="bep" id="bep">
                                                <label class="custom-control-label" for="bep">Bếp nấu ăn</label>
                                            </div>
                                        </li>
                                    @endif
                                    @if($room->gac == 1)
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input" name="gac" id="gac">
                                                <label class="custom-control-label" for="gac">Phòng có gác</label>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div><!-- .product-meta -->
                            <div class="product-meta">
                                <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                    <li class="w-140px">
                                        @if($room->status==0)
                                            <button class="btn btn-primary">Đặt phòng</button>
                                        @else
                                            <button class="btn btn-primary">Đã đặt</button>
                                        @endif
                                    </li>


                                </ul>
                            </div><!-- .product-meta -->
                        </div><!-- .product-info -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <hr class="hr border-light">
                <div class="row g-gs flex-lg-row-reverse pt-5">
                    <div class="col-lg-5">
                    </div><!-- .col -->
                    <div class="col-lg-7">
                        <div class="product-details entry mr-xxl-3">
                            <h3>Mô tả phòng {{$room->name}}</h3>
                            <p>{!! $room->description !!}</p>

                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
        </div>
    </div><!-- .nk-block -->
@endsection

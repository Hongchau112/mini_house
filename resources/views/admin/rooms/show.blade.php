@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Phòng' )
])

@section('content')
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                            <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                <div class="slider-item rounded">
                                    <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded w-100" alt="">
                                </div>
                            </div><!-- .slider-init -->
                            <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{asset('dashlite/./images/product/lg-a.jpg')}}" class="rounded" alt="">
                                    </div>
                                </div>
                            </div><!-- .slider-nav -->
                        </div><!-- .product-gallery -->
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="product-info mt-5 mr-xxl-5">
                            <h4 class="product-price text-primary">$78.00 <small class="text-muted fs-14px">$98.00</small></h4>
                            <h2 class="product-title">Classy Modern Smart watch</h2>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li><em class="icon ni ni-star-fill"></em></li>
                                    <li><em class="icon ni ni-star-fill"></em></li>
                                    <li><em class="icon ni ni-star-fill"></em></li>
                                    <li><em class="icon ni ni-star-fill"></em></li>
                                    <li><em class="icon ni ni-star-half"></em></li>
                                </ul>
                                <div class="amount">(2 Reviews)</div>
                            </div><!-- .product-rating -->
                            <div class="product-excrept text-soft">
                                <p class="lead">I must explain to you how all this mistaken idea of denoun cing ple praising pain was born and I will give you a complete account of the system, and expound the actual teaching.</p>
                            </div>
                            <div class="product-meta">
                                <ul class="d-flex g-3 gx-5">
                                    <li>
                                        <div class="fs-14px text-muted">Type</div>
                                        <div class="fs-16px fw-bold text-secondary">Watch</div>
                                    </li>
                                    <li>
                                        <div class="fs-14px text-muted">Model Number</div>
                                        <div class="fs-16px fw-bold text-secondary">Forerunner 290XT</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-meta">
                                <h6 class="title">Color</h6>
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control color-control">
                                            <input type="radio" class="custom-control-input" id="productColor1" name="productColor" checked>
                                            <label class="custom-control-label dot dot-xl" data-bg="#754c24" for="productColor1"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control color-control">
                                            <input type="radio" class="custom-control-input" id="productColor2" name="productColor">
                                            <label class="custom-control-label dot dot-xl" data-bg="#636363" for="productColor2"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control color-control">
                                            <input type="radio" class="custom-control-input" id="productColor3" name="productColor">
                                            <label class="custom-control-label dot dot-xl" data-bg="#ba6ed4" for="productColor3"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control color-control">
                                            <input type="radio" class="custom-control-input" id="productColor4" name="productColor">
                                            <label class="custom-control-label dot dot-xl" data-bg="#ff87a3" for="productColor4"></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-meta">
                                <h6 class="title">Size</h6>
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck1" checked>
                                            <label class="custom-control-label" for="sizeCheck1">XS</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck2">
                                            <label class="custom-control-label" for="sizeCheck2">SM</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck3">
                                            <label class="custom-control-label" for="sizeCheck3">L</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck4">
                                            <label class="custom-control-label" for="sizeCheck4">XL</label>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- .product-meta -->
                            <div class="product-meta">
                                <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                    <li class="w-140px">
                                        <div class="form-control-wrap number-spinner-wrap">
                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                            <input type="number" class="form-control number-spinner" value="0">
                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="btn btn-primary">Add to Cart</button>
                                    </li>
                                    <li class="ml-n1">
                                        <button class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-heart"></em></button>
                                    </li>
                                </ul>
                            </div><!-- .product-meta -->
                        </div><!-- .product-info -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <hr class="hr border-light">
                <div class="row g-gs flex-lg-row-reverse pt-5">
                    <div class="col-lg-5">
                        <div class="video">
                            <img class="video-poster w-100" src="{{asset('dashlite/./images/product/lg-a.jpg')}}" alt="">
                            <a class="video-play popup-video" href="https://www.youtube.com/watch?v=SSo_EIwHSd4">
                                <em class="icon ni ni-play"></em>
                                <span>Watch Video</span>
                            </a>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-7">
                        <div class="product-details entry mr-xxl-3">
                            <h3>Product details of Comfy cushions</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem consectetur, adipisci velit.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.</p>
                            <ul class="list list-sm list-checked">
                                <li>Meets and/or exceeds performance standards.</li>
                                <li>Liumbar support.</li>
                                <li>Made of bonded teather and poiyurethane.</li>
                                <li>Metal frame.</li>
                                <li>Anatomically shaped cork-latex</li>
                                <li>As attractively priced as you look attractive in one</li>
                            </ul>
                            <p>Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                            <h3>The best seats in the house</h3>
                            <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
        </div>
    </div><!-- .nk-block -->
@endsection

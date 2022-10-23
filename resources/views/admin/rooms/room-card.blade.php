@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Phòng' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="{{asset('dashlite/./images/product/lg-a.jpg')}}" alt="">
                        </a>
                        <ul class="product-badges">
                            <li><span class="badge badge-success">New</span></li>
                        </ul>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Smart Watch</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Classy Modern Smart watch</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$350</small> $324</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-b.jpg" alt="">
                        </a>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Vintage Phone</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">White Vintage telephone</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$209</small> $119</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-c.jpg" alt="">
                        </a>
                        <ul class="product-badges">
                            <li><span class="badge badge-danger">Hot</span></li>
                        </ul>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Headphone</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Black Wireless Headphones</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$129</small> $89</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-d.jpg" alt="">
                        </a>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Smart Watch</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Modular Smart Watch</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$169</small> $120</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-e.jpg" alt="">
                        </a>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Headphones</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">White Wireless Headphones</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$109</small> $78</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="#">
                            <img class="card-img-top" src="./images/product/lg-f.jpg" alt="">
                        </a>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Phone</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Black Android Phone</a></h5>
                        <div class="product-price text-primary h5">$329</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-h.jpg" alt="">
                        </a>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Smart Watch</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Modern Smart watch</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$200</small> $178</div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="html/product-details.html">
                            <img class="card-img-top" src="./images/product/lg-g.jpg" alt="">
                        </a>
                        <ul class="product-badges">
                            <li><span class="badge badge-danger">Hot</span></li>
                        </ul>
                        <ul class="product-actions">
                            <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                            <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                        </ul>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li><a href="#">Bundle</a></li>
                        </ul>
                        <h5 class="product-title"><a href="html/product-details.html">Gadget Bundle</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$609</small> $498</div>
                    </div>
                </div>
            </div><!-- .col -->
        </div>
    </div><!-- .nk-block -->
@endsection

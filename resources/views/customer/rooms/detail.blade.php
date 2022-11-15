@extends('customer.rooms.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
<!-- ================ Inner banner ================ -->
<div class="inner-banner inner-banner-bg pt-70 pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 mb-30">
                <!-- page-title -->
                <div class="page-title">
                    <h1>Chi tiết phòng trọ</h1>
                </div>
                <!-- page-title end -->
            </div>
            <div class="col-lg-4 col-md-4 mb-30">
                <!-- breadcrumb -->
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết phòng</li>
                </ol>
                <!-- breadcrumb end -->
            </div>
        </div>
    </div>
</div>
<!-- ================ Inner banner end ================ -->

<!-- ================ Detail page ================ -->
<div class="detail-page pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="title">
                    <h2>{{$room->name}}</h2>
                </div>
                <!-- detail page gallery -->
                <div class="owl-carousel detail-page-gallery-carousel mb-20">
                    @foreach($images as $image)
                        @if($room->id == $image->room_id)
                            @php
                                $image_path = $image->image_path;
                            @endphp
                            <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" alt="img description"> </figure>
                        @endif
                    @endforeach
{{--                    <figure class="item mb-0"> <img src="img/hotel-detail/img-01.jpg" alt="img description"> </figure>--}}
                </div>
                <!-- detail page gallery end -->
                <!-- tabs -->
                <div class="detail-tabs mb-30">
                    <ul class="nav nav-tabs nav-pills nav-justified" id="myTab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Mô tả</a> </li>
                        <li class="nav-item"> <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Tiện nghi</a> </li>
                        <li class="nav-item"> <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Tìm trọ tương tự</a> </li>
                        <li class="nav-item"> <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Bình luận/Đánh giá</a> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-15" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <!-- overview -->
                            <h4 class="mb-6">Mô tả</h4>
                            <p>{{$room->description}}</p>
{{--                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>--}}
                            <!-- overview end -->
                        </div>
                        <div class="tab-pane fade p-15" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <!-- ameneties -->
                            <h4 class="mb-6">Tiện nghi</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="ameneties-list">
                                        <li><i class="fas fa-wifi pr-6"></i>Wi-Fi miễn phí</li>
                                        @if($room->bep==1)
                                            <li><i class="fas fa-home"></i> Bếp nấu ăn</li>
                                        @endif

                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="ameneties-list">
                                        @if($room->maylanh==1)
                                            <li><i class="fas fa-home"></i> Máy lạnh</li>
                                        @endif

                                        @if($room->gac==1)
                                            <li><i class="fas fa-home"></i> Phòng có gác</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="ameneties-list">
                                        <li><i class="fas fa-camera-retro pr-6"></i>Camera an ninh</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ameneties end -->
                        </div>
                        <div class="tab-pane fade p-15" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <!-- rooms -->
                            <h4 class="mb-6">Rooms</h4>
                            <div class="room-type-wrapper">
                                <!-- list box -->
                                <div class="list-box mb-30">
                                    <div class="list-box-img"> <a href="img/rooms/img-big-01.jpg" class="venobox" data-gall="gallery1"> <img src="img/rooms/img-thum-01.jpg" alt=""> </a> <a href="img/rooms/img-big-02.jpg" class="venobox" data-gall="gallery1"></a> <a href="img/rooms/img-big-03.jpg" class="venobox" data-gall="gallery1"></a> <a href="img/rooms/img-big-04.jpg" class="venobox" data-gall="gallery1"></a>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Select Room</label>
                                        </div>
                                    </div>
                                    <div class="list-box-content">
                                        <div class="list-box-title">
                                            <h3>Standard Single Room <span>$240 <em>/ night</em></span></h3>
                                            <address>
                                                Max : 2 Persons
                                            </address>
                                        </div>
                                        <ul class="hotel-featured">
                                            <li><span><i class="fas fa-car"></i> Parking Facility</span></li>
                                            <li><span><i class="fas fa-bath"></i> Attached Bathroom</span></li>
                                            <li><span><i class="fas fa-home"></i> Daily Housekeeping</span></li>
                                            <li><span><i class="fas fa-swimming-pool"></i> Swimming Pool</span></li>
                                        </ul>
                                        <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">View Details</a> <a class="book-now-btn ml-6" href="">Book Now</a> </div>
                                    </div>
                                </div>
                                <!-- list box end -->
                                <!-- list box -->
                                <div class="list-box mb-30">
                                    <div class="list-box-img"> <a href="img/rooms/img-big-01.jpg" class="venobox" data-gall="gallery2"> <img src="img/rooms/img-thum-01.jpg" alt=""></a> <a href="img/rooms/img-big-02.jpg" class="venobox" data-gall="gallery2"></a> <a href="img/rooms/img-big-03.jpg" class="venobox" data-gall="gallery2"></a> <a href="img/rooms/img-big-04.jpg" class="venobox" data-gall="gallery2"></a>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck11">
                                            <label class="form-check-label" for="exampleCheck1">Select Room</label>
                                        </div>
                                    </div>
                                    <div class="list-box-content">
                                        <div class="list-box-title">
                                            <h3>Deluxe Room <span>$340 <em>/ night</em></span></h3>
                                            <address>
                                                Max : 5 Persons
                                            </address>
                                        </div>
                                        <ul class="hotel-featured">
                                            <li><span><i class="fas fa-car"></i> Parking Facility</span></li>
                                            <li><span><i class="fas fa-bath"></i> Attached Bathroom</span></li>
                                            <li><span><i class="fas fa-home"></i> Daily Housekeeping</span></li>
                                            <li><span><i class="fas fa-swimming-pool"></i> Swimming Pool</span></li>
                                        </ul>
                                        <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">View Details</a> <a class="book-now-btn ml-6" href="">Book Now</a> </div>
                                    </div>
                                </div>
                                <!-- list box end -->
                                <!-- list box -->
                                <div class="list-box mb-30">
                                    <div class="list-box-img"> <a href="img/rooms/img-big-01.jpg" class="venobox" data-gall="gallery3"> <img src="img/rooms/img-thum-01.jpg" alt=""> </a><a href="img/rooms/img-big-02.jpg" class="venobox" data-gall="gallery3"></a> <a href="img/rooms/img-big-03.jpg" class="venobox" data-gall="gallery3"></a> <a href="img/rooms/img-big-04.jpg" class="venobox" data-gall="gallery3"></a>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck12">
                                            <label class="form-check-label" for="exampleCheck1">Select Room</label>
                                        </div>
                                    </div>
                                    <div class="list-box-content">
                                        <div class="list-box-title">
                                            <h3>Signature Room <span>$440 <em>/ night</em></span></h3>
                                            <address>
                                                Max : 3 Persons
                                            </address>
                                        </div>
                                        <ul class="hotel-featured">
                                            <li><span><i class="fas fa-car"></i> Parking Facility</span></li>
                                            <li><span><i class="fas fa-bath"></i> Attached Bathroom</span></li>
                                            <li><span><i class="fas fa-home"></i> Daily Housekeeping</span></li>
                                            <li><span><i class="fas fa-swimming-pool"></i> Swimming Pool</span></li>
                                        </ul>
                                        <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">View Details</a> <a class="book-now-btn ml-6" href="">Book Now</a> </div>
                                    </div>
                                </div>
                                <!-- list box end -->
                                <!-- list box -->
                                <div class="list-box">
                                    <div class="list-box-img"> <a href="img/rooms/img-big-01.jpg" class="venobox" data-gall="gallery4"> <img src="img/rooms/img-thum-01.jpg" alt=""></a> <a href="img/rooms/img-big-02.jpg" class="venobox" data-gall="gallery4"></a> <a href="img/rooms/img-big-03.jpg" class="venobox" data-gall="gallery4"></a> <a href="img/rooms/img-big-04.jpg" class="venobox" data-gall="gallery4"></a>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck13">
                                            <label class="form-check-label" for="exampleCheck1">Select Room</label>
                                        </div>
                                    </div>
                                    <div class="list-box-content">
                                        <div class="list-box-title">
                                            <h3>Signature Room <span>$540 <em>/ night</em></span></h3>
                                            <address>
                                                Max : 4 Persons
                                            </address>
                                        </div>
                                        <ul class="hotel-featured">
                                            <li><span><i class="fas fa-car"></i> Parking Facility</span></li>
                                            <li><span><i class="fas fa-bath"></i> Attached Bathroom</span></li>
                                            <li><span><i class="fas fa-home"></i> Daily Housekeeping</span></li>
                                            <li><span><i class="fas fa-swimming-pool"></i> Swimming Pool</span></li>
                                        </ul>
                                        <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">View Details</a> <a class="book-now-btn ml-6" href="">Book Now</a> </div>
                                    </div>
                                </div>
                                <!-- list box end -->
                            </div>
                            <!-- rooms -->
                        </div>
                        <div class="tab-pane fade p-15" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                            <!-- reviews -->
                            <h4 class="mb-6">Đánh giá</h4>
                            <div class="reviews-wrapper">
                                <!-- review item -->
                                <div class="media review-item"> <img src="{{asset('boarding_house/img/Review/1.jpg')}}" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">John Doe <span>January 01, 2020 - <a href="">Reply</a></span></h5>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>
                                    </div>
                                </div>
                                <!-- review item end -->
                                <!-- review item -->
                                <div class="media review-item"> <img src="img/Review/2.jpg" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">John Doe <span>January 01, 2020 - <a href="">Reply</a></span></h5>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>
                                    </div>
                                </div>
                                <!-- review item end -->
                                <!-- review item -->
                                <div class="media review-item"> <img src="img/Review/3.jpg" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">John Doe <span>January 01, 2020 - <a href="">Reply</a></span></h5>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur piscing elit amet consectetur adipiscing elit sed et eletum nulla eu placerat felis etiam tincidunt orci lacus id varius dolor fermum sit amet.</p>
                                    </div>
                                </div>
                                <!-- review item end -->
                            </div>
                            <!-- reviews end -->
                        </div>
                    </div>
                </div>
                <!-- tabs end -->
            </div>
            <div class="col-lg-4 col-md-4">
                <aside>
                    <!-- filter widget -->
                    <div class="filter-widget mb-20">
                        <div class="accordion filter-accordion" id="filter-widget-accordion4-d">
                            <div class="card">
                                <div class="card-header" id="headingOne4-d"> <a class="btn btn-link w-100 text-left" href="" data-toggle="collapse" data-target="#collapseOne4-m" aria-expanded="true" aria-controls="collapseOne4-m">
                                        <!-- title widget -->
                                        <div class="filter-title-widget">
                                            <h3>Hotel Details <i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h3>
                                        </div>
                                        <!-- title widget end -->
                                    </a> </div>
                                <div id="collapseOne4-m" class="collapse show mt-10" aria-labelledby="headingOne4-d" data-parent="#filter-widget-accordion4-d">
                                    <div class="card-body">
                                        <ul class="list-inline select-all mb-10">
                                            <li class="list-inline-item">Hilton Miami Downtown</li>
                                        </ul>
                                        <div class="table-responsive">
                                            <table class="table table-bordered bg-gray w-100 border-0">
                                                <tr>
                                                    <td>Check In</td>
                                                    <td>Jan 01, 2020 Wed</td>
                                                </tr>
                                                <tr>
                                                    <td>Check Out</td>
                                                    <td>Jan 01, 2020 Fri</td>
                                                </tr>
                                                <tr>
                                                    @foreach($room_categories as $room_cate_sub)
                                                        @if($room->room_type_id == $room_cate_sub->id)
                                                            <td>{{$room_cate_sub->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>1 người</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <a class="btn-style-1" href="">Book Selected Rooms</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- filter widget end -->
                    <!-- help us -->
                    <div class="help-us mb-30">
                        <h3>How can we help you?</h3>
                        <p>Lorem ipsum dolor sit ametdf consectetur adipiscing elitdgsh ametdf consectetur piscing.</p>
                        <a class="view-detail-btn" href=""><i class="fas fa-phone-alt"></i> Contact Us</a> </div>
                    <!-- help us end -->
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- ================ Detail page end ================ -->
@endsection

@extends('customer.introduce.layout', [
    'title' => ( $title ?? 'about us' )
])

@section('content')

    <div class="about-page pt-70 pb-60" style="margin-top: 233px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <!-- about text -->
                    <div class="about-col">
                        <h6>Nhà trọ giá tốt</h6>
                        <h2>Chúng tôi <span>là nơi cho các bạn, những người đi làm, các bạn sinh viên</span> những phòng trọ giá rẻ, chất lượng</h2>
                        <p>Với mong muốn xây dựng một trang web chuyên cung cấp thông tin nhà trọ phòng trọ cho mọi người, khi mà ngày nay nhu cầu nhà trọ phòng trọ ngày càng tăng ở Cần Thơ cho sinh viên, học sinh có nhu cầu có một nơi an tâm để học tập và phát triển.

                            Đối với cách tiếp cận thông tin truyền thống đã không được truyền đến mọi người một cách kịp thời đúng lúc.</p>
                        <p>Chính vì nắm bắt được tình hình thực tế đó mà chúng tôi đã thành lập trang web phòng trọ giá tốt này với mong muốn trở thành một kênh truyền thông phổ biến nhà trọ, phòng trọ hữu ích cho mọi người.

                            Nếu trước đây việc cho thuê nhà, cho thuê phòng trọ ở nhatrogia tótđều dán giấy đăng quảng cáo ở các nơi công cộng rất là mất vẽ mỹ quang đô thị. Thì ngày nay các bạn có thể đăng tin trên đây rất tiện lợi, với phương tiện truyền thông được phổ biến rộng rãi tin đăng của bạn sẽ được hàng ngàn người biết đến.</p>
                        <a class=" btn-style-1" href="#" role="button"><i class="fas fa-long-arrow-alt-right pl-6"></i></a> </div>
                    <!-- about text end -->
                </div>
                <div class="col-lg-6 mb-30">
                    <!-- about video -->
                    <div class="feature-img"> <img src="{{asset('boarding_house/img/im.jpg')}}" width="500px" class="rounded" alt=""> </div>
                    <!-- about video end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ About page end ================ -->

    <!-- ================ Our features ================ -->
    <div class="our-features pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <!-- feature img -->
                    <div class="feature-img"> <img src="{{asset('boarding_house/img/img.jpg')}}" class="rounded" width="560px" alt=""> </div>
                    <!-- feature img end -->
                </div>
                <div class="col-lg-6 mb-30">
                    <!-- feature text -->
                    <div class="feature-text">
                        <h2>Chúng tôi <span>Cung cấp các tính năng</span></h2>
                        <!-- features tabs -->
                        <div class="features-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><i class="far fa-gem"></i> Tìm kiếm phòng</a> </li>
                                <li class="nav-item"> <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><i class="fas fa-desktop"></i>Đặt phòng </a> </li>
                                <li class="nav-item"> <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><i class="fas fa-users"></i>Trao đổi thông tin</a> </li>
                            </ul>
                            <div class="tab-content pt-20" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <p>Nếu trước đây việc cho thuê nhà, cho thuê phòng trọ đều dán giấy đăng quảng cáo ở các nơi công cộng rất là mất vẽ mỹ quang đô thị. Thì ngày nay các bạn có thể đăng tin trên đây rất tiện lợi, với phương tiện truyền thông được phổ biến rộng rãi tin đăng của bạn sẽ được hàng ngàn người biết đến.</p>
                                    <p class="mb-0">Đến với nhatrogiatot, các bạn có thể tìm kiếm nhà trọ với nhiều tùy chọn như giá phòng, tiện ích của nhà trọ, hay bất kì từ khóa nào mà bạn muốn. </p>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <p>Với nhatrogiatot, bạn không cần phải liên hệ trực tiếp đến nhà trọ để đặt phòng, thay vào đó, bạn có thể đặt phòng trọ trực tuyến thông qua tính đăng đặt phòng.</p>
                                    <p class="mb-0">Chúng tôi luôn cố gắng đem lại những thông tin nhanh chóng và chính xác cho mọi người. Rất mong nhận được sự ủng hộ giúp đỡ của mọi người cùng nhau xây dựng một kênh thông tin truyền thông về nhà trọ.

                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                    <p>Nếu bạn còn bâng khuâng về các thông tin chúng tôi cung cấp, bạn có thể để lại bình luận hoặc liên hệ với chúng tôi bạn nhé!</p>
                                    <p class="mb-0">Hy vọng với những tính năng của trang web, sẽ mang lại cho các bạn trải nghiệm tìm nơi ở thoải mái và tiện lợi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- features tabs end -->
                    </div>
                    <!-- feature text end -->
                </div>
            </div>
        </div>
    </div>
@endsection

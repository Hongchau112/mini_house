@extends('customer.rooms.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
<!-- ================ Inner banner ================ -->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<style>
    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left
    }
    .rating>input {
        display: none
    }
    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #eec80d;
        cursor: pointer
    }
    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }
    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }
    .rating>input:checked~label:before {
        opacity: 1
    }
    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>
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
                            <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" width="500px" height="470px" alt="img description"> </figure>
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
                            <p>{!! $room->description !!}</p>
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
                                        @foreach($serviceRooms as $serviceRoom)
                                            @foreach($services as $service)
                                                @if($serviceRoom->service_id==$service->id)
                                                    <li><span><i class="fas fa-home"></i> {{$service->getName()}}</span></li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- ameneties end -->
                        </div>
                        <div class="tab-pane fade p-15" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <!-- rooms -->
                            <h4 class="mb-6">Phòng cùng danh mục</h4>
                            <div class="room-type-wrapper">
                                <!-- list box -->
                                @foreach($roomSameCategory as $same_room)
                                <div class="list-box mb-30">
                                    <div class="list-box-img">
                                            @foreach($images as $image)
                                                @if($same_room->id == $image->room_id)
                                                    @php
                                                        $image_path = $image->image_path;
                                                    @endphp

{{--                                                    <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" width="500px" height="470px" alt="img description"> </figure>--}}
                                                @endif
                                            @endforeach
                                                <img src="{{asset('/images/'.$image_path)}}" width="260px" height="225px" alt="room">
                                    </div>
                                    <div class="list-box-content">
                                        <div class="list-box-title">
                                            <h3>{{$same_room->name}}<span>{{number_format($same_room->cost)}} đ<em>/tháng</em></span></h3>
                                            <address>Loại phòng: {{$room_category->name}}</address>
                                        </div>
                                        <ul class="hotel-featured">
                                            @php
                                                $serviceSame = \App\Models\ServiceRoom::where('room_id', $same_room->id)->get();
                                            @endphp
                                            @foreach($serviceSame as $room_service_s)
                                                @foreach($services as $service)
                                                    @if($room_service_s->service_id==$service->id)
                                                        <li><span><i class="fas fa-swimming-pool"></i>{{$service->getName()}}</span></li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ul>
                                        <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="{{route('customer.rooms.details', ['id'=>$same_room->id])}}">Chi tiết</a>
                                            @if($same_room->status==0)
                                                <a class="book-now-btn ml-6" href="{{route('customer.rooms.booking', ['id' =>$same_room->id])}}">Đặt ngay</a>
                                            @else
                                                <button class="btn btn-outline-danger">Hết phòng</button>
                                            @endif </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- list box end -->
                            </div>
                            <!-- rooms -->
                        </div>
                        <div class="tab-pane fade p-15" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                            <!-- reviews -->
                            <h4 class="mb-6">Đánh giá</h4>
                            <form>
                                @csrf
                                <div class="reviews-wrapper" id="comment_show">
    <!-- review item -->

                                </div>

                                <div class="bg-white p-2">
                                    <input type="hidden" id="room_id" value="{{$room->id}}" class="post_id">
                                    {{--                                <input type="hidden"  value="" id=user_id class="cmt-userid">--}}

                                </div>
                            </form>

                            @if($user!=null)

                                <form>
                                <input type="hidden" name="name" id="cmt-name" value="{{$user->name}}" class="form-control" >
                                <input type="hidden" name="name" id="cmt-phone" value="{{$user->phone}}"  class="form-control" >
                                <input type="hidden" name="user_id" id="cmt-user" value="{{$user->id}}"  class="form-control" >
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
                                    </div>
                                </div>
                                {{--                                <div class="row">--}}
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" name="name" id="cmt-name" placeholder="Tên của bạn" class="form-control" required>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <input type="text" name="phone" id="cmt-phone"  placeholder="Số điện thoại" class="form-control" required>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="form-group">
                                    <textarea class="form-control" id="cmt-content" placeholder="Bình luận" rows="5"></textarea>
                                </div>
                                <button type="button" class="btn-style-1 text-uppercase" id="send-comment">Gửi</button>
                                <div id="notify"></div>
                            </form>
                            @else
                                <p></p>
                            @endif
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
                                            <h2>{{number_format($room->cost)}} đ<i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h2>
                                        </div>
                                        <!-- title widget end -->
                                    </a> </div>
                                <div id="collapseOne4-m" class="collapse show mt-10" aria-labelledby="headingOne4-d" data-parent="#filter-widget-accordion4-d">
                                    <div class="card-body">
                                        <ul class="list-inline select-all mb-10">
                                            <li class="list-inline-item"></li>
                                        </ul>
                                        <div class="table-responsive">
                                            <table class="table table-bordered bg-gray w-100 border-0">
                                                <tr>
                                                    <td>Chiều dài: </td>
                                                    <td>{{$room->length}} m</td>
                                                </tr>
                                                <tr>
                                                    <td>Chiều rộng</td>
                                                    <td>{{$room->width}} m</td>
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
                                        @if($room->status==0)
                                            <a class="btn-style-1" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt ngay</a>
                                        @else
                                            <button class="btn btn-danger">Hết phòng</button>
                                        @endif </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- filter widget end -->
                    <!-- help us -->
                    <div class="help-us mb-30">
                        <h3>Chúng tôi có thể giúp gì được cho bạn?</h3>
                        <p>Nếu bạn chưa chọn được cho mình phòng trọ ưng ý, đừng ngần ngại nói với chúng tôi</p>
                        <a class="view-detail-btn" href=""><i class="fas fa-phone-alt"></i> Contact Us</a> </div>
                    <!-- help us end -->
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- ================ Detail page end ================ -->
@endsection
@push('footer')
    <script>
        $(document).ready(function(){
            load_comment();

            function load_comment(){
                var room_id=$('#room_id').val();
                var _token = $('input[name="_token"]').val();
                // alert(post_id);
                $.ajax({
                    url: '{{route('customer.rooms.load_comment')}}',
                    type: "POST",
                    data: {_token:_token, room_id: room_id},

                    success:function(data){
                        // console.log(data)
                        $('#comment_show').html(data);
                    }
                });

            }
            // load_comment();


            $('#send-comment').click(function(){
                var room_id=$('#room_id').val();
                var _token = $('input[name="_token"]').val();
                var name = $('#cmt-name').val();
                var content = $('#cmt-content').val();
                var phone = $('#cmt-phone').val();
                var user_id = $('#cmt-user').val();
                var rating = $('input[name="rating"]:checked').val();


                $.ajax({
                    url: '{{route('customer.rooms.send_comment')}}',
                    type: "POST",
                    data: {_token:_token, room_id: room_id, name: name, content: content, phone: phone, user_id: user_id, rating: rating},

                    success:function(data){
                        $('#notify').html('<p style="margin-top: 10px">Thêm bình luận thành công! Đang chờ duyệt.</p>');
                        load_comment();
                        $('#notify').fadeOut(5000);
                        $('.comment-content').val('');
                        // console.log(data);
                    }
                });
            });
            // load_comment();

        })

    </script>
@endpush

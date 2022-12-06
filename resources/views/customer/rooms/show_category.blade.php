@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- ================ Listing page ================ -->
    <div class="listing-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside>
                        <!-- sidebar -->
                        <div class="desktop-filter-sidebar">
                            <!-- filter widget -->
                            <div class="filter-widget mb-20">
                                <div class="accordion filter-accordion" id="filter-widget-accordion4-d">
                                    <div class="card">
                                        <div class="card-header" id="headingOne4-d"> <a class="btn btn-link w-100 text-left" href="" data-toggle="collapse" data-target="#collapseOne4-m" aria-expanded="true" aria-controls="collapseOne4-m">
                                                <!-- title widget -->
                                                <div class="filter-title-widget">
                                                    <h3>Phòng trọ <i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h3>
                                                </div>
                                                <!-- title widget end -->
                                            </a> </div>
                                        <div id="collapseOne4-m" class="collapse show mt-10" aria-labelledby="headingOne4-d" data-parent="#filter-widget-accordion4-d">
                                            <div class="card-body">
                                                <ul class="list-inline select-all mb-10">
                                                    <li class="list-inline-item">Danh sách gồm {{count($rooms)}} phòng trọ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- filter widget end -->
                                <!-- filter widget -->
                                <div class="filter-widget mb-20">
                                    <div class="accordion filter-accordion" id="filter-widget-accordion-d">
                                        <div class="card">
                                            <div class="card-header" id="headingOne-d"> <a class="btn btn-link w-100 text-left" href="" data-toggle="collapse" data-target="#collapseOne-m" aria-expanded="true" aria-controls="collapseOne-m">
                                                    <!-- title widget -->
                                                    <div class="filter-title-widget">
                                                        <h3>Giá <i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h3>
                                                    </div>
                                                    <!-- title widget end -->
                                                </a> </div>
                                            <div id="collapseOne-m" class="collapse show mt-10" aria-labelledby="headingOne-d" data-parent="#filter-widget-accordion-d">
                                                <div class="card-body">
                                                    <select class="form-control" name="filter-price" id="filter-price">
                                                        <option >Chọn...</option>
                                                        <option value="0">Dưới 1 triệu</option>
                                                        <option value="1">Từ 1 triệu đến 2 triệu</option>
                                                        <option value="2">Từ 2 triệu đến 3 triệu</option>
                                                        <option value="3">Trên 3 triệu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-widget mb-20">
                                    <div class="accordion filter-accordion" id="filter-widget-accordion3-d">
                                        <div class="card">
                                            <div class="card-header" id="headingOne3-d"> <a class="btn btn-link w-100 text-left" href="" data-toggle="collapse" data-target="#collapseOne3-m" aria-expanded="true" aria-controls="collapseOne3-m">
                                                    <!-- title widget -->
                                                    <div class="filter-title-widget">
                                                        <h3>Các tiện ích<i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h3>
                                                    </div>
                                                    <!-- title widget end -->
                                                </a> </div>
                                            <form>
                                                <div id="collapseOne3-m" class="collapse show mt-10" aria-labelledby="headingOne3-d" data-parent="#filter-widget-accordion3-d">
                                                    <div class="card-body">
                                                        <ul class="list-inline select-all mb-10">
                                                            <li class="list-inline-item"> <a href="">Tất cả</a> </li>
                                                            <li class="list-inline-item"><a href="">Bỏ chọn</a></li>
                                                        </ul>
                                                        <div class="filter-checkbox-widget">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="service" value="gac" id="filter-gac" type="checkbox">
                                                                <label class="form-check-label">Có gác</small> </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="service" value="maylanh" id="filter-maylanh" type="checkbox">
                                                                <label class="form-check-label">Tủ lạnh</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="service" value="bep" id="filter-bep" type="checkbox">
                                                                <label class="form-check-label">Chỗ nấu ăn</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- filter widget end -->
                                <!-- help us -->
                                <div class="help-us mb-30">
                                    <h3>Bạn chưa tìm được phòng trọ ưng ý?</h3>
                                    <p>Đừng ngần ngại hãy liên hệ với chúng tôi về yêu cầu của bạn, chúng tôi sẽ cung cấp cho bạn những kết quả  phù hợp nhất</p>
                                    <a class="view-detail-btn" href=""><i class="fas fa-phone-alt"></i>Liên hệ</a> </div>
                                <!-- help us end -->
                            </div>
                            <!-- sidebar end -->
                        </div>
                    </aside>
                </div>

                <div class="col-lg-9" id="list">
                    <!-- hotel results list -->
                    @foreach($rooms as $room)
                        @php
                            $serviceRooms = \App\Models\ServiceRoom::where('room_id', $room->id)->get();
                        @endphp
                        <div class="hotel-results-list">
                            <!-- list box -->
                            <div class="list-box mb-30">
                                <div class="owl-carousel list-box-carousel">
                                    @foreach($images as $image)
                                        @if($room->id == $image->room_id)
                                            @php
                                                $image_path = $image->image_path;
                                            @endphp
                                            <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" alt="img description" width="300px" height="208px"> </figure>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="list-box-content">
                                    <div class="list-box-title">
                                        <h3>{{$room->name}}<span>{{number_format($room->cost)}} VND<em></em></span></h3>
                                    </div>
                                    @php
                                        $sum_ratings=0;
                                        $avarage_rating=0;
                                        $sum =0;
                                        $ratings = \App\Models\Comment::where('room_id', $room->id)->where('status',1)->where('rating','!=',null)->get();
                                        $sum_ratings = count($ratings);
                                        if ($sum_ratings==0){
                                            $avarage_rating=0;
                                        }
                                        else{
                                             foreach ($ratings as $rating)
                                             {
                                                $sum+=$rating->rating;
                                             }
                                             $avarage_rating = ($sum)/($sum_ratings);
                                        }
                                    @endphp
                                    @if($avarage_rating==0)
                                        <div class="list-box-rating"> <span class="at-stars">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                    </span> <em>Chưa có đánh giá</em>
                                        </div>
                                    @else
                                        <div class="list-box-rating"> <span class="at-stars">
                                            @for($i=0;$i<$avarage_rating;$i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                        </span> <em>{{$sum_ratings}} đánh giá</em>
                                        </div>
                                    @endif
                                    <ul class="hotel-featured">
                                        <p>{{$room->short_intro}}</p>
                                        <li>
                                            <input type="hidden" id="room_id" value="{{$room->id}}">
                                            <a href="{{route('customer.add_wistlist', ['id'=>$room->id])}}" id="btn-wishlist"><i class="fa fa-heart"></i></a>
                                        </li>
                                    </ul>
                                    <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="{{route('customer.rooms.details', ['id'=>$room->id])}}">Chi tiết</a>
                                        @if($room->status==0)
                                            <a class="book-now-btn ml-6" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt ngay</a>
                                        @else
                                            <button class="btn btn-outline-danger">Hết phòng</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- list box end -->
                            <!-- list box -->
                            <!-- list box end -->
                        </div>
                    @endforeach
                    <!-- hotel results list end -->
                    <!-- pagination -->
                    <ul class="pagination pagination-box mb-30">
                        <ul class="pagination pagination-box mb-30">
                            {!!$rooms->links('pagination::bootstrap-4')!!}
                        </ul>
                    </ul>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ Listing page end ================ -->

    <a href="#" class="scroll-top">Top</a>
    <!-- ================ Top scroll end ================ -->

    <!-- Modify search modal -->
    <div class="modal fade" id="modify-search-Modal" tabindex="-1" role="dialog" aria-labelledby="modify-search-Modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modify-search-Modal1">Modify Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <form class="form-style-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search City">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="check-in" placeholder="Check In">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="check-out" placeholder="Check Out">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Hotel">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Near Area</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Hotel class</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Adult(s)(18+)</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Children(0-17)</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-style-1 w-100">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modify search modal end -->
@endsection

@push('footer')
    <script>
        $(document).ready(function(){

            $("#filter-price").on('change', function(){
                var filter = $(this).val();
                console.log(filter);
                $.ajax({
                    url: '{{route('customer.posts.filter_price')}}',
                    type: "GET",
                    data: {'filter': filter},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                });
            });

            $(document).on('click', '.filter-checkbox-widget', function (){
                var services=[];
                $('input[name="service"]:checked').each(function (element){
                    services.push($('input[name="service"]:checked')[element].value);
                    // console.log(services);
                });
                $.ajax({
                    url: '{{route('customer.rooms.filter_service')}}',
                    type: "GET",
                    data: {services: services},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                });
            })




            $("#btn-wishlist").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // var room_id = $(this).closest('#btn-wishlist').find('room_id').val();
                var room_id = $('#room_id').val();
                var _token = $('input[name="_token"]').val();
                // console.log(room_id);
                $.ajax({
                    url: '/customer/wishlist/' +room_id,
                    type: "POST",
                    data: {room_id: room_id, _token:_token},
                    success: function (result) {
                        // alert('Thêm vào yêu thích thành công!');

                    }
                });

            })
        })
    </script>
@endpush


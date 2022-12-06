
@foreach($rooms as $room)
    <div class="hotel-results-list">
        <!-- list box -->
        <div class="list-box mb-30">
            <div class="owl-carousel list-box-carousel">
                @foreach($images as $image)
                    @if($room->id == $image->room_id)
                        @php
                            $image_path = $image->image_path;
                        @endphp
                    @endif
                @endforeach
                    <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" width="300px" height="260px" alt="img description"> </figure>
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

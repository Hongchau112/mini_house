
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
                    <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" width="300px" height="207px" alt="img description"> </figure>
            </div>
            <div class="list-box-content">
                <div class="list-box-title">
                    <h3>Phòng {{$room->name}}<span>{{number_format($room->cost)}} VND<em></em></span></h3>
                </div>
                <div class="list-box-rating"> <span class="at-stars"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> </span> <em>1000 review</em> </div>
                <ul class="hotel-featured">
                    @if($room->bep==1)
                        <li><span><i class="fas fa-home"></i> Bếp nấu ăn</span></li>
                    @endif
                    @if($room->gac==1)
                        <li><span><i class="fas fa-home"></i> Phòng có gác</span></li>
                    @endif
                    @if($room->maylanh==1)
                        <li><span><i class="fas fa-sad-cry"></i> Máy lạnh</span></li>
                    @endif
                    <li>
                        <input type="hidden" id="room_id" value="{{$room->id}}">
                        <a href="{{route('customer.add_wistlist', ['id'=>$room->id])}}" id="btn-wishlist"><i class="fa fa-heart"></i></a>
                    </li>
                </ul>
                <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">View Details</a> <a class="book-now-btn ml-6" href="">Book Now</a> </div>
            </div>
        </div>
        <!-- list box end -->
        <!-- list box -->
        <!-- list box end -->
    </div>
@endforeach

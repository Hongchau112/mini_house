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
            @foreach($rooms as $room)
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="{{route('admin.rooms.show', ['id'=>$room->id])}}">
                            @foreach($images as $image)
                            @if($room->id == $image->room_id)
                                @php
                                    $image_path = $image->image_path;
                                @endphp
                            @endif
                            @endforeach
                                <img class="card-img-top" src="{{asset('/images/'.$image_path)}}" width="350px" height="300px" alt="">
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
                            @foreach($room_category as $room_cate_sub)
                                @if($room->room_type_id == $room_cate_sub->id)
                                    <li><a class="text-dark" href="#">{{$room_cate_sub->name}}</a></li>
                                @endif
                            @endforeach
                            @if($room->status==0)
                                <li><a href="#">- Còn phòng</a></li>
                                @else
                                    <li><a href="#">- Hết phòng</a></li>
                            @endif
                        </ul>
                        <h5 class="product-title"><a href="{{route('admin.rooms.show', ['id'=>$room->id])}}">{{$room->name}}</a></h5>
                        <div class="product-price text-primary h5"><small class="text-muted del fs-13px"></small>{{number_format($room->cost)}} đ</div>
                    </div>
                </div>
            </div><!-- .col -->
            @endforeach
        </div>
    </div><!-- .nk-block -->
@endsection

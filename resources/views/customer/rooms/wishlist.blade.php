{{--@extends('customer.login.layout', [--}}
{{--    'title' => ( $title ?? 'Trang chủ' )--}}
{{--])--}}
{{--@section('content')--}}
{{--    @if (session('error'))--}}
{{--        <div class="alert alert-danger">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if (session('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <style>--}}
{{--        .container {--}}
{{--            padding: 2rem 0rem;--}}
{{--        }--}}

{{--        h4 {--}}
{{--            margin: 2rem 0rem 1rem;--}}
{{--        }--}}

{{--        .table-image {--}}
{{--        td, th {--}}
{{--            vertical-align: middle;--}}
{{--        }--}}
{{--        }--}}
{{--    </style>--}}

{{--    <div class="container" style="margin-top: 108px;">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <table class="table table-image">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">STT</th>--}}
{{--                        <th scope="col">Ảnh</th>--}}
{{--                        <th scope="col">Phòng</th>--}}
{{--                        <th scope="col">Trạng thái</th>--}}
{{--                        <th scope="col">Đặt phòng</th>--}}
{{--                        <th scope="col">Xóa</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @php--}}
{{--                    $i=1;--}}
{{--                    $image_path='';--}}
{{--                    @endphp--}}
{{--                    @if($wishlists->count()>0)--}}
{{--                        @foreach($wishlists as $wishlist)--}}
{{--                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa phòng trong Danh sách yêu thích</h1>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h5>Bạn có muốn xóa phòng đã chọn ra khỏi danh sách yêu thích?</h5>--}}
{{--                                            <input type="hidden" value="{{$wishlist->id}}" id="wishlist_id">--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>--}}
{{--                                            <button type="button" class="btn btn-primary">Xóa</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        <tr>--}}
{{--                            <th scope="row">{{$i}}</th>--}}
{{--                            <td class="w-25">--}}
{{--                                @php--}}
{{--                                foreach($images as $image)--}}
{{--                                    if($image->room_id==$wishlist->room_id){--}}
{{--                                        $image_path = $image->image_path;--}}
{{--    //                                    dd($image_path);--}}
{{--                                    }--}}
{{--                                @endphp--}}
{{--                                <img src="{{asset('/images/'.$image_path)}}" class="img-fluid img-thumbnail" alt="Sheep">--}}
{{--                            </td>--}}
{{--                            @foreach($rooms as $room)--}}
{{--                                @if($room->id==$wishlist->room_id)--}}
{{--                                    <td>{{$room->name}}</td>--}}
{{--                                    @if($room->status==0)--}}
{{--                                        <td class="dot-danger">Phòng trống</td>--}}
{{--                                        <td><button type="button" class="btn btn-primary btn-sm btn-success"><a style="color: white; text-decoration: none" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt ngay</a></button>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td>Hết phòng</td>--}}
{{--                                        <td>Không thể đặt</td>--}}
{{--                                    @endif--}}
{{--                            <td><button type="button" class="btn btn-outline-danger" id="delete_wish" value="{{$wishlist->id}}" style="height: 30px;font-size: 12px;"><a href="{{route('customer.wishlist.delete', ['id'=>$wishlist->id])}}" >X</a></button></td>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

{{--                        </tr>--}}
{{--                            @php--}}
{{--                            $i++;--}}
{{--                            @endphp--}}
{{--                        @endforeach--}}
{{--                    @else--}}
{{--                        <p>Bạn chưa có mục yêu thích nào!</p>--}}
{{--                    @endif--}}
{{--                    <tr>--}}
{{--                        <td colspan="4"></td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@push('footer')--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('#delete_wish').click(function(e){--}}
{{--                e.preventDefault();--}}

{{--                var wishlist_id = $(this).val();--}}
{{--                $('#wishlist_id').val(wishlist_id);--}}
{{--                $('#deleteModal').modal('show');--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}



@extends('customer.login.layout', [
    'title' => ( $title ?? 'Cập nhật thông tin' )
])
@section('content')

    <div class="about-page pt-70 pb-60" style="margin-top: 100px;">
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
        @if (session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif
        <table class="table table-hover" style="width: 80%; margin: 108px 0 200px 170px;">
            <thead style="background-color: #ade6b8;">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Mã phòng</th>
                <th scope="col">Tên phòng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tùy chọn</th>
            </tr>
            </thead>
            <tbody style="background-color: aliceblue;">
                @php
                $i=1;
                $image_path='';
                @endphp
            @if($wishlists->count()>0)
                @foreach($wishlists as $wishlist)
                    <tr>
                    @foreach($rooms as $room)
                        @if($wishlist->room_id==$room->id)
                            <td>{{$i}}</td>
                                <td class="w-25">
                                    @php
                                        $image_path = \App\Models\Image::where('room_id', $room->id)->get()->first();
                                    @endphp
                                    <img src="{{asset('/images/'.$image_path->image_path)}}" class="img-fluid img-thumbnail" style="width: 202px;
    height: 142px;" alt="Sheep">
                                </td>
                            <th scope="row">{{$room->room_sku}}</th>

                            <td>{{$room->name}}</td>

                            @if($room->status==0)
                                <td> <span  class="btn btn-warning" style="color: white; font-size: 12px">Còn phòng</span></td>
                                <td><button type="button" class="btn btn-primary btn-sm btn-success"><a style="color: white; text-decoration: none" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt ngay</a></button></td>
                            @elseif($room->status==1)
                                <td style="color: green;"><span  class="btn btn-outline-warning" style="font-size: 12px;font-size: 12px;background-color: beige;">Hết phòng</span></td>
                                <td><button type="button" class="btn btn-danger" style="font-size: 12px;"><a style="color: white" href="{{route('customer.wishlist.delete', ['id'=>$wishlist->id])}}" >X</a></button></td>

                                @endif
                        @endif

                    @endforeach
                </tr>
                    @php
                        $i+=1;
                    @endphp
                @endforeach

            @else
                <p>Bạn chưa có mục yêu thích nào!</p>
            @endif


            </tbody>
        </table>
    </div>
@endsection

@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
    <div class="detail-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-30">
                    <form class="form-style-1" action="{{route('customer.booking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Họ và tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name" id="user-name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{$user->phone}}" id="phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label>
                                    <select class="form-control" name="sex">
                                        <option value="0">- Chọn -</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày sinh<span class="text-danger">*</span></label>
                                    <input name="birthday" type="text" id="datepickerdob" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <button type="submit" class="btn-style-1">Tiếp tục với thanh toán</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4">
                    <aside>
                        <!-- help us -->
                        <div class="help-us mb-30">
                            <h3>Liên hệ với chúng tôi để đặt phòng trọ</h3>
                            <p>Bạn là sinh viên, người đi làm chưa tìm được nhà trọ ưng ý? Liên hệ với chúng tôi để được tư vấn nhà trọ một cách nhanh chóng</p>
                            <a class="view-detail-btn" href=""><i class="fas fa-phone-alt"></i>Gọi ngay</a> </div>
                        <!-- help us end -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

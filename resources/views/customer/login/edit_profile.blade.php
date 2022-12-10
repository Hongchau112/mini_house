@extends('customer.login.layout', [
    'title' => ( $title ?? 'Cập nhật thông tin' )
])

@section('content')
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
        .img-account-profile {
            height: 13rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
    </style>
    <div class="contact-us-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-30">
                    <!-- contact form -->
                    <form class="form-style-1" method="post" enctype="multipart/form-data" action="{{route('customer.update_profile', ['id'=>$user->id])}}">
                        @csrf
                        <h4 class="mb-6">Cập nhật thông tin của bạn</h4>
                        <p>Vui lòng điền vào các thông tin bên dưới nhé</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Họ và tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                                <div><span class="text-danger">@error('name'){{$message}}@enderror</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label>

                                    <div style="margin-top: 15px;">
                                        <label class="radio-inline" style="margin-right: 30px;">
                                            <input type="radio" name="sex" value="male" {{$user->sex=='male' ? 'checked' : ''}}> Nam
                                        </label>
                                        <label class="radio-inline" style="margin-right: 30px;">
                                            <input type="radio" name="sex" value="female" {{$user->sex=='female' ? 'checked' : ''}}> Nữ
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="other" {{$user->sex=='other' ? 'checked' : ''}}> Khác
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                    <div><span class="text-danger">@error('phone'){{$message}}@enderror</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Ngày sinh <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="birthday" value="{{$user->birthday}}" class="form-control date-picker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="customFileLabel">Ảnh đại diện</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="custom-file-input" id="avatar">
                                            <label class="custom-file-label" for="avatar">Chọn ảnh khác</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn-style-1" style="margin-left: 200px;">Cập nhật</button>
                    </form>
                    <!-- contact form end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- contact info -->
                    <div class="contact-info">
                        <!-- contact info box -->
                        <div class="contact-info-box mb-30">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Ảnh đại diện</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="" src="{{asset('images/' .$user->avatar)}}" alt="">
                                    <!-- Profile picture help block-->
{{--                                    <div class="small font-italic text-muted mb-4">File hình ảnh</div>--}}
                                    <!-- Profile picture upload button-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- contact info end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ Contact Us page end ================ -->
@endsection

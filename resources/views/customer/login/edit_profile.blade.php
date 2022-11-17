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
    <div class="contact-us-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-30">
                    <!-- contact form -->
                    <form class="form-style-1" method="post" enctype="multipart/form-data" action="{{route('customer.update_profile', ['id'=>$user->id])}}">
                        @csrf
                        <h4 class="mb-6">Cập nhật thông tin của bạn</h4>
                        <p>Vui lòng điền vào các thông tin bên dưới nhé</p>
                        <div class="row" style="margin-bottom: 35px;" >
                            <div class="col-lg-12">
                                <input type="file" name="avatar">
                            </div>
                        </div>
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
                                    <label>Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                    <div><span class="text-danger">@error('phone'){{$message}}@enderror</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nghề nghiệp</label>
                                    <select class="form-control" name="subject">
                                        <option>Chọn...</option>
                                        <option value="student">Sinh viên</option>
                                        <option value="worker">Người đi làm</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-style-1">Cập nhật</button>
                    </form>
                    <!-- contact form end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- contact info -->
                    <div class="contact-info">
                        <!-- contact info box -->
                        <div class="contact-info-box mb-30">
                            <h5 class="mb-8">Visit our location</h5>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit amet consectetur.</p>
                        </div>
                        <!-- contact info box end -->
                        <!-- contact info box -->
                        <div class="contact-info-box mb-30">
                            <h5 class="mb-8">Message us</h5>
                            <p class="mb-6"><a href="">info@exampal.com</a></p>
                            <p class="mb-6"><a href="">+01 123 456 789</a></p>
                        </div>
                        <!-- contact info box end -->
                        <!-- contact info box -->
                        <div class="contact-info-box mb-30">
                            <h5 class="mb-8">Follow Us</h5>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                                <li class="list-inline-item"><a href=""><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <!-- contact info box end -->
                        <!-- map -->
                        <div class="map mb-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60476188.16845563!2d73.1701248!3d22.3092736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1576060813943!5m2!1sen!2sin"></iframe>
                        </div>
                        <!-- map end -->
                    </div>
                    <!-- contact info end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================ Contact Us page end ================ -->
@endsection

@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm phòng' )
])

@section('content')
    <form action="/admin/store" method="POST">
        @csrf
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-des">
                        <p>Tạo phòng</p>
                    </div>
                </div>
            </div>
                <div class="row g-gs">
                    <div class="col-md-6" style="margin-left: 300px;">
                        <div class="card card-bordered h-100" style="background-color: #e2e6ea;">
                            <div class="card-inner">
                                <form action="#" class="form-validate">
                                    <div class="form-group">
                                        <label class="form-label">Chọn ảnh</label>
                                        <div class="upload-zone" data-accepted-files="image/*">
                                            <div class="dz-message" data-dz-message>
                                                <span class="dz-message-text">Drag and drop file</span>
                                                <span class="dz-message-or">or</span>
                                                <button class="btn btn-primary">SELECT</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-sm ckeditor" id="description" name="description"  required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="food_category_id">Danh mục phòng <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" data-search="on" name="food_category_id" id="food_category_id">
                                                <option value="0">Danh mục gốc</option>
                                                @foreach ($room_category as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gy-4 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Giá người">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Giá phòng">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Input Regular">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="preview-title overline-title" style="margin-top: 20px;">Tiện ích <span class="text-danger">*</span> </span>
                                        <div class="g-3 align-center flex-wrap">
                                            <div class="g">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">Máy lạnh</label>
                                                </div>
                                            </div>
                                            <div class="g">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Bếp nấu ăn</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-5">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .nk-block -->
        {{--    <div class="form-group">--}}
        {{--        <label for="name" style="font-weight: bold">Tên *</label>--}}
        {{--        <input type="text" class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên">--}}
        {{--    </div>--}}
        {{--    <div class="form-group" >--}}
        {{--        <label for="email" style="font-weight: bold">Email *</label>--}}
        {{--        <input type="email" class="form-control" name="email"id="email"  placeholder="Vui lòng nhập địa chỉ email">--}}
        {{--    </div>--}}
        {{--    <div class="form-group">--}}
        {{--        <label for="phone" style="font-weight: bold">Số điện thoại *</label>--}}
        {{--        <input type="text" class="form-control" name="phone"id="phone"  placeholder="Vui lòng nhập số điên thoại">--}}
        {{--    </div>--}}
        {{--    <div class="form-group">--}}
        {{--        <label for="new_password" style="font-weight: bold">Mật khẩu *</label>--}}
        {{--        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Vui lòng nhập mật khẩu">--}}
        {{--    </div>--}}
        {{--    <div class="form-group">--}}
        {{--        <label for="new_password_confirmation" style="font-weight: bold">Xác nhận mật khẩu *</label>--}}
        {{--        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu">--}}
        {{--    </div>--}}
        {{--    <button type="submit" class="btn btn-primary">Tạo</button>--}}
    </form>


{{--    <div class="card card-bordered">--}}
{{--        <div class="card-inner">--}}
{{--            <div class="nk-block">--}}
{{--                <div class="row g-gs">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="card-inner card-inner-sm">--}}
{{--                            <form action="/admin/rooms/store" method="post" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="name">Tiêu đề <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tiêu đề" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <!-- Ảnh-->--}}


{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="image">Ảnh<span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input style="line-height: 15px"  type="file" class="form-control" name="file[]" accept="image/*" multiple>--}}
{{--                                            --}}{{--                                            <label class="custom-file-label" for="customFile">Chọn tệp</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                --}}{{--                                <div class="form-group">--}}
{{--                                --}}{{--                                    <input style="line-height: 15px"  type="file" class="form-control" name="file[]" accept="image/*" multiple>--}}
{{--                                --}}{{--                                    <span  id="gallery"></span>--}}
{{--                                --}}{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <textarea class="form-control form-control-sm ckeditor" id="description" name="description"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="food_category_id">Danh mục phòng<span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <select class="form-select" data-search="on" name="food_category_id" id="food_category_id">--}}
{{--                                            <option value="0">Danh mục gốc</option>--}}
{{--                                            @foreach ($room_category as $cate)--}}
{{--                                                <option value="{{$cate->id}}">{{$cate->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="number">Số lượng<span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input class="form-control form-control-sm" id="number" name="number">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="price">Giá <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input class="form-control form-control-sm" id="price" name="price">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row g-3">--}}
{{--                                    <div class="col-lg-6 col-md-8 text-right">--}}
{{--                                        <div class="form-group mt-1 ">--}}
{{--                                            <button type="submit" class="btn btn-primary">Tạo phòng</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div><!-- .nk-block -->--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection


@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="color[' + i +
                ']" placeholder="Nhập màu" class="form-control" /></td> <td><input type="text" name="price['+ i +
                ']" placeholder="Nhập giá" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@endpush




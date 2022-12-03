@extends('admin.posts.layout', [
    'title' => ( $title ?? 'Thêm bài đăng' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Thông tin bài đăng phòng trọ</h5>
            </div>
            <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="form-label">Thêm ảnh <span class="code-class">*</span></label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" required>
                                <label class="custom-file-label" for="image">Chọn...</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-label" for="full-name-1">Tiêu đề <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <label class="form-label" for="description">Nội dung bài đăng <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-sm ckeditor" id="content" name="content"  required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <br>
                <div class="row">
{{--                    <div class="col-lg-4">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="pay-amount-1">Phòng</label>--}}
{{--                            <div class="form-control-wrap">--}}
{{--                                <select class="browser-default custom-select" id="room_id" name="room_id">--}}
{{--                                    <option selected>Chọn phòng</option>--}}
{{--                                    @foreach($rooms as $room)--}}
{{--                                        <option value="{{$room->id}}">{{$room->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="room_type_id">Danh mục bài<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="post_type_id" id="post_type_id">
                                    <option value="0">Danh mục gốc</option>
                                    @foreach ($post_category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-4">
                    <div class="col-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary" style="margin-left: 250px;">Lưu</button>
                            <a  href="{{route('admin.posts.index')}}" class="btn btn-lg btn-danger" style="color: white">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@extends('admin.posts.layout', [
    'title' => ( $title ?? 'Chỉnh sửa bài đăng' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Thông tin phòng trọ</h5>
            </div>
            <form action="{{route('admin.posts.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row g-4">
                    <div class="col-sm-8">
                        <img src="{{asset('/images/posts/'.$post->image)}}" width="150px" height="150px">
                        <div class="form-group">
                            <label class="form-label">Thêm ảnh <span class="code-class">*</span></label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="image" id="image">
                                    <label class="custom-file-label" for="image">Chọn...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Tiêu đề <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="{{$post->title}}" id="title" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label" for="description">Giới thiệu<span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-sm ckeditor" id="content" name="content"  required> {{$post->intro}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label" for="description">Nội dung bài đăng <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-sm ckeditor" id="content" name="content"  required> {{$post->content}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="room_type_id">Danh mục bài<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="post_type_id" id="post_type_id">
                                    <option {{($post->post_type_id == 0) ? 'selected' : ''}} value="0">Thư mục gốc</option>
                                    @foreach ($post_category as $cate)
                                        <option {{($cate->id == $post->post_type_id) ? 'selected' : ''}} value="{{$cate->id}}">{{$cate->name}}</option>
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


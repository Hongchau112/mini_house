@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm bài đăng' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Thông tin bài đăng phòng trọ</h5>
            </div>
            <form action="{{route('admin.posts.store')}}" method="post">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Tiêu đề <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label" for="description">Nội dung bài đăng <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-sm ckeditor" id="content" name="content"  required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="pay-amount-1">Phòng<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="browser-default custom-select" id="room_id" name="room_id">
                                    <option selected>Chọn phòng</option>
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

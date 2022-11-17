@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Sửa thông tin phòng trọ' )
])

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-12">
                        <div class="card-inner card-inner-sm">
                            <form action="{{route('admin.rooms.update', ['id'=>$room->id])}}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="row g-gs">
                                    <div class="col-md-12" style="">
                                        <div class="card card-bordered h-100" style="background-color: #e2e6ea;">
                                            <div class="card-inner">
                                                <div class="form-group" >
                                                    <label for="name" style="font-weight: bold">Phòng <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{$room->name}}" placeholder="Vui lòng nhập tên phòng">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" style="font-weight: bold">Giới thiệu ngắn</label>
                                                    <div class="form-control-wrap">
                                                        <textarea type="text" name="short_intro" class="form-control"  cols="2" placeholder="Giới thiệu ngắn">{{$room->short_intro}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control-sm ckeditor"  id="description" name="description"  required>{{$room->description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="room_type_id">Loại phòng <span class="text-danger">*</span></label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" data-search="on" name="room_type_id" id="room_type_id">
                                                            <option {{($room->room_type_id == 0) ? 'selected' : ''}} value="0">Thư mục gốc</option>
                                                            @foreach ($categories as $cate)
                                                                <option {{($cate->id == $room->room_type_id) ? 'selected' : ''}} value="{{$cate->id}}">{{$cate->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row gy-4 align-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="cost">Giá phòng <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{$room->cost}}" name="cost" id="cost" placeholder="Giá phòng">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <span class="preview-title overline-title" style="margin-top: 20px;">Tiện ích <span class="text-danger">*</span> </span>
                                                    <div class="g-3 align-center flex-wrap">
                                                            @foreach($services as $service)
                                                                <div class="g">
                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"  name="services[]" id="service{{$service->id}}" >
                                                                        <label class="custom-control-label" for="service{{$service->id}}">{{$service->service}}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
@endsection

@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endpush



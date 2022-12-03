@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm phòng trọ' )
])

@section('content')
    <form action="{{route('admin.rooms.store')}}" method="POST" enctype="multipart/form-data" id="save-data">
        @csrf
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-des">
                        <p></p>
                    </div>
                </div>
            </div>
                <div class="row g-gs">
                    <div class="col-md-8" style="margin-left: 150px;">
                        <div class="card card-bordered h-100" style="background-color: #e2e6ea;">
                            <div class="card-inner">
                                    <div class="form-group" >
                                    <label for="name" style="font-weight: bold">Phòng  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Vui lòng nhập tên phòng" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" style="font-weight: bold">Giới thiệu ngắn  <span class="text-danger">*</span> </label>
                                    <div class="form-control-wrap">
                                        <textarea type="text" name="short_intro" class="form-control" cols="2" placeholder="Giới thiệu ngắn" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-sm ckeditor" id="description" name="description"  required></textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="form-label" for="room_type_id">Loại phòng <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" data-search="on" name="room_type_id" id="room_type_id" required>
                                                <option value="0">Danh mục gốc</option>
                                                @foreach ($room_category as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gy-4 align-center">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-outlined" name="cost" id="cost" required>
                                                    <label class="form-label-outlined" for="cost">Giá cho thuê <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-outlined" name="width" id="width" required>
                                                    <label class="form-label-outlined" for="width">Chiều rộng  <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-outlined" name="length" id="length" required>
                                                    <label class="form-label-outlined" for="length">Chiều dài  <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="preview-title overline-title" style="margin-top: 20px;">Tiện ích <span class="text-danger">*</span> </span>
                                        <div class="g-3 align-center flex-wrap">
                                            <div class="g">
                                                @foreach($services as $service)
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" value="{{$service->id}}" name="services[]" id="{{$service->id}}">
                                                        <label class="custom-control-label" for="{{$service->id}}">{{$service->service}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
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

            </div>
        </div>
    </form>

@endsection





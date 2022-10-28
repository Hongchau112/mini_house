@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Chỉnh sửa thông tin phòng trọ' )
])

@section('content')
    <form action="{{route('admin.rooms.update', ['id'=>$room->id])}}" method="POST" enctype="multipart/form-data" id="save-data">
        @csrf
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-des">
                        <p>Chỉnh sửa thông tin phòng tro</p>
                    </div>
                </div>
            </div>
            <div class="row g-gs">
                <div class="col-md-6" style="margin-left: 300px;">
                    <div class="card card-bordered h-100" style="background-color: #e2e6ea;">
                        <div class="card-inner">
                            <div class="form-group" >
                                <label for="name" style="font-weight: bold">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$room->name}}" placeholder="Vui lòng nhập tên phòng">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-sm ckeditor" id="description" value="{{$room->description}}" name="description"  required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="room_type_id">Danh mục phòng <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <select class="form-select" data-search="on" name="room_type_id" id="room_type_id">
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
                                            <input type="text" class="form-control" name="cost" value="{{$room->cost}}" id="cost" placeholder="Giá phòng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="preview-title overline-title" style="margin-top: 20px;">Tiện ích <span class="text-danger">*</span> </span>
                                <div class="g-3 align-center flex-wrap">
                                    <div class="g">
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="maylanh" id="maylanh">
                                            <label class="custom-control-label" for="maylanh">Máy lạnh</label>
                                        </div>
                                    </div>
                                    <div class="g">
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="bep" id="bep">
                                            <label class="custom-control-label" for="bep">Bếp nấu ăn</label>
                                        </div>
                                    </div>
                                    <div class="g">
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="gac" id="gac">
                                            <label class="custom-control-label" for="gac">Phòng có gác</label>
                                        </div>
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





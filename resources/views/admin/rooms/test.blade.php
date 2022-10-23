@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm phòng' )
])

@section('content')
{{--    <form action="{{route('admin.rooms.store')}}" method="POST" enctype="multipart/form-data" class="dropzone" id="save-data">--}}
{{--        @csrf--}}
{{--        <div class="nk-block nk-block-lg">--}}
{{--            <div class="nk-block-head">--}}
{{--                <div class="nk-block-head-content">--}}
{{--                    <div class="nk-block-des">--}}
{{--                        <p>Tạo phòng</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row g-gs">--}}
{{--                <div class="col-md-6" style="margin-left: 300px;">--}}
{{--                    <div class="card card-bordered h-100" style="background-color: #e2e6ea;">--}}
{{--                        <div class="card-inner">--}}
{{--                            <div class="form-group" >--}}
{{--                                <label for="email" style="font-weight: bold">Name</label>--}}
{{--                                <input type="email" class="form-control" name="name" id="name"  placeholder="Vui lòng nhập tên phòng">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>--}}
{{--                                <div class="form-control-wrap">--}}
{{--                                    <textarea class="form-control form-control-sm ckeditor" id="description" name="description"  required></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label" for="room_type_id">Danh mục phòng <span class="text-danger">*</span></label>--}}
{{--                                <div class="form-control-wrap">--}}
{{--                                    <select class="form-select" data-search="on" name="room_type_id" id="room_type_id">--}}
{{--                                        <option value="0">Danh mục gốc</option>--}}
{{--                                        @foreach ($room_category as $cate)--}}
{{--                                            <option value="{{$cate->id}}">{{$cate->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row gy-4 align-center">--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="form-control-wrap">--}}
{{--                                            <input type="text" class="form-control" placeholder="Giá người">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="form-control-wrap">--}}
{{--                                            <input type="text" class="form-control" name="cost" id="cost" placeholder="Giá phòng">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="form-control-wrap">--}}
{{--                                            <input type="text" class="form-control" placeholder="Input Regular">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <span class="preview-title overline-title" style="margin-top: 20px;">Tiện ích <span class="text-danger">*</span> </span>--}}
{{--                                <div class="g-3 align-center flex-wrap">--}}
{{--                                    <div class="g">--}}
{{--                                        <div class="custom-control custom-control-sm custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="service1">--}}
{{--                                            <label class="custom-control-label" for="service1">Máy lạnh</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="g">--}}
{{--                                        <div class="custom-control custom-control-sm custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="service2">--}}
{{--                                            <label class="custom-control-label" for="service2">Bếp nấu ăn</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-sm-6">--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-7 offset-lg-5">--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <button type="submit" class="btn btn-lg btn-primary">Lưu</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <div class="card-inner">
                            <form method="POST" action="{{route('admin.rooms.test')}}" enctype="multipart/form-data" class="dropzone dz-clickable" id="upload">
                                @csrf
                            <div class="form-group">
                                <div><h3 class="text-center">Upload Image by click on </h3></div>
                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            </div>
                            <div class="col-lg-4 col-sm-6">

                            </div>
                            </form>
    </div>


@endsection


@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script>
        Dropzone.options.imageUpload={
            maxFilesize:1,
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
        }
    </script>
@endpush





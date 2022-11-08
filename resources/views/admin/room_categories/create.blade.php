@extends('admin.room_categories.layout', [
    'title' => ( $title ?? 'Tạo danh mục' )
])

@section('content')
    <div class="col-lg-6" style="margin-left: 300px;">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Thông tin danh mục</h5>
                </div>
                <form action="/admin/room_categories/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="full-name">Tên danh mục</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Mô tả</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pay-amount">Danh mục gốc</label>
                        <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="parent_category_id" id="parent_category_id">
                                <option value="0">Thư mục gốc</option>
                                @foreach ($room_category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    <div class="card card-bordered">--}}
{{--        <div class="card-inner">--}}
{{--            <div class="nk-block">--}}
{{--                <div class="row g-gs">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="card-inner card-inner-sm">--}}
{{--                            <form action="/admin/room_categories/store" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="name">Tên danh mục <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap" >--}}
{{--                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục" required >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="name">Mô tả <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả danh mục" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="parent_category_id">Danh mục cha  <span class="text-danger">*</span></label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <select class="form-select" data-search="on" name="parent_category_id" id="parent_category_id">--}}
{{--                                            <option value="0">Thư mục gốc</option>--}}
{{--                                            @foreach ($room_category as $cate)--}}
{{--                                                <option value="{{$cate->id}}">{{$cate->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row g-3">--}}
{{--                                    --}}{{--                                    <div class="col-lg-6 col-md-4 ">--}}
{{--                                    --}}{{--                                        <div class="form-group mt-3">--}}
{{--                                    --}}{{--                                            <a href="{{ url()->previous() }}"><span class=" text-primary"> <em class="icon ni ni-arrow-long-left"></em>  Quay lại</span></a>--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-8 text-right">--}}
{{--                                        <div class="form-group mt-1 ">--}}
{{--                                            <button type="submit" class="btn btn-primary">Tạo danh mục</button>--}}
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



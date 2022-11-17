@extends('admin.post_categories.layout', [
    'title' => ( $title ?? 'Tạo danh mục' )
])

@section('content')
    <div class="col-lg-6" style="margin-left: 300px;">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Thông tin danh mục</h5>
                </div>
                <form action="/admin/post_categories/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="full-name">Tên danh mục bài</label>
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
                                <option value="0">Danh mục gốc</option>
                                @foreach ($post_category as $cate)
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
@endsection




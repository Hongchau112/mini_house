@extends('admin.post_categories.layout', [
    'title' => ( $title ?? 'Danh mục bài đăng' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(($user->account=='admin') or($user->account=='staff'))
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div>
                                @if($post_category->count() == 0)
                                    <div class="card-inner p-0">
                                        <div class="alert m-0">
                                            <div class="alert alert-warning alert-icon">
                                                <em class="icon ni ni-alert-circle"></em> Bạn chưa có danh mục nào, <a href="{{ route('admin.post_categories.create') }}">tạo danh mục</a>.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    {{--                                                <input type="checkbox" class="custom-control-input" id="pid">--}}
                                                    {{--                                                <label class="custom-control-label" for="pid"></label>--}}
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm" style="font-weight: bold"><span>Danh mục bài</span></div>
                                            <div class="nk-tb-col" style="font-weight: bold"><span>Mô tả</span></div>
                                            <div class="nk-tb-col" style="font-weight: bold"><span>Danh mục cha</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div style="font-weight: bold">Tùy chọn</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach($post_category as $post)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        {{--                                                <input type="checkbox" class="custom-control-input" id="uid{{$cate->id}}">--}}
                                                        {{--                                                <label class="custom-control-label" for="uid{{$cate->id}}"></label>--}}
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{$post->name}}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead">{{$post->description}}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <div>
                                                        <span class="nk-file-icon-type">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                    <g>
                                                                                        <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5" style="fill:#f29611" />
                                                                                        <path d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z" style="fill:#ffb32c" />
                                                                                        <path d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z" style="fill:#f2a222" />
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                        @if ($post->parent_category_id == 0)
                                                            <span class="tb-sub">Thư mục gốc</span>
                                                        @else
                                                            @foreach($post_category as $post_sub)
                                                                @if ($post_sub->id == $post->parent_category_id)
                                                                    <span class="tb-sub">{{$post_sub->name}}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('admin.post_categories.edit', ['id' => $post->id])}}"><em class="icon ni ni-edit"></em><span>Sửa</span></a></li>
                                                                        <li><a href="{{route('admin.post_categories.delete', ['id' => $post->id])}}"><em class="icon ni ni-trash"></em><span>Xóa</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->

                                </div>
                            </div>
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    {!!$post_category->links('pagination::bootstrap-4')!!}
                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    @elseif($user->account=='user')
        <p></p>
    @endif
@endsection





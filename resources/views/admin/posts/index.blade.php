@extends('admin.posts.layout', [
    'title' => ( $title ?? 'Danh sách bài đăng' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($user->hasRole('admin'))
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-des text-soft">
                            <p>Bạn có tổng cộng {{count($posts)}} bài đăng</p>
                        </div>
                        <div>
                            @if($posts->count() == 0)
                                <div class="card-inner p-0">
                                    <div class="alert m-0">
                                        <div class="alert alert-warning alert-icon">
                                            <em class="icon ni ni-alert-circle"></em> Bạn chưa có bài đăng nào, <a href="{{ route('admin.posts.create') }}">tạo bài đăng</a>.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>Open</span></a></li>
                                                    <li><a href="#"><span>Closed</span></a></li>
                                                    <li><a href="#"><span>Onhold</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a></li>
                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    @foreach($posts as $post)

                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="html/apps-kanban.html" class="project-title">
                                                <div class="user-avatar sq bg-purple"><span>DD</span></div>
                                                <div class="project-info">
                                                    @foreach($rooms as $room)
                                                        @if($room->id==$post->room_id)
                                                            <h6 class="title">{{$room->name}}</h6>
                                                        @endif
                                                    @endforeach
                                                        <span class="sub-text">{{$post->room_id}}</span>
                                                </div>
                                            </a>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('customer.posts.details', ['id'=>$post->id])}}" target="_blank"><em class="icon ni ni-eye"></em><span>Xem bài đăng</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Chỉnh sửa bài đăng</span></a></li>
                                                        <li><a href="{{route('admin.posts.delete', ['id'=>$post->id])}}"><em class="icon ni ni-delete"></em><span>Xóa bài</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="gallery-image popup-image" href="">

                                            <img class="w-100 rounded-top" src="{{asset('dashlite/./images/stock/a.jpg')}}" alt="">
                                        </a>
                                        <div class="project-details">
                                            <p>{{$post->title}}</p>
                                        </div>

                                        <div class="project-progress">
                                            <div class="project-progress-details">
                                                <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>3 Tasks</span></div>
                                                <div class="project-progress-percent">93.5%</div>
                                            </div>
                                            <div class="progress progress-pill progress-md bg-light">
                                                <div class="progress-bar" data-progress="93.5"></div>
                                            </div>
                                        </div>
                                        <div class="project-meta">

                                            <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>5 Days Left</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                </div>
            </div><!-- .nk-block -->
        </div>
    @endif
@endsection

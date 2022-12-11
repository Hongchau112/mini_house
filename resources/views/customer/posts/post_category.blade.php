@extends('customer.posts.layout', [
    'title' => ( $title ?? 'Bài đăng' )
])

@section('content')
    <div class="blog-page pt-70 pb-40" style="margin-top: 108px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8"  >
                    @if(count($posts)==0)
                        <h3>Chưa có bài đăng nào!</h3>
                    @elseif(count($posts)>0)
                        <div class="row" id="list">
                            @foreach($posts as $post)
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <!-- blog box -->
                                    <div class="blog-box shadow">
                                        <div class="blog_img mb-20"><img src="{{asset('/images/posts/'.$post->image)}}" alt="" HEIGHT="250px" WIDTH="320PX"></div>

                                        <div class="blog-des">
                                                <h6>{{$post->created_at}}</h6>
                                            <h5 class="mt-10 mb-6"><a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark">{{$post->title}}</a></h5>
                                            <p class="text-muted"></p>
                                            <div class="read_more">
                                                <div class="blog_border"></div>
                                                <a href="{{route('customer.posts.details', ['id'=>$post->id])}}" class="text-dark text-uppercase">Xem bài đăng</a> </div>
                                        </div>
                                    </div>
                                    <!-- blog box end -->
                                </div>

                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <!-- aside -->
                    <aside>
                        <!-- search form -->
                        <form class="search-form mb-50">
                            <input type="text" class="form-control" name="key-search" id="key-search" placeholder="Tìm kiếm ..." value="">
                            <button class="search-submit"><i class="fas fa-search"></i></button>
                        </form>
                        <!-- search form end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Danh mục</h3>
                            <!-- widget title end -->
                            <!-- categories -->
                            <ul class="blog-categorie">
                                @foreach($post_categories as $category)
                                    <li><a href="{{route('customer.post_category', ['id'=> $category->id])}}"><i class="far fa-dot-circle"></i>{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                            <!-- categories end -->
                        </div>
                        <!-- widget end -->
                        <!-- widget -->
                        <div class="widget mb-50">
                            <!-- widget title -->
                            <h3 class="widget-title">Bài đăng gần đây</h3>
                            <!-- widget title end -->
                            <!-- recent post -->
                            <div class="blog-recent-post">
                                <div class="blog-recent-post">
                                    @foreach($post_infos as $post_info)
                                        <!-- recent single post -->
                                        <div class="recent-single-post mb-20">
                                            <div class="post-img"> <a href="{{route('customer.posts.details', ['id'=>$post_info->id])}}"><img src="{{asset('/images/posts/'.$post_info->image)}}" alt=""></a> </div>
                                            <div class="pst-content">
                                                <p><a href="{{route('customer.posts.details', ['id'=>$post_info->id])}}">{{$post_info->title}}</a></p>
                                                <span class="date-type">{{date_format($post_info->created_at,'d-m-Y H:m:s')}}</span> </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- recent post end -->
                        </div>
                        <!-- widget end -->
                        <!-- widget -->
{{--                        <div class="widget mb-30">--}}
{{--                            <!-- widget title -->--}}
{{--                            <h3 class="widget-title">Tags</h3>--}}
{{--                            <!-- widget title end -->--}}
{{--                            <!-- tags -->--}}
{{--                            <div class="blog-tags"> <a href="">Business</a> <a href="">Traveling</a> <a href="">Developement</a> <a href="">Motion</a> <a href="">Writing</a> <a href="">Strategy</a> <a href="">Management</a> </div>--}}
{{--                            <!-- tags end -->--}}
{{--                        </div>--}}
                        <!-- widget end -->
                    </aside>
                    <!-- aside end -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script>
        $(document).ready(function (){
            $("#key-search").on('keyup', function (){
                var search = $(this).val();
                $.ajax({
                    url: '{{route('customer.posts.search')}}',
                    type: "GET",
                    data: {'search': search},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                })
            })
        })
    </script>
@endpush


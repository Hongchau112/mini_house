@extends('guest.pages.layout', [
    'title' => ($title ?? 'Chi tiết món ăn')
])

@section('content')
    <section class="product-detail">
        <div class="container">
            <div class="card-inner">
                <div class="row pb-5" style="margin-right: 0px;">
                    <div class="col-lg-6">
                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <ul id="imageGallery">
                                        @foreach ($images as $i => $image)
                                            <li data-thumb="{{asset('/' . $image->image_path) }}" data-src="{{asset('/' . $image->image_path) }}">
                                                <img  width="100%"  src="{{ asset('/' . $image->image_path) }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Thông tin sản phẩm  -->

                    </div>
                    <div class="col-lg-6">
                        <div class="product-info">
                            <h3 class="product-info-name" >{{ $food->name }}</h3>
                        </div>
                        <div class="product-meta">
                            <ul class="d-flex g-3 gx-5">
                                <li>
                                    <div class="text-muted">Loại</div>
                                    @foreach ($food_categories as $cate)
                                        @if ($food->food_category_id == $cate->id)
                                            <div id="product-info2" class="fw-bold text-secondary text-info">{{ $cate->name }}</div>
                                        @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="product-meta">
                            <h6 class="text-muted">Số lượng món ăn hiện tại</h6>
                            <!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <input class="input-group-field" type="number" id="quantity" name="quantity" value="1" min="1">
                                <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>


                            {{--                            <input name="qty" type="number" min="1"  value="1" />--}}
                            <ul class="custom-control-group">
                                {{$food->number}}
                            </ul>
                            <input type="hidden" name="foods_qty" id="foods_qty" value="{{$food->number}}">
                            <!-- Size-->
                            <ul class="custom-control-group">
                                <input type="hidden" id="food_id" value="{{ $food->id }}">
                                <input type="hidden" id="get_price" value="{{ $food->price }}">
                            </ul>

                        </div><!-- .product-meta -->
                        {{ csrf_field() }}
                        <div class="product-info-quantity">
                            <div class="quantity buttons-added">
                                <div class="qty mt-5">
{{--                                                                        <span class="minus bg-dark">-</span>--}}
{{--                                                                        <input type="number" class="count" name="qty" value="1">--}}
{{--                                                                        <span class="plus bg-dark">+</span>--}}
{{--                                                                        <button onclick="AddCart({{$food->id}})" href="javascript:" class="btn-cart" id="cart-button"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ </button>--}}
                                    <a id="add_cart" href="javascript:" style="background: #fd9d45; border: #fd9d45; font-family: 'tinymce-mobile', sans-serif" class="btn btn-primary btn-more">THÊM VÀO GIỎ</a>
                                </div>
                            </div>
                        </div>

                        <div class="product-info-desc">
                            <div class="text-muted">Chi tiết sản phẩm</div>
                            <div class=class="col-sm-9" id="product-info"><p>{!! $food->description !!}</p></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <!-- xu li chon gia -->


    <!-- slider anh trong product detail -->
    <script>
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:3,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>

    <!-- Thêm sản phẩm vào giỏ-->
    <script>
        $(document).ready(function(){
            $('#add_cart').click(function(){
                // var id=$('#get_price_id').val();
                var food_id=$('#food_id').val();
                var price=$('#get_price').val();
                var qty=$('#quantity').val();
                var food_qty = $('#foods_qty').val();
                console.log(price);
                console.log(qty);
                console.log(food_id);
                if(qty>food_qty)
                {
                    alert("Số lượng món vượt quá số lượng sẵn có");
                }else {
                    $.ajax({
                        url: '/guest/add_cart/' + food_id,
                        type: "GET",
                        data: {price: price, foods_sold: qty, number: food_qty},
                        success: function (result) {
                            alert('Thêm sản phẩm thành công!');
                            window.location.reload(true);
                            $('#cart').html(result);
                        }
                    });
                }
            });
        });

        jQuery(document).ready(function(){
            // This button will increment the value
            $('[data-quantity="plus"]').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name='+fieldName+']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name='+fieldName+']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
        });


    </script>



@endpush


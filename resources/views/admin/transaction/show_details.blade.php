@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Quản lý giao dịch' )
])

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
@section('content')
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #a1c4fd;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1))
        }

        #progressbar-1 {
            color: #455A64;
        }

        #progressbar-1 li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar-1 #step1:before {
            content: "1";
            color: #fff;
            width: 29px;
            margin-left: 22px;
            padding-left: 11px;
        }

        #progressbar-1 #step2:before {
            content: "2";
            color: #fff;
            width: 29px;
        }

        #progressbar-1 #step3:before {
            content: "3";
            color: #fff;
            width: 29px;
            margin-right: 22px;
            text-align: center;
        }

        #progressbar-1 li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #455A64;
            border-radius: 50%;
            margin: auto;
        }

        #progressbar-1 li:after {
            content: '';
            width: 121%;
            height: 2px;
            background: #455A64;
            position: absolute;
            left: 0%;
            right: 0%;
            top: 15px;
            z-index: -1;
        }

        #progressbar-1 li:nth-child(2):after {
            left: 50%
        }

        #progressbar-1 li:nth-child(1):after {
            left: 25%;
            width: 121%
        }

        #progressbar-1 li:nth-child(3):after {
            left: 25%;
            width: 50%;
        }

        #progressbar-1 li.active:before,
        #progressbar-1 li.active:after {
            background: #1266f1;
        }

        .card-stepper {
            z-index: 0
        }
    </style>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="vh-100 gradient-custom-2">
        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.update_status',['id' => $booking->id])}}" method="post">
                        @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label" for="room_type_id">Trạng thái đơn<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="booking_status" id="booking_status">
                                    <option value="pending">Đang xử lý</option>
                                    <option value="booked">Thành công</option>
                                    <option value="hired">Đã vào ở</option>
                                    <option value="cancel">Đã hủy</option>
                                    <option value="refund">Hoàn tiền</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card card-stepper" style="border-radius: 16px;">
                    <div class="card-header p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-2"> Mã đặt phòng: <span class="fw-bold text-body">{{$booking->id}}</span></p>
                                <p class="text-muted mb-0"> Ngày đặt: <span class="fw-bold text-body">{{$booking_detail->date}}</span> </p>
                                <p class="text-muted mb-0"> Người đặt phòng: <span class="fw-bold text-body">{{$user_booked->name}} - {{$user_booked->phone}}</span> </p>

                            </div>
                            <div>
                                @foreach($customer as $cus)
                                    <h6 class="mb-0"> <a href="{{route('admin.customer_profile',['id'=>$cus->id])}}">Người ở</a> </h6>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex flex-row mb-4 pb-2">
                            <div class="flex-fill">
                                <h5 class="bold">{{$room->name}}</h5>
                                <p class="text-muted">{{$room_category->name}}</p>
                                <h4 class="mb-3">{{number_format($booking_detail->total_cost)}} <span class="small text-muted"> đ</span></h4>
                                <p class="text-muted">
                                    @if($booking_detail->payment_method=='cash')
                                    <span class="text-body">Thanh toán tiền mặt</span>
                                    @else
                                        <span class="text-body">Thanh toán qua ví VNPAY</span>
                                    @endif
                                </p>
                                <p class="text-muted"><span class="text-body">Trạng thái đơn: </span></p>

                            </div>
                            <div>
                                <img class="align-self-center img-fluid"
                                     src="{{asset('/images/'.$image->image_path)}}" width="180">
                            </div>
                        </div>
                        <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                            @if($booking_detail->booking_status=='pending')
                                <li class="step0 active" id="step1">
                                    <span style="margin-left: 22px; margin-top: 12px;">Đang xử lý</span>
                                </li>
                                <li class="step0 text-center" id="step2">
                                    <span>Thành công</span>
                                </li>
                                <li class="step0 text-muted text-end" id="step3">
                                    <span
                                        style="margin-right: 25px;">Đã vào ở</span>
                                </li>
                            @elseif($booking_detail->booking_status=='success')
                                <li class="step0 active" id="step1">
                                    <span style="margin-left: 22px; margin-top: 12px;">Đang xử lý</span>
                                </li>
                                <li class="step0 active text-center" id="step2">
                                    <span>Thành công</span>
                                </li>
                                <li class="step0 text-muted text-end" id="step3">
                                    <span
                                        style="margin-right: 25px;">Đã vào ở</span>
                                </li>
                            @elseif($booking_detail->booking_status=='cancel')
                                <li class="step0 active" id="step1">
                                    <span style="margin-left: 22px; margin-top: 12px;">Đang xử lý</span>
                                </li>
                                <li class="step0 active text-center" id="step2">
                                    <span>Xử lý thất bại</span>
                                </li>
                                <li class="step0 active text-muted text-end" id="step3">
                                    <span
                                        style="margin-right: 25px;">Đã hủy</span>
                                </li>
                            @elseif($booking_detail->booking_status=='hired')
                                <li class="step0 active" id="step1">
                                    <span style="margin-left: 22px; margin-top: 12px;">Đang xử lý</span>
                                </li>
                                <li class="step0 active text-center" id="step2">
                                    <span>Thành công</span>
                                </li>
                                <li class="step0 active text-muted text-end" id="step3">
                                    <span
                                        style="margin-right: 25px;">Đã vào ở</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer p-4">
                        <div class="d-flex justify-content-between" style="margin-left: 160px;">
                            <h5 class="fw-normal mb-0"><button id="btn" class="btn btn-success">Cập nhật đơn</button></h5>
{{--                            <h5 class="fw-normal mb-0"><a href="#!">Hủy</a></h5>--}}
                            <div class="border-start h-100"></div>
                            <h5 class="fw-normal mb-0"><a href="#!" class="text-muted"><i class="fas fa-ellipsis-v"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $('#btn').on('click', function (){
            $('#modal').modal('show');
        })

    </script>

@endpush

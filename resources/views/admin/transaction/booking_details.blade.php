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
        table td {
            padding: 10px;
            margin-left: 10px;
            border-bottom: 1px solid #837c7c;
        }
        table{
            border-bottom: 1px solid #837c7c;
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật giao dịch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update_status',['id' => $booking->id])}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label" for="booking_status">Trạng thái đơn<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="booking_status" id="booking_status">
                                    <option value="new" {{$booking->booking_status=='new' ? 'selected' : ''}}>Mới</option>
                                    <option value="pending" {{$booking->booking_status=='pending' ? 'selected' : ''}}>Đang xử lý</option>
                                    <option value="success" {{$booking->booking_status=='success' ? 'selected' : ''}}>Thành công</option>
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
    <div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật giao dịch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.cancel_booking',['id' => $booking->id])}}" method="get">
                    <div class="modal-body">
                        <h5>Bạn có chắc muốn hủy giao dịch đặt phòng này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Hủy đặt phòng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-sm-12 col-lg-12">

                    <div class="card-inner">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: lightgray;">
                                <div class="col-md-10 col-lg-12 col-xl-12">
                                    <div class="card card-stepper" style="border-radius: 16px; font-size: 18px;">
                                        <div class="card-header p-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="col-lg-12">
                                                        <span style="margin-right: 130px">Ngày đặt: </span><span class="fw-bold text-body">{{date_format($booking->created_at, 'd-m-Y H:m:s')}}</span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <span  style="margin-right: 67px"> Người đặt phòng: </span><span class="fw-bold text-body">{{$user_booked->name}}</span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="d-flex flex-row mb-4 pb-2">
                                                <div class="flex-fill" style="margin-left: 40px;">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                Mã phòng:

                                                            </td>
                                                            <td>
                                                                #{{$room->room_sku}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Phòng đặt:

                                                            </td>
                                                            <td>
                                                                {{$room->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Danh mục:

                                                            </td>
                                                            <td>
                                                                {{$room_category->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Thanh toán tiền:

                                                            </td>
                                                            <td>
                                                                {{number_format($booking_detail->total_cost)}} đ
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Phương thức thanh toán:

                                                            </td>
                                                            <td>
                                                                <p class="text-muted">
                                                                    @if($booking_detail->payment_method=='cash')
                                                                        <span class="text-body">Thanh toán tiền mặt</span>
                                                                    @else
                                                                        <span class="text-body">Thanh toán qua ví VNPAY</span>
                                                                    @endif
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td> Thanh toán:

                                                            </td>
                                                            <td>
                                                                <p class="text-muted">
                                                                    @if($booking->payment=='yes')
                                                                        <span class="btn btn-success">Đã thanh toán</span>
                                                                    @elseif($booking->payment=='no')
                                                                        <span class="btn btn-danger">Chưa thanh toán</span>
                                                                    @endif
                                                                </p>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                    <p class="text-muted" style="margin-top: 65px;">
                                                        <span class="text-body" style="margin-right: 20px;">Trạng thái đơn:  </span>
                                                        @if($booking->booking_status=='new')
                                                            <span class="btn btn-warning">Mới</span>
                                                        @elseif($booking->booking_status=='pending')
                                                            <span class="btn btn-primary">Đang xử lý</span>
                                                        @elseif($booking->booking_status=='success')
                                                            <span class="btn btn-success">Thành công</span>
                                                        @elseif($booking->booking_status=='cancel')
                                                            <span class="btn btn-danger">Đã hủy</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div>
                                                    <img class="align-self-center img-fluid"
                                                         src="{{asset('/images/'.$image->image_path)}}" width="320px">
                                                </div>
                                            </div>
                                            <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                                                @if($booking->booking_status=='new')
                                                    <li class="step0 active" id="step1">
                                                        <span style="margin-left: 22px; margin-top: 12px;">Mới</span>
                                                    </li>
                                                    <li class="step0 text-center" id="step2">
                                                        <span>Đang xử lý</span>
                                                    </li>
                                                    <li class="step0 text-muted text-end" id="step3">
                                    <span
                                        style="margin-left: 185px">Thành công</span>
                                                    </li>
                                                @elseif($booking->booking_status=='pending')
                                                    <li class="step0 active" id="step1">
                                                        <span style="margin-left: 22px; margin-top: 12px;">Mới</span>
                                                    </li>
                                                    <li class="step0 text-center active" id="step2">
                                                        <span>Đang xử lý</span>
                                                    </li>
                                                    <li class="step0 text-muted text-end" id="step3">
                                    <span
                                        style="margin-left: 185px">Thành công</span>
                                                    </li>
                                                @elseif($booking->booking_status=='success')
                                                    <li class="step0 active" id="step1">
                                                        <span style="margin-left: 22px; margin-top: 12px;">Mới</span>
                                                    </li>
                                                    <li class="step0 text-center active" id="step2">
                                                        <span>Đang xử lý</span>
                                                    </li>
                                                    <li class="step0 text-muted text-end active" id="step3">
                                    <span
                                        style="margin-left: 185px">Thành công</span>
                                                    </li>
                                                @elseif($booking->booking_status=='cancel')
                                                    <li class="step0 active" id="step1">
                                                        <span style="margin-left: 22px; margin-top: 12px;">Mới</span>
                                                    </li>
                                                    <li class="step0 text-center active" id="step2">
                                                        <span>Đang xử lý</span>
                                                    </li>
                                                    <li class="step0 text-muted text-end active" id="step3">
                                    <span
                                        style="margin-right: 25px;; color:red;">Đã hủy</span>
                                                    </li>

                                                @endif
                                            </ul>
                                        </div>
                                        <div class="card-footer p-4">
                                            <div class="d-flex justify-content-between" style="margin-left: 400px;">
                                                <h5 class="fw-normal mb-0">
                                                    @if(($booking->booking_status=='new') or ($booking->booking_status=='pending'))
                                                        <button id="btn" class="btn btn-success">Cập nhật đơn</button>
                                                        <button id="cancel_booking" class="btn btn-danger" >Hủy đơn</button>
                                                    @endif
                                                </h5>
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
                    </div><!-- .card-inner -->
            </div><!-- .col -->
            @foreach($customers as $customer)
                <div class="col-sm-6 col-lg-4" style="margin-left: 25px;">
                <div class="card card-bordered" style="background-color: lightcyan;">
                    <div class="card-inner">
                        <div class="team">
                            <div class="team-options">
                            </div>
                            <div class="user-card user-card-s2">
                                <h4>Người ở trọ</h4>
                                <div class="user-info">
                                    <h6>{{$customer->name}}</h6>
                                </div>
                            </div>
                            <ul class="team-info">
                                <li><span>Giới tính</span>
                                    <span>Nữ</span></li>
                                <li><span>Số điện thoại</span><span>{{$customer->phone}}</span></li>
                                <li><span>CCCD/CMND</span><span>{{$customer->identified_no}}</span></li>
                                <li><span>Ngày sinh</span><span>{{($customer->birthday)}}</span></li>
                                <li><span>Địa chỉ</span><span>{{$customer->address}}</span></li>

                            </ul>
{{--                            <div class="team-view">--}}
{{--                                <a href="#" class="btn btn-block btn-dim btn-primary"><span></span></a>--}}
{{--                            </div>--}}
                        </div><!-- .team -->
                    </div><!-- .card-inner -->
                </div><!-- .card -->
            </div><!-- .col -->
            @endforeach
        </div>
    </div><!-- .nk-block -->
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

        $('#cancel_booking').on('click', function (){
            $('#cancel_modal').modal('show');
        })

    </script>

@endpush

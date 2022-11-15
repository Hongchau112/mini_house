@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Quản lý giao dịch' )
])

@section('content')
    <div class="nk-block">
        <div class="invoice">
            <div class="invoice-action">
{{--                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>--}}
            </div><!-- .invoice-actions -->
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img src="" srcset="" alt="">
                </div>
                <div class="invoice-head">
                    <div class="invoice-contact">
                        <span class="overline-title">Người giao dịch</span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{$customer->name}}</h4>
                            <ul class="list-plain">
                                <li><em class="icon ni ni-map-pin-fill">{{$customer->address}}</em><span></span></li>
                                <li><em class="icon ni ni-call-fill"></em><span>{{$customer->phone}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-desc">
                        <h3 class="title">Hóa đơn</h3>
                        <ul class="list-plain">
                            <li class="invoice-id"><span>Mã giao dịch</span>:<span>{{$transaction->transaction_id}}</span></li>
                            <li class="invoice-date"><span>Ngày giao dịch</span>:<span>{{$transaction->time}}</span></li>
                        </ul>
                    </div>
                </div><!-- .invoice-head -->
                <div class="invoice-bills">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="w-150px">Đặt phòng</th>
                                <th class="w-60">Danh mục</th>
                                <th>Số người ở</th>
                                <th>Tiền phòng</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td>$78.75</td>
                                <td>1</td>
                                <td>$78.75</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Subtotal</td>
                                <td>$435.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Processing fee</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">TAX</td>
                                <td>$43.50</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Grand Total</td>
                                <td>$478.50</td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div><!-- .nk-block -->
@endsection

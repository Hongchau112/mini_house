@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')

    <style>
        .form-group.error input {
            border-color: red;

        }

        .error {
            color: red;
        }

        .radios {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .radios:after {
            content: "";
            clear: both;
        }

        .radio {
            border: 1px solid #ccc;
            box-sizing: border-box;
            float: left;
            height: 70px;
            position: relative;
            width: 120px;
        }

        .radio label {
            background: #fff no-repeat center center;
            bottom: 1px;
            cursor: pointer;
            display: block;
            font-size: 0;
            left: 1px;
            position: absolute;
            right: 1px;
            text-indent: 100%;
            top: 1px;
            white-space: nowrap;
        }

        .radio + .radio {
            margin-left: 25px;
        }

        .pagseguro label {
            background-image: url(https://dl.dropbox.com/s/yvzrr9o54s2llkr/uol.png);
        }

        .paypal label {
            background-image: url(https://dl.dropbox.com/s/i4z39zy2mtb7xq1/paypal.png);
        }

        .bankslip label {
            background-image: url(https://dl.dropbox.com/s/myj41602bom0g8p/bankslip.png);
        }

        .radios input:focus + label {
            outline: 2px dotted #21b4d0;
        }

        .radios input:checked + label {
            outline: 4px solid #21b4d0;
        }

        .radios input:checked + label:after {
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8dGl0bGU+Y2hlY2tlZDwvdGl0bGU+CiAgICA8ZyBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyBpZD0iY2hlY2tlZCIgZmlsbC1ydWxlPSJub256ZXJvIj4KICAgICAgICAgICAgPHBhdGggZD0iTTEwLjAwNDkyODUsMjAgQzE1LjQ5NTMxNzksMjAgMjAsMTUuNDkzMDk2NiAyMCwxMCBDMjAsNC40OTcwNDE0MiAxNS40OTUzMTc5LDAgOS45OTUwNzE0NiwwIEM0LjUwNDY4MjExLDAgMCw0LjQ5NzA0MTQyIDAsMTAgQzAsMTUuNDkzMDk2NiA0LjUwNDY4MjExLDIwIDEwLjAwNDkyODUsMjAgWiIgZmlsbD0iIzIxQjREMCI+PC9wYXRoPgogICAgICAgICAgICA8cGF0aCBkPSJNOS4wNDQ0MDE1NCwxNiBDOC41OTA3MzM1OSwxNiA4LjIzMzU5MDczLDE1Ljc3NDM1OSA3Ljk1MzY2Nzk1LDE1LjQyNTY0MSBMNS4zMzc4Mzc4NCwxMi4xNjQxMDI2IEM1LjA5NjUyNTEsMTEuODc2OTIzMSA1LDExLjYxMDI1NjQgNSwxMS4yOTIzMDc3IEM1LDEwLjYyNTY0MSA1LjUzMDg4ODAzLDEwLjA5MjMwNzcgNi4xNDg2NDg2NSwxMC4wOTIzMDc3IEM2LjUwNTc5MTUxLDEwLjA5MjMwNzcgNi43ODU3MTQyOSwxMC4yNTY0MTAzIDcuMDM2Njc5NTQsMTAuNTUzODQ2MiBMOS4wMjUwOTY1MywxMy4wNTY0MTAzIEwxMi44MTg1MzI4LDYuNjg3MTc5NDkgQzEzLjA5ODQ1NTYsNi4yMzU4OTc0NCAxMy40MTY5ODg0LDYgMTMuODMyMDQ2Myw2IEMxNC40NDAxNTQ0LDYgMTUsNi40ODIwNTEyOCAxNSw3LjE0ODcxNzk1IEMxNSw3LjQwNTEyODIxIDE0LjkwMzQ3NDksNy42OTIzMDc2OSAxNC43MzkzODIyLDcuOTU4OTc0MzYgTDEwLjEyNTQ4MjYsMTUuMzY0MTAyNiBDOS44NjQ4NjQ4NiwxNS43NTM4NDYyIDkuNDY5MTExOTcsMTYgOS4wNDQ0MDE1NCwxNiBaIiBpZD0iUGF0aCIgZmlsbD0iI0ZGRkZGRiI+PC9wYXRoPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+);
            bottom: -10px;
            content: "";
            display: inline-block;
            height: 20px;
            position: absolute;
            right: -10px;
            width: 20px;
        }

        @-moz-document url-prefix() {
            .radios input:checked + label:after {
                bottom: 0;
                right: 0;
                background-color: #21b4d0;
            }
        }
    </style>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Người ở trọ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_user">
                        <div class="form-group">
                            <label for="name">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name">
                            <small class="error"></small>

                        </div>
                        <div class="form-group">
                            <label>Số điện thoại<span class="text-danger">*</span></label>
                            <input type="text" minlength="10" maxlength="11" name="phone" id="phone" class="form-control">
                            <small class="error"></small>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <small class="error"></small>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>CCCD/CMND<span class="text-danger">*</span></label>
                                    <input type="text"  name="identified_no" id="identified_no" class="form-control">
                                    <span class="text-danger" id="ident_error"></span>
                                    <small class="error"></small>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Ngày sinh <span class="text-danger">*</span></label>
                                    <input name="birthday" max="{{$year}}" type="date" id="birthday" class="form-control">
                                    <small class="error"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="0">- Chọn -</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    <small class="error"></small>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{$room_limit}}" id="room_limit" name="room_limit">
                            <input type="hidden" value="{{$user->id}}" id="user_id" name="user_id">

                            <label>Địa chỉ<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address">
                            <small class="error"></small>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary"  id="submitBtn">Thêm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="detail-page pt-70 pb-40" style="margin-top: 170px;">
        @if (session('error'))
            <div class="alert alert-danger" id="error">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mb-30" style="background-color: #ccffea; padding: 20px;">
                    <h3>Thông tin người đặt phòng trọ</h3>
                    <br>
                    <form class="form-style-1" action="{{route('customer.booking.store')}}" method="post">
                        @csrf
                        <div class="col-md-12" id="show_user">

                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" id="addUserBtn" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Thêm người ở</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Ngày nhận phòng<span class="text-danger">*</span></label>
                                    <input name="date_expire" min="{{$min}}" max="{{$max}}" type="date" id="date_expire" class="form-control">
{{--                                    <span class="text-danger">@error('date_expire'){{$message}}@enderror</span>--}}
                                    <small class="error"></small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>Chọn phương thức thanh toán</h4>
                                </div>

                            </div>
                            <br><br>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="cash" id="cash">
                                    <label class="form-check-label" for="cash">
                                       Thanh toán tiền phòng trực tiếp vào ngày nhận phòng
                                    </label>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-lg-6 mb-20">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="vnpay" id="vnpay">
                                    <label class="form-check-label" for="vnpay">
                                        Thanh toán với VNPAY
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-20">
                            </div>
                        </div>

                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <input type="hidden" name="total_cost" value="{{$total_cost}}">
                        <input type="hidden" id="user_booked_id" name="user_booked_id" value="{{$user->id}}">
                        <button type="submit" class="btn-style-1" style="margin-left: 160px">Tiếp tục với thanh toán</button>
                    </form>

                </div>
                <div class="col-lg-6 col-md-4">
                    <style>
                        .label {
                            font-weight: bold;
                        }
                    </style>
                    <aside>
                        <!-- help us -->
                        <div class="help-us mb-30" style="font-size: 16px;color: white;">
                            <h3>Thanh toán trọ</h3>
                            @php
                            $tong=$room->cost;
                            @endphp
                            <table style="width: 100%;padding: 0px; height: 240px;">
                                <tbody>
                                <tr>
                                    <td class="label">Loại phòng: </td>
                                    <td style="text-align: left;">{{$room_category->name}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Mã phòng: </td>
                                    <td style=" font-weight: bold;text-align: left;">{{$room->room_sku}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Tên phòng</td>
                                    <td style="text-align: left;">{{$room->name}}</td>
                                </tr>
                                    <td class="label">Tiền phòng/tháng: </td>
                                    <td style="text-align: left;">{{number_format($room->cost)}} đ</td>
                                </tr>
                                <tr class="label">
                                    <td colspan="2">Các dịch vụ (Nếu có) </td>
                                </tr>
                                @foreach($serviceRooms as $serviceRoom)
                                    @foreach($services as $service)
                                        @if($serviceRoom->service_id==$service->id)
                                            <tr>
                                                <td class="label">{{$service->getName()}}</td>
                                                <td style="text-align: left;">{{number_format($service->getCost())}} đ</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach

                                <tr>
                                    <td class="label">Tổng tiền</td>
                                    <td class="label" style="font-size: 16px;text-align: left; ">{{number_format($total_cost)}} đ</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        <!-- help us end -->
                    </aside>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@push('footer')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--           --}}

{{--        })--}}
{{--    </script>--}}
    <script type="text/javascript">
        function validate_form() {

            const form = document.getElementById('add_user');
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');
            const birthday = document.getElementById('birthday');
            const identified_no = document.getElementById('identified_no');
            const sex = document.getElementById('sex');
            // console.log(name);
            form.addEventListener('submit', e => {
                e.preventDefault();
                validateInputs();
            })

            const setError = (element, message) => {
                const inputControl = element.parentElement;
                const Error = inputControl.querySelector('.error');
                Error.innerText = message;
                inputControl.classList.add('error');
            }

            const validateInputs = () => {
                const user_name = name.value.trim();
                const user_email = email.value.trim();

                const user_phone = phone.value.trim();

                const user_address = address.value.trim();

                const user_birthday = birthday.value.trim();
                const user_identified_no = identified_no.value.trim();
                // const user_sex = sex.options[sex.selectedIndex].value;

                const now = new Date();
                const validMindate = new Date(
                    now.getFullYear() - 18,
                    now.getMonth(),
                    now.getDate());

                var birth = new Date(user_birthday);

                const validEmail = email => {
                    const testEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return testEmail.test(String(email).toLowerCase());
                }

                if (user_name === '') {
                    setError(name, 'Trường này không được bỏ trống!');
                }

                if (user_email === '') {
                    setError(email, 'Trường này không được bỏ trống!');
                } else if (!validEmail(user_email)) {
                    setError(email, 'Địa chỉ email không hợp lệ!');
                }

                if (user_phone === '') {
                    setError(phone, 'Trường này không được bỏ trống!');
                }

                if (user_birthday === '') {
                    setError(birthday, 'Trường này không được bỏ trống!');
                } else if (birth > validMindate) {
                    setError(birthday, 'Bạn chưa đủ 18 tuổi!');
                }

                if (user_address === '') {
                    setError(address, 'Trường này không được bỏ trống!');
                }

                if (user_identified_no === '') {
                    setError(identified_no, 'Trường này không được bỏ trống!');
                }
                else if ((user_identified_no._length > 12) || (user_identified_no._length <9)) {
                    setError(identified_no, 'Vui lòng nhập CCCD hợp lệ!');
                }

                // if (user_sex === '') {
                //     setError(sex, 'Trường này không được bỏ trống!');
                // }

            }
        }
        load_user();
        function load_user(){
            var room_id=$('#room_id').val();
            var _token = $('input[name="_token"]').val();
            var user_id = $('#user_id').val();
            // alert(post_id);
            $.ajax({
                url: '{{route('customer.load_user')}}',
                type: "POST",
                data: {_token:_token, room_id: room_id, user_id: user_id},

                success:function(data){
                    // console.log(data)
                    $('#show_user').html(data);
                }
            });

        }

        $('#exampleModal').on('show.bs.modal', function (event) {
            preventDefault();
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
        var user=0;
        var limit = {{ $room_category->room_limit }};
        user = {{ count($get_users = \App\Models\Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $user->id)->get()) }}
        if ((limit <= 0 ) || (user >= limit))
            document.querySelector('#addUserBtn').disabled = true;


        $('#submitBtn').click(function(){
            validate_form();

            if ((limit <= 0 ) || (user>=limit)){
                document.querySelector('#addUserBtn').disabled = true;
            }
            //get data from customer form
            var user_id = $('#user_id').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var birthday = $('#birthday').val();
            var phone = $('#phone').val();
            var identified_no = $('#identified_no').val();
            var sex = $('#sex :checked').val();
            var _token = $('input[name="_token"]').val();
            var room_limit = $('#room_limit').val();

            $.ajax({
                type: 'POST',
                url: '{{route('customer.customer_order')}}',
                data: {_token: _token, room_limit: room_limit,user_id: user_id,name: name, email: email, address: address, birthday: birthday, phone: phone, identified_no: identified_no, sex: sex},
                success: function (response){
                    // response.errors;
                    // console.log(response);
                    // document.getElementById('#addUserBtn').classList.add('close');
                    var element = document.getElementById('addUserBtn');
                    // console.log(element);
                    element.classList.add('.close');
                    $('#submitBtn').attr("data-dismiss","modal");
                    // $('#show_user').html(response);
                    $('#add_user').trigger("reset");
                    load_user();
                    user++;
                    if ((limit <= 0 ) || (user>=limit)){
                        document.querySelector('#addUserBtn').disabled = true;
                    }
                }
            })


        })



    </script>
@endpush

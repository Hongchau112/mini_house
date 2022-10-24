@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm hình ảnh mô tả phòng' )
])

@section('content')
    <div class="nk-block-des text-soft" style="margin-bottom: 20px; margin-left: 15px;">
        <p>Phòng: {{$room->name}}</p>

    </div>
    <div></div>
    <form action="{{route('admin.rooms.save_images', ['id' => $room->id])}}" method="POST" enctype="multipart/form-data" class="dropzone" id="save-data">
        @csrf
        <div class="card-inner">

            <div class="form-group">
                <div><h3 class="text-center">Nhấp vào để chọn ảnh</h3></div>
                <div class="dz-default dz-message"><span>Hoặc kéo thả để tải ảnh lên</span></div>
            </div>
        </div>
        <div>
            <div>
                <input type="hidden" id="room_id" value="{{$room->id}}">
            </div>
            <div class="ti-arrow-top-left">
                <h3>Ảnh đã tải lên</h3>
            </div>
            <div id="uploaded_images">

            </div>
        </div>
    </form>
    </br>

@endsection
@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"></script>
    <script>
        $(document).ready(function(){
            load_images();

            function load_images() {
                var room_id = $('#room_id').val();
                // console.log(room_id);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{route('admin.rooms.load_images')}}' ,
                    type: 'POST',
                    data: {room_id:room_id, _token:_token},
                    success: function (data) {
                        console.log(data);
                        $('#uploaded_images').html(data);
                    }
                })
            }
        })
    </script>
@endpush





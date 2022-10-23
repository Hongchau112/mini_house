@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Thêm phòng' )
])

@section('content')
    <form action="{{route('admin.rooms.save_images', ['id' => $room->id])}}" method="POST" enctype="multipart/form-data" class="dropzone" id="save-data">
        @csrf
        <div class="card-inner">
            <div class="form-group">
                <div><h3 class="text-center">Upload Image by click on </h3></div>
                <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
            </div>
        </div>
    </form>
    <div>

    </div>
@endsection
@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"></script>
@endpush





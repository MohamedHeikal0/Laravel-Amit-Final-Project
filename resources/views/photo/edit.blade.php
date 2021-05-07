@extends('../layouts.app')

@section('content')
@foreach ($single as $s)

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mt-5 mb-5">
                <form action="{{route('photo.update' , $s->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        Old Image: <br> <img src="{{asset('images/'.$s->image)}}" width="200" class="mb-3">
                        <br>
                        <label>Browse New Image</label>
                        <br>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endforeach
@endsection
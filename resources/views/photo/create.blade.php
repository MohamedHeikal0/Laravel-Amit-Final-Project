@extends('../layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mt-5 mb-5">
            <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Browse Image</label>
                    <br>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('../layouts.app')

@section('content')
{{-- <div class="conatiner">
    <div class="row">
        <div class="col-md-4">
            <div class="image text-right pt-3">
                <img src="images/download.jpg" alt=""  style="border-radius: 50%">
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="profile pt-5 row justify-content-center">
                <div class="name col-md-5">
                    <h3>Mohamed Monuir</h3>
                </div>
                <div class="name col-md-2">
                    <button style="background-color: white"><a href="">Edit Profile</a></button>
                </div>
                <div class="name col-md-2">
                    <button style="background-color: white"><a href="{{route('photo.create')}}"><i class="far fa-plus-square"></i></a></button>
                </div>
            </div>
            <div class="followers-section row m-5">
                <div class="posts col-md-3 text-center">  
                    <p>{{$count}} Posts</p>
                </div>
                <div class="followers col-md-3 text-center">
                    <p>120 Followers</p>
                </div>
                <div class="following col-md-3 text-center">
                    <p>188 Following</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <h1 class="text-center mb-5">
        Single Page
        @foreach ($single as $s)
            <a href="{{route('photo.edit' , $s->id)}}" class="btn btn-success p-2"> <i class="fas fa-edit"></i> </a>
            <form action="{{route('photo.destroy' , $s->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger p-3 mt-2"> <i class="fas fa-trash"></i> </button>
            </form>
        @endforeach
    </h1>

<div class="container text-center">
    <div class="row ">
        @foreach ($single as $a)
            <div class="col-md-8 mt-2 mb-2 mx-auto">
                    <img src=" {{asset('images/'.$a->image)}}" class="img-fluid" style="height: 200px">
            </div>
        @endforeach
    </div>
</div>
@endsection

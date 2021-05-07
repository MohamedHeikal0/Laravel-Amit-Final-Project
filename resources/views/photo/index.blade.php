@extends('../layouts.app')

@section('content')
<div class="conatiner">
    <div class="row">
        <div class="col-md-4">
            <div class="image text-right pt-3">
                <img src="images/download.jpg" alt=""  style="border-radius: 50%">
                {{-- <a href="{{route('photo.show', $a->id)}}">
                    <img src=" {{asset('images/'.$a->image)}}" class="img-fluid" style="height: 200px">
                </a> --}}
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="profile pt-5 row justify-content-center">
                <div class="name col-md-5">
                    <h3>Mohamed Monuir</h3>
                </div>
                {{-- <div class="name col-md-2">
                    <button style="background-color: white"><a href="{{route('photo.edit')}}">Edit Profile</a></button>
                </div> --}}
                <div class="name col-md-2">
                    <button class="btn btn-success p-3">
                        <a href="{{route('photo.create')}}"><i class="far fa-plus-square" style="color: white"></i></a>
                    </button>
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
</div>
<div class="container">
    <div class="row">
        @foreach ($all as $a)
            <div class="col-md-3 m-3">
                <a href="{{route('photo.show', $a->id)}}">
                    <img src=" {{asset('images/'.$a->image)}}" class="img-fluid" style="height: 200px">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layout/main')

@section('title', 'Домашняя')

@section('content')
    <section>
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <h1>Posts</h1>
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between w-100">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <div>
                                <strong class="text-muted"><i style="color: black">Author: </i>{{ $post->user->name }}
                                </strong>
                                @if(Auth::id() === $post->user->id)
                                    <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" class="btn btn-danger" style="margin-left: 10px">Delete</a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-space-between">
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

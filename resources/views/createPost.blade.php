@extends('layout/main')

@section('title', 'Создать пост')

@section('content')
    <section>
        <div class="container">
            <h1>Create Post</h1>
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" id="title" name="title">
                    @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="description">Описание</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Создать</button>
            </form>
        </div>
    </section>
@endsection

@extends('layout/main')

@section('title', 'Логин')

@section('content')
    <section>
        <div class="container">
            <h1>Логин</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if(Session::has('error'))
                    <div class="alert alert-primary" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" id="email" name="email">
                    @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password">
                    @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-1 form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_token">
                    <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Авторизироваться</button>
            </form>
        </div>
    </section>
@endsection

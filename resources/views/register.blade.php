@extends('layout/main')

@section('title', 'Регистрация')

@section('content')
    <section>
        <div class="container">
            <h1>Регистрация</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Имя</label>
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email">
                    @error('email')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="password">Подтверждение пароля</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Зарегистрироваться</button>
            </form>
        </div>
    </section>
@endsection

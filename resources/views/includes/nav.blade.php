<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container d-flex justify-content-between">
        <div class="block">
            <a class="navbar-brand" href="{{ route('home') }}">Market</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="block">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Создать пост</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Профиль</a></li>
                        <a class="btn btn-danger" href="{{ route('logout') }}">Выйти</a>
                    </ul>
                @else
                <ul class="navbar-nav ml-auto d-flex justify-content-end">
                    <li class="nav-item"><a href="{{ route('register')  }}" class="nav-link">Зарегистрироваться</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Войти</a></li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</nav>

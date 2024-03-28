@extends('layouts.auth')

@section('title', config('app.name'))

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <img width="40%" src="{{ asset('adminlte-assets/dist/img/desktop-logo.png') }}" alt="">
{{--            <br>--}}
{{--            <a class="text-uppercase text-bold" href="{{ route('admin.index') }}"--}}
{{--               style="font-size: 1.5rem;">--}}
{{--                {{ config('app.name') }}--}}
{{--            </a>--}}
        </div>

        <div class="card shadow-none">
            <div class="card-body login-card-body rounded">
                <p class="login-box-msg">Вход в систему</p>

                <form action="{{ route('login') }}" method="post">
                    @method('POST')
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Почта" name="email" value="{{ old('email') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Пароль" name="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" value="1">
                                <label for="remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="fas fa-sign-in-alt"></span>
                                Войти
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Главная')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4 class="m-0">Страница администратора</h4>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            Вы удачно авторизовались!
        </div>
    </section>
@endsection

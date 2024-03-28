@extends('layouts.admin')

@section('title', 'Добавление ')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавление </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-warning btn-sm mb-3" href="{{ route('admin.cities.index') }}" title="Назад">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            @include('admin._components.alert')

            <form method="POST" action="{{ route('admin.cities.store') }}" class="form-horizontal">
                @csrf
                @method('POST')
                @include('admin.cities._form')
            </form>
        </div>
    </section>
@endsection

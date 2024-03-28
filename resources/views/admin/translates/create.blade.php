@extends('layouts.admin')

@section('title', 'Добавить')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{ route('admin.translates.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" class="form-horizontal"
                  action="{{ route('admin.translates.store', ['translate' => $translate]) }}">
                @csrf
                @method('POST')
                @include('admin.translates._form')
            </form>
        </div>

    </section>
@endsection

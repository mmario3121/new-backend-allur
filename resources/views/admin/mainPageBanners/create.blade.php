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

        <a href="{{route('admin.mainPages.edit', ['mainPage' => 1])}}" title="Назад"
            class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            @include('admin._components.alert')

            <form method="POST" action="{{ route('admin.mainPageBanners.store') }}"
                  class="form-horizontal"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.mainPageBanners._form')
            </form>

        </div>
    </section>
@endsection

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

        <a href="{{route('admin.specifications.index', ['specificationCategory_id' => $specificationCategory->id])}}" title="Назад"
            class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            @include('admin._components.alert')

            <form method="POST" action="{{ route('admin.specifications.store') }}"
                  class="form-horizontal"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.specifications._form')
            </form>

        </div>
    </section>
@endsection

@extends('layouts.admin')

@section('title', 'Добавить Цвет')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить Цвет для {{$model->title}}</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            <form method="POST" action="{{ route('admin.colors.store') }}"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.colors._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

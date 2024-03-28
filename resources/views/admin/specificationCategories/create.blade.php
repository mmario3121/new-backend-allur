@extends('layouts.admin')

@section('title', 'Добавить Характеристику')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить Характеристику для {{$model->title}}</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{route('admin.specificationCategories.index', ['model_id' => $model->id])}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" action="{{ route('admin.specificationCategories.store') }}"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.specificationCategories._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

@extends('layouts.admin')

@section('title', 'Добавить Комплектацию')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить Комплектацию для {{$model->title}}</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{route('admin.complectations.index', ['model_id' => $model->id])}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" action="{{ route('admin.complectations.store') }}"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.complectations._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

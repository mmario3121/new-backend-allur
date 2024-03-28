@extends('layouts.admin')

@section('title', 'Добавить Тип')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить Модель</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{ route('admin.types.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" action="{{ route('admin.types.store') }}"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.types._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

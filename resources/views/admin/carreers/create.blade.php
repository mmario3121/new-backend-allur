@extends('layouts.admin')

@section('title', 'Добавить')

@push('styles')
    @includeIf('admin._components.summernoteStyles')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            <a href="{{ route('admin.carreers.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <form method="POST" class="pb-5" action="{{ route('admin.carreers.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.carreers._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
@endpush

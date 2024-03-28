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
            <form method="POST" class="pb-5" action="{{ route('admin.achievementImages.store', ['achievement' => $achievement]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('admin.achievement-images._form')
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
@endpush

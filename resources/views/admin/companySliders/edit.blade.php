@extends('layouts.admin')

@section('title', 'Редактировать')

@push('styles')
    @includeIf('admin._components.summernoteStyles')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            <a href="{{ route('admin.companySliders.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <form method="POST" class="pb-5"
                  action="{{ route('admin.companySliders.update', ['companySlider' => $companySlider]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.companySliders._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
@endpush

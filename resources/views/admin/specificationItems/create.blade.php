@extends('layouts.admin')

@section('title', 'Добавить значение характеристики')

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить значение характеристики</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{ route('admin.specificationItems.index', ['specification' => $specification]) }}"
               title="Назад" class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST"
                  action="{{ route('admin.specificationItems.store', ['specification' => $specification]) }}"
                  class="form-horizontal">
                @csrf
                @method('POST')
                @include('admin.specificationItems._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush

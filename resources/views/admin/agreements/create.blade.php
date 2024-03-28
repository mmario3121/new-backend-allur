@extends('layouts.admin')

@section('title', 'Добавление')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавление</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{ route('admin.agreements.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.agreements.store') }}">
                @csrf
                @method('POST')
                @include('admin.agreements._form')
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        })
    </script>
@endpush

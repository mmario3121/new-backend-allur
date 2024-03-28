@extends('layouts.admin')

@section('title', 'Добавить ')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Добавить</h3>
        </div>
    </div>

    <section class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-warning btn-sm  mb-3" href="{{ route('admin.users.index') }}" title="Назад">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </a>

                    @include('admin._components.alert')

                    <form method="POST" action="{{ route('admin.users.store') }}"
                          autocomplete="off">
                        @csrf
                        @method('POST')
                        @include('admin.users._form')
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @include('admin._components.phoneMaskScripts')
    @include('admin._components.select2Scripts')
@endpush

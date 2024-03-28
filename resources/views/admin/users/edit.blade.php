@extends('layouts.admin')

@section('title', 'Редактировать')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-warning btn-sm mb-3" href="{{ route('admin.users.index') }}" title="Назад">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            @include('admin._components.alert')
            <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
                @method('PATCH')
                @csrf
                @include('admin.users._form')
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    @include('admin._components.phoneMaskScripts')
    @include('admin._components.select2Scripts')
@endpush

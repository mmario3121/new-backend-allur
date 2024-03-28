@extends('layouts.admin')

@section('title', 'Редактировать ')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{ route('admin.models.index', ['brand_id' => $model->brand_id])}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" class="form-horizontal"  enctype="multipart/form-data"
                  action="{{ route('admin.models.update', ['model' => $model]) }}">
                @csrf
                @method('PATCH')
                @include('admin.models._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

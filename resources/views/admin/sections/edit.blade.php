@extends('layouts.admin')

@section('title', "Редактировать Секцию")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать Секцию для {{$model->title}} </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{route('admin.sections.index', ['model_id' => $model->id])}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" class="form-horizontal"  enctype="multipart/form-data"
                  action="{{ route('admin.sections.update', ['section' => $section]) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required ">
                            <label for="title" class="control-label" title="Заполните обязательно!">
                                Название
                            </label>
                            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                                id="title" name="title" value="{{  isset($section) ? $section->title : (old('title') ?? '') }}">
                            @error('title')
                            <span class="error invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group required ">
                            <label for="image" class="control-label" title="Заполните обизательно!">
                                Картинка </label>
                            <input class="form-control @error('image') is-invalid @enderror"
                                name="image" type="file" id="image">
                                @error('image')
                                    <span class="error invalid-feedback">{{ $message }} </span>
                                @enderror
                        </div>
                        
                        <input type="hidden" title="model_id" type="text"
                                id="model_id" name="model_id" value="{{ $model->id}}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
                @include('admin.sectionItems.index')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
@endpush

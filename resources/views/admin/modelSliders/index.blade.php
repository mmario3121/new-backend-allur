@extends('layouts.admin')

@section('title', "Слайдер $model->title ")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Слайдер {{$model->title}}</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <a href="{{route('admin.models.index')}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <div class="card-tools mb-4">
                <a href="{{ route('admin.modelSliders.create', ['model_id' => $model->id]) }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Картинка</th>
                        <th>Секция</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($modelSliders as $modelSlider)
                        <tr>
                            <td>
                                <img src="{{ $modelSlider->image_url }}" width="400px">
                            </td>
                            <td>
                                @if($modelSlider->section == 'main')
                                    Основные
                                @elseif($modelSlider->section == 'exterior')
                                    Экстерьер
                                @elseif($modelSlider->section == 'interior')
                                    Интерьер
                                @elseif($modelSlider->section == 'comfort')
                                    Комфорт
                                @elseif($modelSlider->section == 'safety')
                                    Безопасность
                                @endif                             
                            </td>
                            <td>
                                {{ $modelSlider->created_at }}
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.modelSliders.edit', ['modelSlider' => $modelSlider]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.modelSliders.destroy', ['modelSlider' => $modelSlider])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удаление" type="submit" class="dropdown-item"
                                                        onclick="confirm('Подтвердите удаление')">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" class="text-danger" colspan="4">
                                Слайды не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

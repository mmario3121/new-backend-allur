@extends('layouts.admin')

@section('title', "Комплектации $model->title ")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Комплектации {{$model->title}}</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <a href="{{route('admin.models.index', ['brand_id' => $model->brand_id])}}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <div class="card-tools mb-4">
                <a href="{{ route('admin.complectations.create', ['model_id' => $model->id]) }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Bitrix ID</th>
                        <th>Характеристики</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($complectations as $complectation)
                        <tr>
                            <td>
                                {{ $complectation->title }}
                            </td>
                            <td>
                                {{ $complectation->bitrix_id }}
                            </td>

                            <td class="p-2">
                                <a href="{{ route('admin.specs.index', ['complectation_id' => $complectation->id]) }}"
                                   title="Картинки"
                                   class="btn btn-primary btn-sm">
                                   Характеристики
                                </a>
                            </td>
                            <td>
                                {{ $complectation->created_at }}
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.complectations.edit', ['complectation' => $complectation]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.complectations.destroy', ['complectation' => $complectation])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удаление" type="submit" class="dropdown-item"
                                                        onclick="confirm('Подтвердите удаление')">
                                                    Удалить
                                                </button>
                                            </form>
                                            <form
                                            action="{{route('admin.complectations.copy', ['complectation' => $complectation])}}"
                                                method="post">
                                                @csrf
                                                @method('POST')
                                                <button title="Копировать" type="submit" class="dropdown-item">
                                                    Копировать
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
                                Цвета не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

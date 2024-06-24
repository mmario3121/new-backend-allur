@extends('layouts.admin')

@section('title', 'Контакты')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Модели</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <a href="{{ route('admin.brands.index') }}" title="Назад"
                class="btn btn-warning btn-sm mb-3">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
            </a>
            <div class="card-tools mb-4">
                <a href="{{ route('admin.models.create', ['brand_id' => request()->brand_id]) }}"
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
                        <th>Тип</th>
                        <th>Bitrix ID</th>
                        <th>Картинки</th>
                        <th>Цвета</th>
                        <th>Комплектации</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($models as $model)
                        <tr>
                            <td>
                                {{ $model->title }}
                            </td>
                            <td>
                                {{ $model->type->title }}
                            </td>
                            <td>
                                {{ $model->bitrix_id }}
                            </td>
                            <td class="p-2">
                                <a href="{{ route('admin.modelSliders.index', ['model_id' => $model->id]) }}"
                                   title="Картинки"
                                   class="btn btn-primary btn-sm">
                                    Картинки ({{ $model->sliders_count }})
                                </a>
                            </td>
                            <td class="p-2">
                                <a href="{{ route('admin.colors.index', ['model_id' => $model->id]) }}"
                                   title="Картинки"
                                   class="btn btn-primary btn-sm">
                                   Цвета
                                </a>
                            </td>
                            <td class="p-2">
                                <a href="{{ route('admin.complectations.index', ['model_id' => $model->id]) }}"
                                   title="Картинки"
                                   class="btn btn-primary btn-sm">
                                   Комплектации
                                </a>
                            </td>
                            <td>
                                {{ $model->created_at }}
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.models.edit', ['model' => $model]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.models.destroy', ['model' => $model])}}"
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
                                Модели не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

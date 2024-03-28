@extends('layouts.admin')

@section('title', 'Бренды')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Бренды</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <div class="card-tool mr-1 mb-2 mb-sm-0">
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-success btn-sm"
                       title="Добавить">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="p-2">#ID</th>
                        <th class="p-2">Название</th>
                        <th class="p-2">Лого</th>
                        <th class="p-2">Очередь</th>
                        <th class="p-2">Bitrix ID</th>
                        <th class="p-2">Модели</th>
                        <th class="p-2">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td class="p-2">{{ $brand->id }}</td>
                            <td class="text-black p-2">{{ $brand->title }}</td>
                            <td class="p-2">
                                <img src="{{ $brand->logo_url }}"
                                     alt="{{ $brand->title }}"
                                     style="max-width: 100px; max-height: 100px">
                            </td>
                            <td class="text-black p-2">{{ $brand->position }}</td>
                            <td class="text-black p-2">{{ $brand->bitrix_id }}</td>
                            <td class="p-2">
                                <a href="{{ route('admin.models.index', ['brand_id' => $brand->id]) }}"
                                   title="Модели"
                                   class="btn btn-info btn-sm">
                                    Модели
                                </a>
                            </td>
                            <td class="p-2">
                                <div class="card-tools">
                                    <a href="{{ route('admin.brands.edit', ['brand' => $brand]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.brands.destroy', ['brand' => $brand]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                title="Удалить"
                                                onclick="return confirm('Подтвердите удаление!')">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" class="text-danger" colspan="3">
                                Бренды отсутствуют
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

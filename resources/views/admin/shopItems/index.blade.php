@extends('layouts.admin')

@section('title', 'Товары')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Товары</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <a href="{{ route('admin.shopItems.index') }}" title="Назад"
                class="btn btn-warning btn-sm mb-3">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
            </a>
            <div class="card-tools mb-4">
                <a href="{{ route('admin.shopItems.create') }}"
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
                        <th>Размер</th>
                        <th>Цвет</th>
                        <th>Цена</th>
                        <th>Подтовары</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($shopItems as $shopItem)
                        <tr>
                            <td>
                                {{ $shopItem->title }}
                            </td>
                            <td>
                                {{ $shopItem->size }}
                            </td>
                            <td>
                                {{ $shopItem->color }}
                            </td>
                            <td>
                                {{ $shopItem->price }}
                            </td>
                            <td>
                                <a href="{{ route('admin.shopItems.index', ['shopItem' => $shopItem]) }}"
                                   title="Подтовары"
                                   class="btn btn-primary btn-sm">
                                    Подтовары ({{ $shopItem->children->count() }})
                                </a>

                            </td>
                            <td>
                                {{ $shopItem->created_at }}
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.shopItems.edit', ['shopItem' => $shopItem]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.shopItems.destroy', ['shopItem' => $shopItem])}}"
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
                                Товары не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

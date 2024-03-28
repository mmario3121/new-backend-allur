@extends('layouts.admin')

@section('title', 'Значения характеристики')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Значения характеристики</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <div class="card-tool mr-1 mb-2 mb-sm-0">
                    <a href="{{ route('admin.specifications.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Назад
                    </a>
                    <a href="{{ route('admin.specificationItems.create', ['specification' => $specification]) }}"
                       class="btn btn-success btn-sm"
                       title="Добавить">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                </div>

                <form method="GET"
                      action="{{ route('admin.specificationItems.index', ['specification' => $specification])  }}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Поиск..."
                               value="{{ request('search') ?? '' }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th width="4%">#ID</th>
                        <th>Наименование</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($specificationItems as $specificationItem)
                        <tr>
                            <td>{{ $specificationItem->id }}</td>
                            <td>{{ $specificationItem->titleTranslate?->ru }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.specificationItems.edit', ['specification'=> $specification, 'specificationItem' => $specificationItem]) }}"
                                       title="Редактировать "
                                       class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.specificationItems.destroy', ['specification' => $specification, 'specificationItem' => $specificationItem]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                title="Удалить "
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
                                Значения характеристики не найден
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {!! $specificationItems->appends(['search' => request('search')])->render() !!}
                </div>
            </div>

        </div>
    </section>
@endsection

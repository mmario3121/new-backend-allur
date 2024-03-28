@extends('layouts.admin')

@section('title', 'Города')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Города</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">

                <div class="card-tool mr-1 mb-2 mb-sm-0">
                    <a href="{{ route('admin.cities.create') }}"
                       class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                       title="Добавить">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                </div>

                <form method="GET" action="{{ route('admin.cities.index')  }}">
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
                <table class="table">
                    <thead>
                    <tr>
                        <th class="p-2">#ID</th>
                        <th class="p-2">Название</th>
                        <th class="p-2">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td class="p-2">{{ $city->id }}</td>
                            <td class="p-2">{{ $city->titleTranslate?->ru }}</td>
                            <td class="p-2">
                                <div class="card-tools">
                                    <a href="{{ route('admin.cities.edit', ['city' => $city]) }}"
                                       title="Редактировать" class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.cities.destroy', ['city' => $city]) }}"
                                          style="display:inline">
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
                        <td align="center" class="text-danger" colspan="3">
                            Города не найден
                        </td>
                    @endforelse
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {!! $cities->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>

        </div>
    </section>
@endsection

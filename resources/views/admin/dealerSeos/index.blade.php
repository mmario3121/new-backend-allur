@extends('layouts.admin')

@section('title', 'Дилеры')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Дилеры</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
            <a href="{{ route('admin.dealerSeos.create')}}"
                class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                   title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>

                <form method="GET" action="{{ route('admin.dealerSeos.index') }}">
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
                        <th>#ID</th>
                        <th>Дилер</th>
                        <th>Расположение</th>
                        <th>Поддомен</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($dealerSeos as $dealerSeo)
                        <tr>
                            <td>{{ $dealerSeo->id }}</td>
                            <td>{{ $dealerSeo->dealer->name }}</td>
                            <td>{{ $dealerSeo->position }}</td>
                            <td>{{ $dealerSeo->dealer->url }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.dealerSeos.edit', ['dealerSeo' => $dealerSeo]) }}"
                                       title="Редактировать" class="btn btn-primary btn-sm ">
                                        Редактировать
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.dealerSeos.destroy', ['dealerSeo' => $dealerSeo]) }}"
                                          style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm "
                                                title="Удалить"
                                                onclick="return confirm('Подтвердите удаление!')">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td align="center" class="text-danger" colspan="7">
                            Дилеры не найден
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

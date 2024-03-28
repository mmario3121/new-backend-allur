@extends('layouts.admin')

@section('title', 'Заявки')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Заявки </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <form method="GET" action="{{ route('admin.applications.index')  }}">
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
            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <form method="POST" action="{{ route('admin.applications.markAsRead') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Отметить все как прочитанные
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Телефон</th>
                        <th>Дилер</th>
                        <th>Имя</th>
                        <th>Модель</th>
                        <th>Время</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>
                                <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                            </td>
                            <td>
                            @if($application->getDealer)
                            {{ $application->getDealer->name }}
                            @else
                            Дилер неизвестен
                            @endif
                            </td>
                            <td>{{ $application->name }}</td>
                            <td>
                            @if($application->getModel)
                            {{ $application->getModel->title }}
                            @else
                            Модель неизвестна
                            @endif
                            </td>

                            <td>{{ $application->time_format }}</td>
                            <td>
                                @if($application->status == 2)
                                    <span class="badge badge-success fs-base">Прочитано</span>
                                @elseif($application->status == 1)
                                    <span class="badge badge-warning fs-base">Отправлено, новая</span>
                                @else
                                <span class="badge badge-danger fs-base">Не отправлено</span>
                                <form method="POST" action="{{ route('admin.applications.sendApplication', ['application' => $application->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        Переотправить
                                    </button>
                                </form>
                                @endif
                            </td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.applications.show', [$application]) }}"
                                       title="Посмотреть" class="btn btn-info btn-sm mb-1">
                                        Посмотреть
                                    </a>

                                    <a href="{{ route('admin.applications.edit', [$application]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm mb-1">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.applications.destroy', [$application]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm mb-1"
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
                            <td align="center" class="text-danger" colspan="7">
                                Заявки не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    {!! $applications->appends(['search' => request('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

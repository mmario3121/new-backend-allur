@extends('layouts.admin')

@section('title', 'Переводы')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Переводы</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools mb-4">
                <a href="{{ route('admin.translates.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                   title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Русский</th>
                        <th>Казахский</th>
                        <th>Английский</th>
                        <th>Тип</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($translates as $translate)
                        <tr>
                            <td>{{ $translate->id }}</td>
                            <td>{{ mb_strimwidth($translate->ru, 0, 70, '...') }}</td>
                            <td>{{ mb_strimwidth($translate->kz, 0, 70, '...') }}</td>
                            <td>{{ mb_strimwidth($translate->en, 0, 70, '...') }}</td>
                            <td>{{ $translate->type }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.translates.edit', ['translate' => $translate]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm mb-1">
                                        Редактирование
                                    </a>
                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.translates.destroy', ['translate' => $translate]) }}">
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
                            <td align="center" class="text-danger" colspan="4">
                                Переводы не найдено
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

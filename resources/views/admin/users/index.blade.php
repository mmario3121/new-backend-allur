@extends('layouts.admin')

@section('title', 'Ползовательи')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Пользователи</h3>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <div class="card-tools d-flex align-items-center flex-wrap ">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                       title="Добавить">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                </div>
                <form method="GET" action="{{ route('admin.users.index') }}">
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
                    <thead class="thead">
                    <tr>
                        <th class="p-2">#ID</th>
                        <th class="p-2">Имя</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Дата</th>
                        <th class="p-2">Роль</th>
                        <th class="p-2">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="p-2">{{ $user->id }}</td>
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ $user->created_at_format }}</td>
                            <td class="p-2">
                                @foreach($user->roles as $role)
                                    @if($role->name === 'developer')
                                        <span class="badge badge-danger fs-base">Разработчик</span>
                                    @elseif($role->name === 'admin')
                                        <span class="badge badge-primary fs-base">Админ</span>
                                    @elseif($role->name === 'manager')
                                        <span class="badge badge-success fs-base">Менеджер</span>
                                    @else
                                        <span class="badge badge-primary fs-base">Диллер</span>
                                    @endif
                                @endforeach
                            </td>
                            <td class="p-2">
                                <div class="card-tools">
                                    <a href="{{ route('admin.users.show',['user' => $user]) }}"
                                       title="Просмотр" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Посмотреть
                                    </a>

                                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}"
                                       title="Редактировать" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        Редактировать
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.users.destroy', ['user' => $user]) }}"
                                          style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                title="Удалить"
                                                onclick="return confirm('Подтвердите удаление!')">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td align="center" class="text-danger" colspan="6">
                            Пользователи не найдено
                        </td>
                    @endforelse
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    {!! $users->appends(['search' => request('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

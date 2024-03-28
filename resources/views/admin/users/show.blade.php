@extends('layouts.admin')

@section('title', 'Просмотреть')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Просмотреть</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card-tools mb-3">
                <a href="{{ route('admin.users.index') }}" title="Назад" class="btn btn-warning btn-sm ">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </a>
                <a class="btn btn-primary btn-sm"
                   href="{{ route('admin.users.edit',['user' => $user]) }}"
                   title="Редактировать">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    Редактировать
                </a>
                <form method="POST" action="{{ route('admin.users.destroy',['user' => $user]) }}"
                      class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm" title="Удалить "
                            onclick="return confirm('Подтвердите удаление!')">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                        Удалить
                    </button>
                </form>
            </div>

            @include('admin._components.alert')

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <th>ФИО</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th> Эл. почта</th>
                        <td> {{ $user->email }} </td>
                    </tr>

                    <tr>
                        <th>Телефон </th>
                        <td> {{ $user->phone }} </td>
                    </tr>

                    <tr>
                        <th>Дата регистрация </th>
                        <td> {{ $user->created_at_format }} </td>
                    </tr>

                    <tr>
                        <th>Роль </th>
                        <td>
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
                    </tr>

                    <tr>
                        <th>Город </th>
                        <td>
                            @if($user->city)
                               {{ $user->city->titleTranslate?->ru }}
                            @endif
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

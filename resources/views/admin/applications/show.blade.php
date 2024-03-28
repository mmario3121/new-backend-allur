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
                <a href="{{ route('admin.applications.index') }}" title="Назад" class="btn btn-warning btn-sm ">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </a>
                <a class="btn btn-primary btn-sm"
                   href="{{ route('admin.applications.edit',['application' => $application]) }}"
                   title="Редактировать">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    Редактировать
                </a>
                <form method="POST"
                      action="{{ route('admin.applications.destroy',['application' => $application]) }}"
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
                        <td>{{ $application->id }}</td>
                    </tr>

                    <tr>
                        <th>Город</th>
                        <td>{{ $application->city?->titleTranslate?->ru }}</td>
                    </tr>

                    <tr>
                        <th>Имя</th>
                        <td>{{ $application->name }}</td>
                    </tr>

                    <tr>
                        <th>Телефон</th>
                        <td> {{ $application->phone }} </td>
                    </tr>

                    <tr>
                        <th> Контакт</th>
                        <td> {{ $application->contact_id }} </td>
                    </tr>

                    <tr>
                        <th>Комментария</th>
                        <td> {{ $application->comment }} </td>
                    </tr>


                    <tr>
                        <th>Статус</th>
                        <td>
                            @if($application->status)
                                <span class="badge badge-success fs-base">Прочитно</span>
                            @else
                                <span class="badge badge-warning fs-base">Не прочитано</span>
                            @endif
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

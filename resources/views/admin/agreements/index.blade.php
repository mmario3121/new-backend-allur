@extends('layouts.admin')

@section('title', 'Документы')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Документы </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools mb-4">
                <a href="{{ route('admin.agreements.create') }}"
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
                        <th>Документ</th>
                        <th>Тип</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($agreements as $agreement)
                        <tr>
                            <td>{{ $agreement->id }}</td>
                            <td>
                                @if($agreement->fileUrl($agreement->fileTranslate))
                                    <a href="{{ $agreement->fileUrl($agreement->fileTranslate) }}">Скачать документ (RU)</a>
                                @else
                                    Документ не вложено
                                @endif
                            </td>
                            <td>{{ $agreement->type_name }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.agreements.edit', ['agreement' => $agreement]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm">
                                        Редактирование
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.agreements.destroy', ['agreement' => $agreement]) }}">
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
                            <td align="center" class="text-danger" colspan="4">
                                Документы не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection

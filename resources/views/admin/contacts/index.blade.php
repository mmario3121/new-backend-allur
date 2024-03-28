@extends('layouts.admin')

@section('title', 'Контакты')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Контакты</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools mb-4">
                <a href="{{ route('admin.contacts.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>
                                {{ $contact->addressTranslate?->ru }}
                            </td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.contacts.edit', ['contact' => $contact]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}">
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
                                Контакты не найдено
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.admin')

@section('title', 'Новости')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Новости</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
                <div class="card-tool mr-1 mb-2 mb-sm-0">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-success btn-sm"
                       title="Добавить">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                </div>

                <form method="GET" action="{{ route('admin.articles.index')  }}">
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
                        <th class="p-2">Фото</th>
                        <th class="p-2">Заголовок</th>
                        <th class="p-2">Время</th>
                        <!-- <th class="p-2">Галерея</th> -->
                        <th class="p-2">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td class="p-2">{{ $article->id }}</td>
                            <td class="p-2">
                                <img src="{{ $article->image_url }}" class="rounded"
                                     style="max-width: 200px; height: 100px">
                            </td>
                            <td class="text-black p-2">
                                {{ $article->titleTranslate?->ru }}
                            </td>
                            <td class="p-2">
                                {{ $article->time }}
                            </td>
                            <td class="p-2">
                                <div class="card-tools">
                                    <a href="{{ route('admin.articles.edit', ['article' => $article]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.articles.destroy', ['article' => $article]) }}">
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
                            <td align="center" class="text-danger" colspan="5">
                                Новости отсутствуют
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

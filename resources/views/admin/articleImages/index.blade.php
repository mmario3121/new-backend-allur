@extends('layouts.admin')

@section('title', 'Список картинки')

@push('styles')
    @includeIf('admin._components.ekkoLightBoxStyles')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Список картинки</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')

            <div class="card-tools mb-4">
                <a href="{{ route('admin.articles.index') }}"
                   class="btn btn-warning btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Назад
                </a>
                <a href="{{ route('admin.articleImages.create', ['article' => $article]) }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="p-2">#ID</th>
                        <th class="p-2">Фото</th>
{{--                        <th>Очередность</th>--}}
                        <th class="p-2">Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($articleImages as $articleImage)
                        <tr>
                            <td class="p-2">
                                {{ $articleImage->id }}
                            </td>
                            <td class="p-2">
                                <a href="{{ $articleImage->image_url }}"
                                   data-toggle="lightbox"
                                   data-title="Фото {{ $articleImage->id }}" data-gallery="gallery">
                                    <img src="{{ $articleImage->image_url }}"
                                        class="rounded"
                                        style="width: 150px; height: 150px; object-fit: contain">
                                </a>
                            </td>
{{--                            <td>{{ $articleImage->position }}</td>--}}
                            <td class="p-2">
                                <div class="card-tools">
                                    <a href="{{ route('admin.articleImages.edit', ['article' => $article,'articleImage' => $articleImage]) }}"
                                       title="Редактировать"
                                       class="btn btn-primary btn-sm">
                                        Редактировать
                                    </a>

                                    <form method="POST" class="d-inline"
                                          action="{{ route('admin.articleImages.destroy', ['article' => $article,'articleImage' => $articleImage]) }}">
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
                                Картинки не найдено
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.ekkoLightBoxScripts')
@endpush

@extends('layouts.admin')

@section('title', 'Редактировать')

@push('styles')
    @includeIf('admin._components.summernoteStyles')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            <a href="{{ route('admin.mainPages.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <form method="POST" class="pb-5"
                  action="{{ route('admin.mainPages.update', ['mainPage' => $mainPage]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.mainPages._form')
            </form>
        </div>
        <div class="container-fluid">
            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
            <a href="{{ route('admin.mainPageBanners.create')}}"
                class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                   title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>

                <form method="GET" action="{{ route('admin.mainPageBanners.index') }}">
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
                        <th>Баннер</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($mainPageBanners as $mainPageBanner)
                        <tr>
                            <td>{{ $mainPageBanner->id }}</td>
                            <td>
                                <img src="{{ $mainPageBanner->image_url }}" alt="{{ $mainPageBanner->title }}"
                                     class="img-thumbnail" width="100">
                            </td>
                            <td>{{ $mainPageBanner->title }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.mainPageBanners.edit', ['mainPageBanner' => $mainPageBanner]) }}"
                                       title="Редактировать" class="btn btn-primary btn-sm ">
                                        Редактировать
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.mainPageBanners.destroy', ['mainPageBanner' => $mainPageBanner]) }}"
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
                            Баннеры не найдены
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Создаем массив для хранения выбранных файлов
    let selectedFiles = [];

    document.getElementById('upload_button').onclick = function() {
        // Эмулируем клик по input
        document.getElementById('production_images').click();
    };

    document.getElementById('production_images').onchange = function(event) {
        // Добавляем новые файлы к уже выбранным
        selectedFiles = selectedFiles.concat(Array.from(event.target.files));

        // Создаем новый объект DataTransfer
        let dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => {
            // Добавляем каждый файл в объект DataTransfer
            dataTransfer.items.add(file);
        });

        // Устанавливаем файлы в input через объект DataTransfer
        document.getElementById('production_images').files = dataTransfer.files;
    };
</script>
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
@endpush

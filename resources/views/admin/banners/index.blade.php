@extends('layouts.admin')

@section('title', 'Баннеры')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Баннеры</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <div class="card-tools d-flex align-items-center flex-wrap justify-content-between mb-4">
            <a href="{{ route('admin.banners.create')}}"
                class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0"
                   title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>

                <form method="GET" action="{{ route('admin.banners.index') }}">
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
                    @forelse($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>
                                <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                                     class="img-thumbnail" width="100">
                            </td>
                            <td>{{ $banner->title }}</td>
                            <td>
                                <div class="card-tools">
                                    <a href="{{ route('admin.banners.edit', ['banner' => $banner]) }}"
                                       title="Редактировать" class="btn btn-primary btn-sm ">
                                        Редактировать
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.banners.destroy', ['banner' => $banner]) }}"
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

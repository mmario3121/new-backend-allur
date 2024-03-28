@extends('layouts.admin')

@section('title', "Мир Хонгчи ")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Мир Хонгчи</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <div class="card-tools mb-4">
                <a href="{{ route('admin.worldCategories.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Картинка</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($worldCategories as $worldCategory)
                        <tr>
                            <td>{{ $worldCategory->title }}</td>
                            <td>
                                <img src="{{ $worldCategory->image_url }}" alt="{{ $worldCategory->title }}" width="100">
                            </td>
                            <td>{{ $worldCategory->created_at }}</td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.worldCategories.edit', ['worldCategory' => $worldCategory]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.worldCategories.destroy', ['worldCategory' => $worldCategory])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удаление" type="submit" class="dropdown-item"
                                                        onclick="confirm('Подтвердите удаление')">
                                                    Удалить
                                                </button>
                                            </form>
                                            @if($worldCategory->slug == 'rnd')
                                                <a href="{{ route('admin.rnds.edit') }}"
                                                   class="dropdown-item">Страница</a>
                                            @elseif($worldCategory->slug == 'achievements')
                                                <a href="{{ route('admin.achievements.index') }}"
                                                   class="dropdown-item">Страница</a>
                                            @elseif($worldCategory->slug == 'social')
                                                <a href="{{ route('admin.socials.index') }}"
                                                   class="dropdown-item">Страница</a>
                                            @else
                                            <a href="{{ route('admin.worlds.index', ['worldCategory_id' => $worldCategory->id]) }}"
                                               class="dropdown-item">Миры</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" class="text-danger" colspan="4">
                                Не найдено
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.admin')

@section('title', "Слайдер ")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Слайды</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <div class="card-tools mb-4">
                <a href="{{ route('admin.companySliders.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Картинка</th>
                        <th>Текст</th>
                        <th>Позиция</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($companySliders as $companySlider)
                        <tr>
                            <td>
                                <img width="200" src="{{ $companySlider->image_url }}">
                            </td>
                            <td>
                                {{ $companySlider->title }}
                            </td>
                            <td>
                                {{ $companySlider->position }}
                            </td>
                            <td>
                                {{ $companySlider->created_at }}
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.companySliders.edit', ['companySlider' => $companySlider]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.companySliders.destroy', ['companySlider' => $companySlider])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удаление" type="submit" class="dropdown-item"
                                                        onclick="confirm('Подтвердите удаление')">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" class="text-danger" colspan="4">
                                Слайды не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

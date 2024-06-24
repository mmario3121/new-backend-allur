@extends('layouts.admin')

@section('title', "Komek/Litro ")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Komek/Litro</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <div class="card-tools mb-4">
                <a href="{{ route('admin.komeks.create') }}"
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
                        <th>Карточки</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($komeks as $komek)
                        <tr>
                            <td>
                            @if($komek->id == 1)
                                Комек
                            @elseif($komek->id == 2)
                                Trade-In
                            @endif
                            </td>
                            <td class="btn-row-width-10">
                                <div class="margin">
                                    <div class="btn-group">
                                    <a href="{{ route('admin.komeks.edit', ['komek' => $komek]) }}"
                                        class="btn btn-default">Изменить</a>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <form
                                            action="{{route('admin.komeks.destroy', ['komek' => $komek])}}"
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

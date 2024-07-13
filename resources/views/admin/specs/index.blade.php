@extends('layouts.admin')

@section('title', "Характеристики")

@section('content')
<div class="container">
    <div class="container-fluid">

    @include('admin._components.alert')
    <a href="{{ route('admin.complectations.index', ['model_id' => $complectation->model_id]) }}" title="Назад"
        class="btn btn-warning btn-sm mb-3">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Назад
    </a>
    <div class="card-tools mb-4">
    <h5>Добавить характеристику</h5>
    <form action="{{ route('admin.specs.store') }}" method="POST" class="form-inline">
        @csrf

        <div class="form-group mb-2">
            <label for="value" class="sr-only">Значение</label>
            <input type="text" class="form-control" id="value" name="value" required placeholder="Значение">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="type" class="sr-only">Тип</label>
            <select class="form-control @error('type') is-invalid @enderror" title="type" id="type" name="type">
                <option value="">Выберите тип</option>
                <option value="main">
                    Основные
                </option>
                <option value="exterior">
                    Экстерьер
                </option>
                <option value="interior">
                    Интерьер
                </option>
                <option value="comfort">
                    Комфорт
                </option>
                <option value="safety">
                    Безопасность
                </option>
            </select>
        </div>
        <input type="hidden" name="complectation_id" value="{{ $complectation->id }}">

        <button type="submit" class="btn btn-primary mb-2">Сохранить</button>
    </form>
    </div>

    <h2>Характеристики Для {{ $complectation->title }}</h2>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($complectation->specs->groupBy('type') as $type => $specs)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $type }}-tab" data-toggle="tab" href="#{{ $type }}" role="tab" aria-controls="{{ $type }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                @if($type == 'main')
                    Основные
                @elseif($type == 'exterior')
                    Экстерьер
                @elseif($type == 'interior')
                    Интерьер
                @elseif($type == 'comfort')
                    Комфорт
                @elseif($type == 'safety')
                    Безопасность
                @endif
            </a>
            </li>
        @endforeach
    </ul>
    
    <div class="tab-content" id="myTabContent">
    @foreach($complectation->specs->groupBy('type') as $type => $specs)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $type }}" role="tabpanel" aria-labelledby="{{ $type }}-tab">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Значение</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($specs as $spec)
                        <tr>
                            <td>{{ $spec->value }}</td>
                            <td>
                                <!-- Кнопка редактирования -->
                                <a href="{{ route('admin.specs.edit', $spec->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                                <!-- Кнопка удаления -->
                                <form action="{{ route('admin.specs.destroy', $spec->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
</div>
@endsection

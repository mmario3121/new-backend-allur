@extends('layouts.admin')

@section('title', "Характеристики")

@section('content')
<div class="container">
    <div class="container-fluid">

    @include('admin._components.alert')
    <a href="{{ route('admin.models.index', ['brand_id' => $model->brand_id]) }}" title="Назад"
        class="btn btn-warning btn-sm mb-3">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Назад
    </a>
    <div class="card-tools mb-4">
        <a href="{{ route('admin.specs.create', ['model_id' => $model->id]) }}"
        class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Добавить
        </a>
    </div>

    <h2>Характеристики Для {{ $model->title }}</h2>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($model->specs->groupBy('type') as $type => $specs)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $type }}-tab" data-toggle="tab" href="#{{ $type }}" role="tab" aria-controls="{{ $type }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $type }}</a>
            </li>
        @endforeach
    </ul>
    
    <div class="tab-content" id="myTabContent">
    @foreach($model->specs->groupBy('type') as $type => $specs)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $type }}" role="tabpanel" aria-labelledby="{{ $type }}-tab">
            <ul>
                @foreach($specs as $spec)
                    <li>
                        {{ $spec->name }}: {{ $spec->value }}
                        <!-- Кнопка редактирования -->
                        <a href="{{ route('admin.specs.edit', $spec->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                        <!-- Кнопка удаления -->
                        <form action="{{ route('admin.specs.destroy', $spec->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
</div>
@endsection

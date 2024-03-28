<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($specification) ? $specification->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($specification) ? $specification->title_kz : (old('title_kz') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="value" class="control-label" title="Заполните обязательно!">
                Значение
            </label>
            <input class="form-control @error('value') is-invalid @enderror" title="value" type="value"
                   id="value" name="value" value="{{  isset($specification) ? $specification->value : (old('value') ?? '') }}">
            @error('value')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="value_kz" class="control-label" title="Заполните обязательно!">
            Значение KZ
            </label>
            <input class="form-control @error('value_kz') is-invalid @enderror" title="value_kz" type="text"
                   id="value_kz" name="value_kz" value="{{  isset($specification) ? $specification->value_kz : (old('value_kz') ?? '') }}">
            @error('value_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="position" class="control-label" title="Заполните обязательно!">
                Сортировка
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="text"
                   id="position" name="position" value="{{  isset($specification) ? $specification->position : (old('position') ?? '') }}">
            @error('position')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
         <div class="form-group required">
            <label for="complectation_id" class="control-label">Комплектация </label>
            <select name="complectation_id" id="complectation_id" class="form-control select2" style="width: 100%;">
                @forelse($complectations as $complectation)
                    <option
                        {{ isset($specification) && $specification->complectation_id == $complectation->id ? 'selected' : (old('complectation_id') == $complectation->id ? 'selected' : '') }}
                        value="{{ $complectation->id }}">
                        {{ $complectation->title }}
                    </option>
                @empty
                    Комплектации не найдены
                @endforelse
            </select>
        </div>
        <input type="hidden" title="specification_category_id" type="text"
                   id="specification_category_id" name="specification_category_id" value="{{ $specificationCategory->id}}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

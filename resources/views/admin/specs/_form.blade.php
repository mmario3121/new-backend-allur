<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="type" class="control-label" title="Заполните обязательно!">
                Тип
            </label>
            <select class="form-control @error('type') is-invalid @enderror" title="type" id="type" name="type">
                <option value="">Выберите тип</option>
                    <option value="main"
                            @if(isset($spec) && $spec->type == "main") selected @endif>
                        Основные
                    </option>
                    <option value="exterior"
                            @if(isset($spec) && $spec->type == "exterior") selected @endif>
                        Экстерьер
                    </option>
                    <option value="interior"
                            @if(isset($spec) && $spec->type == "interior") selected @endif>
                        Интерьер
                    </option>
                    <option value="comfort"
                            @if(isset($spec) && $spec->type == "comfort") selected @endif>
                        Комфорт
                    </option>
                    <option value="safety"
                            @if(isset($spec) && $spec->type == "safety") selected @endif>
                        Безопасность
                    </option>
            </select>
            @error('type')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="value" class="control-label" title="Заполните обязательно!">
                Значение
            </label>
            <input class="form-control @error('value') is-invalid @enderror" title="value" type="text"
                   id="value" value="{{  isset($spec) ? $spec->value : (old('value') ?? '') }}"
                   name="value"
                   >
            @error('value')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="value_kz" class="control-label" title="Заполните обязательно!">
                Значение KZ
            </label>
            <input class="form-control @error('value_kz') is-invalid @enderror" title="value_kz" type="text"
                   id="value_kz" value="{{  isset($spec) ? $spec->value_kz : (old('value_kz') ?? '') }}"
                   name="value_kz"
                   >
            @error('value_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="complectation_id" class="control-label" title="Заполните обязательно!">
                Модель
            </label>
            <select class="form-control @error('complectation_id') is-invalid @enderror" title="complectation_id" id="complectation_id" name="complectation_id">
                <option value="">Выберите модель</option>
                @foreach($complectations as $complectation)
                    <option value="{{ $complectation->id }}"
                            @if(isset($spec) && $spec->complectation_id == $complectation->id) selected @endif>
                        {{ $complectation->title }}
                    </option>
                @endforeach
            </select>
            @error('complectation_id')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

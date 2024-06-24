<div class="row">
    <div class="col-md-12">

        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обизательно!">
                Картинка </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
                @error('image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="position" class="control-label" title="Заполните обязательно!">
                Сортировка
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="text"
                   id="position" name="position" value="{{  isset($modelSlider) ? $modelSlider->position : (old('position') ?? '') }}">
            @error('bitrix_id')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="section" class="control-label" title="Заполните обязательно!">
                Секция
            </label>
            <select class="form-control @error('section') is-invalid @enderror" title="section" id="section" name="section">
                <option value="">Выберите секцию</option>
                    <option value="main"
                            @if(isset($modelSlider) && $modelSlider->section == "main") selected @endif>
                        Основные
                    </option>
                    <option value="exterior"
                            @if(isset($modelSlider) && $modelSlider->section == "exterior") selected @endif>
                        Экстерьер
                    </option>
                    <option value="interior"
                            @if(isset($modelSlider) && $modelSlider->section == "interior") selected @endif>
                        Интерьер
                    </option>
                    <option value="comfort"
                            @if(isset($modelSlider) && $modelSlider->section == "comfort") selected @endif>
                        Комфорт
                    </option>
                    <option value="safety"
                            @if(isset($modelSlider) && $modelSlider->section == "safety") selected @endif>
                        Безопасность
                    </option>
            </select>
            @error('section')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <input type="hidden" title="model_id" type="text"
                   id="model_id" name="model_id" value="{{ $model->id}}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="position" class="control-label" title="Заполните обязательно!">
                Сортировка
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="text"
                   id="position" name="position" value="{{  isset($library) ? $library->position : (old('position') ?? '') }}">
            @error('position')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
         <div class="form-group required">
            <label for="model_id" class="control-label">Модель </label>
            <select name="model_id" id="model_id" class="form-control select2" style="width: 100%;">
                @forelse($models as $model)
                    <option
                        {{ isset($library) && $library->model_id == $model->id ? 'selected' : (old('model_id') == $model->id ? 'selected' : '') }}
                        value="{{ $model->id }}">
                        {{ $model->title }}
                    </option>
                @empty
                    Модели не найдены
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <label for="type" class="control-label">Тип </label>
            <select name="type" id="type" class="form-control select2" style="width: 100%;">
                <option
                    {{ isset($library) && $library->type == 'image' ? 'selected' : '' }}
                    value="image">
                    HONGQI ФОТОГРАФИИ
                </option>
                <option
                    {{ isset($library) && $library->type == 'video' ? 'selected' : '' }}
                    value="video">
                    HONGQI ВИДЕО
                </option>
                <option
                    {{ isset($library) && $library->type == 'file' ? 'selected' : '' }}
                    value="file">
                    HONGQI ДАННЫЕ
                </option>
            </select>
        </div>
        <div class="form-group required ">
            <label for="file" class="control-label" title="Заполните обизательно!">
                Файл </label>
            <input class="form-control @error('file') is-invalid @enderror"
                name="file" type="file" id="file">
                @error('file')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="file_name" class="control-label" title="Заполните обязательно!">
                Название Файла
            </label>
            <input class="form-control @error('file_name') is-invalid @enderror" title="file_name" type="text"
                   id="file_name" name="file_name" value="{{  isset($library) ? $library->file_name : (old('file_name') ?? '') }}">
            @error('file_name')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group ">
            <label for="cover_photo" class="control-label" title="Заполните обизательно!">
                Обложка </label>
            <input class="form-control @error('cover_photo') is-invalid @enderror"
                name="cover_photo" type="file" id="cover_photo">
                @error('cover_photo')
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

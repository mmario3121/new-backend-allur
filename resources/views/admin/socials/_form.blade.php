<div class="row">
    <div class="col-md-12">
        <div class="form-group required">
            <select name="type" class="form-control select2" style="width: 100%;" required>
                <option>Тип</option>
                <option value="charity" {{ (isset($social) && $social->type === 'charity') || old('type') == 'charity' ? 'selected' : '' }}>
                    Благотворительность
                </option>
                <option value="education" {{ (isset($social) && $social->type === 'education') || old('type') == 'education' ? 'selected' : '' }}>
                    Образование
                </option>
                <option value="material_aid" {{ (isset($social) && $social->type === 'material_aid') || old('type') == 'material_aid' ? 'selected' : '' }}>
                    Материальная помощь
                </option>
                <option value="sport" {{ (isset($social) && $social->type === 'sport') || old('type') == 'sport' ? 'selected' : '' }}>
                    Спорт
                </option>
            </select>
        </div>
        
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" value="{{  isset($social) ? $social->title : (old('title') ?? '') }}"
                   name="title"
                   >
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" value="{{  isset($social) ? $social->title_kz : (old('title_kz') ?? '') }}"
                   name="title_kz"
                   >
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="text" type="text"
                   id="text" value="{{  isset($social) ? $social->text : (old('text') ?? '') }}"
                   name="text"
                   >
            @error('text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="text_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <input class="form-control @error('text_kz') is-invalid @enderror" title="text_kz" type="text"
                   id="text_kz" value="{{  isset($social) ? $social->text_kz : (old('text_kz') ?? '') }}"
                   name="text_kz"
                   >
            @error('text_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                   id="image" value="{{  isset($social) ? $social->image : (old('image') ?? '') }}"
                   name="image"
                   >
            @error('image')
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

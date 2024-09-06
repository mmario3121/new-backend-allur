<div class="row">
    <div class="col-md-12">
        <h1 class="h1">О компании</h1>

        <div class="form-group required ">
            <label for="production_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('production_title') is-invalid @enderror" title="production_title" type="text"
                   id="production_title" name="production_title" value="{{  isset($mainPage) ? $mainPage->production_title : (old('production_title') ?? '') }}">
            @error('production_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок KZ
            </label>
            <input class="form-control @error('production_title_kz') is-invalid @enderror" title="production_title_kz" type="text"
                   id="production_title_kz" name="production_title_kz" value="{{  isset($mainPage) ? $mainPage->production_title_kz : (old('production_title_kz') ?? '') }}">
            @error('production_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="production_description" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control @error('production_description') is-invalid @enderror" title="production_description" id="production_description" name="production_description" rows="4">{{  isset($mainPage) ? $mainPage->production_description : (old('production_description') ?? '') }}</textarea>
            @error('production_description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_description_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <textarea class="form-control @error('production_description_kz') is-invalid @enderror" title="production_description_kz" id="production_description_kz" name="production_description_kz" rows="4">{{  isset($mainPage) ? $mainPage->production_description_kz : (old('production_description_kz') ?? '') }}</textarea>
            @error('production_description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="consultation_photo" class="control-label" title="Заполните обизательно!">
                Фото</label>
            <input class="form-control @error('consultation_photo') is-invalid @enderror"
                name="consultation_photo" type="file" id="consultation_photo">
                @error('consultation_photo')
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

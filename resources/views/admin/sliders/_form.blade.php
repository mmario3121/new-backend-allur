<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="link" class="control-label" title="Заполните обязательно!">
                Ссылка
            </label>
            <input class="form-control @error('link') is-invalid @enderror" title="link" type="text"
                   id="link" name="link" value="{{  isset($slider) ? $slider->link : (old('link') ?? '') }}">
            @error('link')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($slider) ? $slider->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($slider) ? $slider->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
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
            <label for="image_mob" class="control-label" title="Заполните обизательно!">
                Картинка(Мобильная) </label>
            <input class="form-control @error('image_mob') is-invalid @enderror"
                name="image_mob" type="file" id="image_mob">
                @error('image_mob')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="image_kz" class="control-label" title="Заполните обизательно!">
                Картинка KZ</label>
            <input class="form-control @error('image_kz') is-invalid @enderror"
                name="image_kz" type="file" id="image_kz">
                @error('image_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="image_mob_kz" class="control-label" title="Заполните обизательно!">
                Картинка(Мобильная) KZ </label>
            <input class="form-control @error('image_mob_kz') is-invalid @enderror"
                name="image_mob_kz" type="file" id="image_mob_kz">
                @error('image_mob_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="icon" class="control-label" title="Заполните обязательно!">
                Иконка
            </label>
            <input class="form-control @error('icon') is-invalid @enderror"
            name="icon" type="file" id="icon">
            @error('icon')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="position" class="control-label" title="Заполните обязательно!">
                Очередность
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="number"
                   id="position" name="position" value="{{  isset($slider) ? $slider->position : (old('position') ?? '') }}">
            @error('position')
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

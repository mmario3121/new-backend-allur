<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($komek) ? $komek->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для казахского
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($komek) ? $komek->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control @error('text') is-invalid @enderror" title="text" id="text" name="text"
                      rows="10">{{  isset($komek) ? $komek->text : (old('text') ?? '') }}</textarea>
            @error('text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text_kz" class="control-label" title="Заполните обязательно!">
                Текст для казахского
            </label>
            <textarea class="form-control @error('text_kz') is-invalid @enderror" title="text_kz" id="text_kz" name="text_kz"
                      rows="10">{{  isset($komek) ? $komek->text_kz : (old('text_kz') ?? '') }}</textarea>
            @error('text_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                   id="image" name="image">
            @error('image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="form_image" class="control-label" title="Заполните обязательно!">
                Изображение формы
            </label>
            <input class="form-control @error('form_image') is-invalid @enderror" title="form_image" type="file"
                   id="form_image" name="form_image">
            @error('form_image')
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

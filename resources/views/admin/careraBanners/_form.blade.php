<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($careraBanner) ? $careraBanner->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($careraBanner) ? $careraBanner->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="text" type="text"
                   id="text" name="text" value="{{  isset($careraBanner) ? $careraBanner->text : (old('text') ?? '') }}">
            @error('text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <input class="form-control @error('text_kz') is-invalid @enderror" title="text_kz" type="text"
                   id="text_kz" name="text_kz" value="{{  isset($careraBanner) ? $careraBanner->text_kz : (old('text_kz') ?? '') }}">
            @error('text_kz')
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
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

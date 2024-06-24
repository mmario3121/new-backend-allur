<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($color) ? $color->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($color) ? $color->title_kz : (old('title_kz') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="hex" class="control-label" title="Заполните обизательно!">
                Картинка </label>
            <input class="form-control @error('hex') is-invalid @enderror"
                name="hex" type="file" id="hex">
                @error('hex')
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
            <label for="position" class="control-label" title="Заполните обязательно!">
                Сортировка
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="text"
                   id="position" name="position" value="{{  isset($color) ? $color->position : (old('position') ?? '') }}">
            @error('bitrix_id')
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

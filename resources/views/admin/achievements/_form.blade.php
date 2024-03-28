<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($achievement) ? $achievement->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($achievement) ? $achievement->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="description" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control ckeditor @error('description') is-invalid @enderror" title="description" type="text"
                   id="description" name="description">{{  isset($achievement) ? $achievement->description : (old('description') ?? '') }}</textarea>
            @error('description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="description_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <textarea class="form-control ckeditor @error('description_kz') is-invalid @enderror" title="description_kz" type="text"
                   id="description_kz" name="description_kz" >{{  isset($achievement) ? $achievement->description_kz : (old('description_kz') ?? '') }}</textarea>
            @error('description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="description2" class="control-label" title="Заполните обязательно!">
                Дополнительный Текст
            </label>
            <textarea class="form-control ckeditor @error('description2') is-invalid @enderror" title="description2" type="text"
                   id="description2" name="description2">{{  isset($achievement) ? $achievement->description2 : (old('description2') ?? '') }}</textarea>
            @error('description2')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="description2_kz" class="control-label" title="Заполните обязательно!">
                Дополнительный Текст KZ
            </label>
            <textarea class="form-control ckeditor @error('description2_kz') is-invalid @enderror" title="description2_kz" type="text"
                   id="description2_kz" name="description2_kz" >{{  isset($achievement) ? $achievement->description2_kz : (old('description2_kz') ?? '') }}</textarea>
            @error('description2_kz')
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

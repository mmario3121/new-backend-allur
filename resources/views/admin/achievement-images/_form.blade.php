<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Картинка
            </label>
            <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                   id="image" name="image" value="{{  isset($achievementImage) ? $achievementImage->image : (old('image') ?? '') }}">
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

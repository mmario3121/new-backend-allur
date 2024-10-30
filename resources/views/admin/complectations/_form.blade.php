<div class="row">
    <div class="col-md-12">
    <div class="form-group required">
            <label for="is_active" class="control-label" title="Заполните обязательно!">
                Активность
            </label>
            <input type="checkbox" name="is_active" id="is_active" class="form-control" value="1"
                   {{ (isset($complectation) && $complectation->is_active) || old('is_active') ? 'checked' : '' }}>
        </div>
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($complectation) ? $complectation->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="price" class="control-label" title="Заполните обязательно!">
                Цена
            </label>
            <input class="form-control @error('price') is-invalid @enderror" title="price" type="text"
                   id="price" name="price" value="{{  isset($complectation) ? $complectation->price : (old('price') ?? '') }}">
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

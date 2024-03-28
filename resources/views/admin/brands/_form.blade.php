<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" value="{{  isset($brand) ? $brand->title : (old('title') ?? '') }}"
                   name="title"
                   >
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="position" class="control-label" title="Заполните обязательно!">
                Очередь
            </label>
            <input class="form-control @error('position') is-invalid @enderror" title="position" type="text"
                   id="position" value="{{  isset($brand) ? $brand->position : (old('position') ?? '') }}"
                   name="position"
                   >
            @error('position')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="logo" class="control-label" title="Заполните обязательно!">
                Лого
            </label>
            <input class="form-control @error('logo') is-invalid @enderror" title="logo" type="file"
                   id="logo" value="{{  isset($brand) ? $brand->logo : (old('logo') ?? '') }}"
                   name="logo"
                   >
            @error('logo')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="bitrix_id" class="control-label" title="Заполните обязательно!">
                ID битрикс
            </label>
            <input class="form-control @error('bitrix_id') is-invalid @enderror" title="bitrix_id" type="text"
                   id="bitrix_id" value="{{  isset($brand) ? $brand->bitrix_id : (old('bitrix_id') ?? '') }}"
                   name="bitrix_id"
                   >
            @error('bitrix_id')
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

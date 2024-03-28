<div class="row">
    <div class="col-md-12">
        <div class="form-group required">
            <select name="brand_id" class="form-control select2" style="width: 100%;" required>
                <option>Бренд</option>
                @forelse($brands as $brand)
                    <option
                        value="{{ $brand->id }}" {{ (isset($model) && $model->brand_id === $brand->id) ? 'selected' : (old('brand_id') && old('brand_id') == $brand->id ? 'selected' : '')  }}>
                        {{ $brand->title }}
                    </option>
                @empty
                    <option disabled>
                        Бренды не найдены
                    </option>
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <label for="is_active" class="control-label" title="Заполните обязательно!">
                Активность
            </label>
            <input type="checkbox" name="is_active" id="is_active" class="form-control" value="1"
                   {{ (isset($model) && $model->is_active) || old('is_active') ? 'checked' : '' }}>
        </div>
        
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($model) ? $model->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($model) ? $model->title_kz : (old('title_kz') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Код
            </label>
            <input class="form-control @error('slug') is-invalid @enderror" title="title" type="text"
                   id="slug" name="slug" value="{{  isset($model) ? $model->slug : (old('slug') ?? '') }}">
            @error('slug')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <select name="type_id" class="form-control select2" style="width: 100%;" required>
                <option>Тип</option>
                @forelse($types as $type)
                    <option
                        value="{{ $type->id }}" {{ (isset($model) && $model->type_id === $type->id) ? 'selected' : (old('type_id') && old('type_id') == $type->id ? 'selected' : '')  }}>
                        {{ $type->title }}
                    </option>
                @empty
                    <option disabled>
                        Типы не найдены
                    </option>
                @endforelse
            </select>
        </div>
        <div class="form-group required ">
            <label for="bitrix_id" class="control-label" title="Заполните обязательно!">
                Bitrix ID
            </label>
            <input class="form-control @error('bitrix_id') is-invalid @enderror" title="bitrix_id" type="text"
                   id="bitrix_id" name="bitrix_id" value="{{  isset($model) ? $model->bitrix_id : (old('bitrix_id') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="logo" class="control-label" title="Заполните обизательно!">
                Лого(Для навбара) </label>
            <input class="form-control @error('logo') is-invalid @enderror"
                name="logo" type="file" id="logo">
                @error('logo')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        <div class="form-group required ">
            <label for="video" class="control-label" title="Заполните обизательно!">
                Видео </label>
            <input class="form-control @error('video') is-invalid @enderror"
                name="video" type="file" id="video">
                @error('video')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="price_list" class="control-label" title="Заполните обизательно!">
                Прайс-Лист </label>
            <input class="form-control @error('price_list') is-invalid @enderror"
                name="price_list" type="file" id="price_list">
                @error('price_list')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="document" class="control-label" title="Заполните обизательно!">
                Брошюра </label>
            <input class="form-control @error('document') is-invalid @enderror"
                name="document" type="file" id="document">
                @error('document')
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

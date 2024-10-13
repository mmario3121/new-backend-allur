<div class="row">
    <div class="col-md-12">
        <div class="form-group required">
            <select name="brand_id" class="form-control select2" style="width: 100%;" required>
                    <option>Бренд</option>
                        @forelse($brands as $brand)
                            <option
                                value="{{ $brand->id }}" {{ (isset($model) && $model->brand_id === $brand->id) || (old('brand_id') == $brand->id) || (isset(request()->brand_id) && request()->brand_id == $brand->id) ? 'selected' : '' }}>
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
                Лого(Для Финанс) </label>
            <input class="form-control @error('logo') is-invalid @enderror"
                name="logo" type="file" id="logo">
                @error('logo')
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
            <label for="price_list_kz" class="control-label" title="Заполните обизательно!">
                Прайс-Лист KZ</label>
            <input class="form-control @error('price_list_kz') is-invalid @enderror"
                name="price_list_kz" type="file" id="price_list_kz">
                @error('price_list_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group">
            <label for="document" class="control-label" title="Заполните обизательно!">
                Брошюра </label>
            <input class="form-control @error('document') is-invalid @enderror"
                name="document" type="file" id="document">
                @error('document')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="document_kz" class="control-label" title="Заполните обизательно!">
                Брошюра KZ</label>
            <input class="form-control @error('document_kz') is-invalid @enderror"
                name="document_kz" type="file" id="document_kz">
                @error('document_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="main_page_image" class="control-label" title="Заполните обязательно!">
                Изображение на Главной</label>
            <input class="form-control @error('main_page_image') is-invalid @enderror"
                name="main_page_image" type="file" id="main_page_image">
                @error('main_page_image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        @for($i = 1; $i <= 4; $i++)
        <div class="row">
            <div class="form-group col-md-3">
                <label for="char{{ $i }}_title" class="control-label" title="Заполните обязательно!">
                    Характеристика {{ $i }} Название
                </label>
                <input class="form-control @error('char'.$i.'_title') is-invalid @enderror" title="char{{ $i }}_title" type="text"
                    id="char{{ $i }}_title" name="char{{ $i }}_title" value="{{  isset($model) ? $model->{"char".$i."_title"} : (old('char'.$i.'_title') ?? '') }}">
                @error('char'.$i.'_title')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="char{{ $i }}_title_kz" class="control-label" title="Заполните обязательно!">
                    Характеристика {{ $i }} Название KZ
                </label>
                <input class="form-control @error('char'.$i.'_title_kz') is-invalid @enderror" title="char{{ $i }}_title_kz" type="text"
                    id="char{{ $i }}_title_kz" name="char{{ $i }}_title_kz" value="{{  isset($model) ? $model->{"char".$i."_title_kz"} : (old('char'.$i.'_title_kz') ?? '') }}">
                @error('char'.$i.'_title_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="char{{ $i }}_value_kz" class="control-label" title="Заполните обязательно!">
                    Характеристика {{ $i }} Значение
                </label>
                <input class="form-control @error('char'.$i.'_value') is-invalid @enderror" title="char{{ $i }}_value" type="text"
                    id="char{{ $i }}_value" name="char{{ $i }}_value" value="{{  isset($model) ? $model->{"char".$i."_value"} : (old('char'.$i.'_value') ?? '') }}">
                @error('char'.$i.'_value')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="char{{ $i }}_value_kz" class="control-label" title="Заполните обязательно!">
                    Характеристика {{ $i }} Значение KZ
                </label>
                <input class="form-control @error('char'.$i.'_value_kz') is-invalid @enderror" title="char{{ $i }}_value_kz" type="text"
                    id="char{{ $i }}_value_kz" name="char{{ $i }}_value_kz" value="{{  isset($model) ? $model->{"char".$i."_value_kz"} : (old('char'.$i.'_value_kz') ?? '') }}">
                @error('char'.$i.'_value_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        </div>
        @endfor
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

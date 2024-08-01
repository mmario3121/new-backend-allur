<div class="row">
    <div class="col-md-12">
        <div class="form-group  ">
            <label for="link" class="control-label" title="Заполните обязательно!">
                Ссылка </label>
            <input class="form-control @error('link') is-invalid @enderror"
                name="link" type="text" id="link" value="{{  isset($promo) ? $promo->link : (old('link') ?? '') }}">
            @error('link')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок </label>
            <input class="form-control @error('title') is-invalid @enderror"
                name="title" type="text" id="title" value="{{  isset($promo) ? $promo->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (kz) </label>
            <input class="form-control @error('title_kz') is-invalid @enderror"
                name="title_kz" type="text" id="title_kz" value="{{  isset($promo) ? $promo->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="description" class="control-label" title="Заполните обязательно!">
                Описание </label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                name="description" cols="50" rows="10" id="description">{{  isset($promo) ? $promo->description : (old('description') ?? '') }}</textarea>
            @error('description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="description_kz" class="control-label" title="Заполните обязательно!">
                Описание (kz) </label>
            <textarea class="form-control @error('description_kz') is-invalid @enderror"
                name="description_kz" cols="50" rows="10" id="description_kz">{{  isset($promo) ? $promo->description_kz : (old('description_kz') ?? '') }}</textarea>
            @error('description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
            @error('image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="title2" class="control-label" title="Заполните обязательно!">
                Заголовок 2 </label>
            <input class="form-control @error('title2') is-invalid @enderror"
                name="title2" type="text" id="title2" value="{{  isset($promo) ? $promo->title2 : (old('title2') ?? '') }}">
            @error('title2')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="title2_kz" class="control-label" title="Заполните обязательно!">
                Заголовок 2 (kz) </label>
            <input class="form-control @error('title2_kz') is-invalid @enderror"
                name="title2_kz" type="text" id="title2_kz" value="{{  isset($promo) ? $promo->title2_kz : (old('title2_kz') ?? '') }}">
            @error('title2_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="description2" class="control-label" title="Заполните обязательно!">
                Описание 2 </label>
            <textarea class="form-control @error('description2') is-invalid @enderror"
                name="description2" cols="50" rows="10" id="description2">{{  isset($promo) ? $promo->description2 : (old('description2') ?? '') }}</textarea>
            @error('description2')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group  ">
            <label for="description2_kz" class="control-label" title="Заполните обязательно!">
                Описание 2 (kz) </label>
            <textarea class="form-control @error('description2_kz') is-invalid @enderror"
                name="description2_kz" cols="50" rows="10" id="description2_kz">{{  isset($promo) ? $promo->description2_kz : (old('description2_kz') ?? '') }}</textarea>
            @error('description2_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group  ">
            <label for="image2" class="control-label" title="Заполните обязательно!">
                Изображение 2 </label>
            <input class="form-control @error('image2') is-invalid @enderror"
                name="image2" type="file" id="image2">
            @error('image2')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group  ">
            <label for="has_form" class="control-label" title="Заполните обязательно!">
                Форма </label>
            <input class="form-control @error('has_form') is-invalid @enderror"
                name="has_form" type="checkbox" id="has_form" value="1" {{  isset($promo) && $promo->has_form ? 'checked' : (old('has_form') ? 'checked' : '') }}>
            @error('has_form')
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

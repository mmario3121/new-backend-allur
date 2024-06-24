<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" value="{{  isset($brandPage) ? $brandPage->title : (old('title') ?? '') }}"
                   name="title"
                   >
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
                        <label for="description">Текст </label>
                        <textarea id="description"
                                  class="form-control ckeditor @error('description') is-invalid @enderror"
                                  rows="3" name="description"
                        >{{ isset($brandPage) ? $brandPage->description : (old('description') ?? '') }}</textarea>
                        @error('description')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название (kz)
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" value="{{  isset($brandPage) ? $brandPage->title_kz : (old('title_kz') ?? '') }}"
                   name="title_kz"
                   >
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description_kz">Текст (kz) </label>
            <textarea id="description_kz"
                      class="form-control ckeditor @error('description_kz') is-invalid @enderror"
                      rows="3" name="description_kz"
            >{{ isset($brandPage) ? $brandPage->description_kz : (old('description_kz') ?? '') }}</textarea>
            @error('description_kz')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                   id="image" value="{{  isset($brandPage) ? $brandPage->image : (old('image') ?? '') }}"
                   name="image"
                   >
            @error('image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        @if(isset($brandPage->image))
            <div class="form-group">
                <img src="{{ $brandPage->image_url }}"
                     alt="{{ $brandPage->title }}"
                     style="max-width: 100px; max-height: 100px">
            </div>
        @endif
        <input type="hidden" name="brand_id" value="{{ $brand_id ?? $brandPage->brand_id }}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

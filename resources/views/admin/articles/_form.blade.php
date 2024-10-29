<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            <ul class="nav nav-tabs mb-3" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item active">
                    <button class="nav-link active" id="ru-tab" data-toggle="pill" href="#ru-tab-content"
                            role="tab" aria-controls="ru-tab-content" aria-selected="true">Русский
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="kz-tab" data-toggle="pill" href="#kz-tab-content"
                            role="tab" aria-controls="kz-tab-content" aria-selected="false">Казахский
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade active in show" id="ru-tab-content" role="tabpanel"
                     aria-labelledby="ru-tab">
                    <div class="form-group">
                        <label for="title-ru" class="control-label" title="Заполните обизательно!">
                            Заголовок (Ru)
                        </label>
                        <input class="form-control @error('title.ru') is-invalid @enderror" name="title[ru]" type="text"
                               id="title-ru"
                               value="{{  isset($article) ? $article->titleTranslate?->ru : (old('title.ru') ?? '') }}">
                        @error('title.ru')
                        <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description-ru">Описание (Ru) </label>
                        <textarea id="description-ru"
                                  class="form-control ckeditor @error('description.ru') is-invalid @enderror"
                                  rows="3" name="description[ru]"
                        >{{ isset($article) ? $article->descriptionTranslate?->ru : (old('description.ru') ?? '') }}</textarea>
                        @error('description.ru')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description_mob-ru">Описание Моб(Ru) </label>
                        <textarea id="description_mob-ru"
                                  class="form-control ckeditor @error('description_mob.ru') is-invalid @enderror"
                                  rows="3" name="description_mob[ru]"
                        >{{ isset($article) ? $article->descriptionMobTranslate?->ru : (old('description_mob.ru') ?? '') }}</textarea>
                        @error('description_mob.ru')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="tab-pane fade" id="kz-tab-content" role="tabpanel"
                     aria-labelledby="kz-tab">
                    <div class="form-group">
                        <label for="title-kz" class="control-label">Заголовок (Kz) </label>
                        <input class="form-control @error('title.kz') is-invalid @enderror" name="title[kz]" type="text"
                               id="title-kz"
                               value="{{  isset($article) ? $article->titleTranslate?->kz : (old('title.kz') ?? '') }}">
                        @error('title.kz')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description-kz">Описание (Kz) </label>
                        <textarea id="description-kz"
                                  class="form-control ckeditor @error('description.kz') is-invalid @enderror"
                                  rows="3" name="description[kz]"
                        >{{ isset($article) ? $article->descriptionTranslate?->kz : (old('description.kz') ?? '') }}</textarea>
                        @error('description.kz')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description_mob-kz">Описание Моб(Kz) </label>
                        <textarea id="description_mob-kz"
                                  class="form-control ckeditor @error('description_mob.kz') is-invalid @enderror"
                                  rows="3" name="description_mob[kz]"
                        >{{ isset($article) ? $article->descriptionMobTranslate?->kz : (old('description_mob.kz') ?? '') }}</textarea>
                        @error('description_mob.kz')
                        <span class="error invalid-feedback"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group required">
            <label for="time" class="control-label">Время </label>
            <input class="form-control @error('time') is-invalid @enderror" name="time" type="date"
                   id="time" value="{{  isset($article) ? $article->time : (old('time') ?? date('Y-m-d')) }}">
            @error('time')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="image_kz" class="control-label">Фото KZ (Сверху внутри страницы)</label>
            <input class="form-control @error('image') is-invalid @enderror"
                   name="image_kz" type="file" id="image_kz" accept="image/*" onchange="loadFile2(event, 'kz')">
            @error('image_kz')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            <br>
            @if(isset($article))
                <img id="image-preview-kz" class="rounded" src="{{ $article->image_kz_url }}" style="max-width: 300px;"
                     alt="">
            @else
                <img id="image-preview-kz" class="rounded" style="display: none;max-width: 300px;" alt="">
            @endif
        </div>
        <div class="form-group required">
            <label for="image" class="control-label">Фото (Сверху внутри страницы)</label>
            <input class="form-control @error('image') is-invalid @enderror"
                   name="image" type="file" id="image" accept="image/*" onchange="loadFile(event)">
            @error('image')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            <br>
            @if(isset($article))
                <img id="image-preview" class="rounded" src="{{ $article->image_url }}" style="max-width: 300px;"
                     alt="">
            @else
                <img id="image-preview" class="rounded" style="display: none;max-width: 300px;" alt="">
            @endif
        </div>
        <div class="form-group">
            <label for="isForm" class="control-label">Форма </label>
            <input class="form-control @error('isForm') is-invalid @enderror" name="isForm" type="checkbox"
            id="isForm" value="1" {{ (isset($article) && $article->isForm) ? 'checked' : '' }}>
            @error('isForm')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="model_ids" class="control-label">Модель</label>
            @foreach($models as $model)
                <div class="form-check">
                    <input class="form-check-input @error('model_id') is-invalid @enderror"
                        type="checkbox"
                        name="model_ids[]"
                        id="model_{{ $model->id }}"
                        value="{{ $model->id }}"
                        @if(isset($article) && in_array($model->id, $article->model_ids ?? [])) checked @endif>
                    <label class="form-check-label" for="model_{{ $model->id }}">
                        {{ $model->title }}
                    </label>
                </div>
            @endforeach
            @error('model_ids')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="isFinance" class="control-label">Финансы </label>
            <input class="form-control @error('isFinance') is-invalid @enderror" name="isFinance" type="checkbox"
                id="isFinance" value="1" {{ (isset($article) && $article->isFinance) ? 'checked' : '' }}>
            @error('isFinance')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            </div>
            <div class="form-group">
            <label for="isMainPage" class="control-label">Главная страница </label>
            <input class="form-control @error('isMainPage') is-invalid @enderror" name="isMainPage" type="checkbox"
                id="isMainPage" value="1" {{ (isset($article) && $article->isMainPage) ? 'checked' : '' }}>
            @error('isMainPage')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            </div> 

            <div class="form-group">
            <label for="isSlider" class="control-label">Слайдер </label>
            <input class="form-control @error('isSlider') is-invalid @enderror" name="isSlider" type="checkbox"
                id="isSlider" value="1" {{ (isset($article) && $article->isSlider) ? 'checked' : '' }}>
            @error('isSlider')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            </div>

            <div class="form-group">
            <label for="isAbout" class="control-label">О нас </label>
            <input class="form-control @error('isAbout') is-invalid @enderror" name="isAbout" type="checkbox"
                id="isAbout" value="1" {{ (isset($article) && $article->isAbout) ? 'checked' : '' }}>
            @error('isAbout')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            </div>

            <div class="form-group">
            <label for="isProduction" class="control-label">Производство </label>
            <input class="form-control @error('isProduction') is-invalid @enderror" name="isProduction" type="checkbox"
            id="isProduction" value="1" {{ (isset($article) && $article->isProduction) ? 'checked' : '' }}>
            @error('isProduction')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            </div>

            <div class="form-group required">
            <label for="type" class="control-label">Тип </label>
            <select class="form-control @error('type') is-invalid @enderror" title="type" id="type" name="type">
                <option value="">Выберите тип</option>
                <option value="allur"
                        @if(isset($article) && $article->type == "allur") selected @endif>
                    Allur
                </option>
                <option value="retail"
                        @if(isset($article) && $article->type == "retail") selected @endif>
                    Розница
                </option>
                <option value="production"
                        @if(isset($article) && $article->type == "production") selected @endif>
                    Производство
                </option>
                <option value="distribution"
                        @if(isset($article) && $article->type == "distribution") selected @endif>
                    Дистрибуция
                </option>
            </select>
            @error('type')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
            </div>
            <div class="form-group">
            <label for="banner" class="control-label">Фото (Если выбрано отображение в баннере общих новостей) </label>
            <input class="form-control @error('banner') is-invalid @enderror"
                   name="banner" type="file" id="banner" accept="image/*" onchange="loadFileBanner(event)">
            @error('banner')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            <br>
            @if(isset($article))
                <img id="banner-preview" class="rounded" src="{{ $article->banner_url }}" style="max-width: 300px;"
                     alt="">
            @else
                <img id="banner-preview" class="rounded" style="display: none;max-width: 300px;" alt="">
            @endif
            </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>


    </div>
</div>

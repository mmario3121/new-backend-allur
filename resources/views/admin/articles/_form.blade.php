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
                    <div class="form-group required ">
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
                    <div class="form-group required">
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
            <label for="image_kz" class="control-label">Фото KZ</label>
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
            <label for="image" class="control-label">Фото</label>
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
        <div class="form-group required">
            <label for="isForm" class="control-label">Форма </label>
            <input class="form-control @error('isForm') is-invalid @enderror" name="isForm" type="checkbox"
       id="isForm" value="1" {{ (isset($article) ? $article->isForm : (old('isForm') ?? date('Y-m-d'))) ? 'checked' : '' }}>
            @error('isForm')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

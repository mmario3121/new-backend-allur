<div class="row">
    <div class="col-md-12">
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
            <label for="mobile_video" class="control-label" title="Заполните обизательно!">
                Мобильное видео </label>
            <input class="form-control @error('mobile_video') is-invalid @enderror"
                name="mobile_video" type="file" id="mobile_video">
                @error('mobile_video')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <br>
        <br>
        <h2 class="h2">Allur Finance</h2>
        <div class="form-group required ">
            <label for="finance_title" class="control-label" title="Заполните обязательно!">
                Заголовок для Allur Finance
            </label>
            <input class="form-control @error('finance_title') is-invalid @enderror" title="finance_title" type="text"
                   id="finance_title" name="finance_title" value="{{  isset($mainPage) ? $mainPage->finance_title : (old('finance_title') ?? '') }}">
            @error('finance_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="finance_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для Allur Finance на казахском
            </label>
            <input class="form-control @error('finance_title_kz') is-invalid @enderror" title="finance_title_kz" type="text"
                   id="finance_title_kz" name="finance_title_kz" value="{{  isset($mainPage) ? $mainPage->finance_title_kz : (old('finance_title_kz') ?? '') }}">
            @error('finance_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <br>
        <br>
        <h1 class="h1">Производство</h1>

        <div class="form-group required ">
            <label for="production_title" class="control-label" title="Заполните обязательно!">
                Заголовок для Производства
            </label>
            <input class="form-control @error('production_title') is-invalid @enderror" title="production_title" type="text"
                   id="production_title" name="production_title" value="{{  isset($mainPage) ? $mainPage->production_title : (old('production_title') ?? '') }}">
            @error('production_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для Производства на казахском
            </label>
            <input class="form-control @error('production_title_kz') is-invalid @enderror" title="production_title_kz" type="text"
                   id="production_title_kz" name="production_title_kz" value="{{  isset($mainPage) ? $mainPage->production_title_kz : (old('production_title_kz') ?? '') }}">
            @error('production_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_subtitle" class="control-label" title="Заполните обязательно!">
                Подзаголовок для Производства
            </label>
            <input class="form-control @error('production_subtitle') is-invalid @enderror" title="production_subtitle" type="text"
                   id="production_subtitle" name="production_subtitle" value="{{  isset($mainPage) ? $mainPage->production_subtitle : (old('production_subtitle') ?? '') }}">
            @error('production_subtitle')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_subtitle_kz" class="control-label" title="Заполните обязательно!">
                Подзаголовок для Производства на казахском
            </label>
            <input class="form-control @error('production_subtitle_kz') is-invalid @enderror" title="production_subtitle_kz" type="text"
                   id="production_subtitle_kz" name="production_subtitle_kz" value="{{  isset($mainPage) ? $mainPage->production_subtitle_kz : (old('production_subtitle_kz') ?? '') }}">
            @error('production_subtitle_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_description" class="control-label" title="Заполните обязательно!">
                Описание для Производства
            </label>
            <textarea class="form-control @error('production_description') is-invalid @enderror" title="production_description" id="production_description" name="production_description" rows="4">{{  isset($mainPage) ? $mainPage->production_description : (old('production_description') ?? '') }}</textarea>
            @error('production_description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_description_kz" class="control-label" title="Заполните обязательно!">
                Описание для Производства на казахском
            </label>
            <textarea class="form-control @error('production_description_kz') is-invalid @enderror" title="production_description_kz" id="production_description_kz" name="production_description_kz" rows="4">{{  isset($mainPage) ? $mainPage->production_description_kz : (old('production_description_kz') ?? '') }}</textarea>
            @error('production_description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_image" class="control-label" title="Заполните обизательно!">
                Фото </label>
            <input class="form-control @error('production_image') is-invalid @enderror"
                name="production_image" type="file" id="production_image">
                @error('production_image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        <br>
        <br>
        <h1 class="h1">Карьера</h1>
        <div class="form-group required ">
            <label for="career_title" class="control-label" title="Заполните обязательно!">
                Заголовок для Карьеры
            </label>
            <input class="form-control @error('career_title') is-invalid @enderror" title="career_title" type="text"
                   id="career_title" name="career_title" value="{{  isset($mainPage) ? $mainPage->career_title : (old('career_title') ?? '') }}">
            @error('career_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="career_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для Карьеры на казахском
            </label>
            <input class="form-control @error('career_title_kz') is-invalid @enderror" title="career_title_kz" type="text"
                   id="career_title_kz" name="career_title_kz" value="{{  isset($mainPage) ? $mainPage->career_title_kz : (old('career_title_kz') ?? '') }}">
            @error('career_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="career_text" class="control-label" title="Заполните обязательно!">
                Текст для Карьеры
            </label>
            <textarea class="form-control @error('career_text') is-invalid @enderror" title="career_text" id="career_text" name="career_text" rows="4">{{  isset($mainPage) ? $mainPage->career_text : (old('career_text') ?? '') }}</textarea>
            @error('career_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="career_text_kz" class="control-label" title="Заполните обязательно!">
                Текст для Карьеры на казахском
            </label>
            <textarea class="form-control @error('career_text_kz') is-invalid @enderror" title="career_text_kz" id="career_text_kz" name="career_text_kz" rows="4">{{  isset($mainPage) ? $mainPage->career_text_kz : (old('career_text_kz') ?? '') }}</textarea>
            @error('career_text_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="career_photo1" class="control-label" title="Заполните обизательно!">
                Фото 1 </label>
            <input class="form-control @error('career_photo1') is-invalid @enderror"
                name="career_photo1" type="file" id="career_photo1">
                @error('career_photo1')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="career_photo2" class="control-label" title="Заполните обизательно!">
                Фото 2 </label>
            <input class="form-control @error('career_photo2') is-invalid @enderror"
                name="career_photo2" type="file" id="career_photo2">
                @error('career_photo2')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="career_photo3" class="control-label" title="Заполните обизательно!">
                Фото 3 </label>
            <input class="form-control @error('career_photo3') is-invalid @enderror"
                name="career_photo3" type="file" id="career_photo3">
                @error('career_photo3')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <br>
        <br>
        <h1 class="h1">Консультация</h1>
        <div class="form-group required ">
            <label for="consultation_photo" class="control-label" title="Заполните обизательно!">
                Фото</label>
            <input class="form-control @error('consultation_photo') is-invalid @enderror"
                name="consultation_photo" type="file" id="consultation_photo">
                @error('consultation_photo')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1 class="h1">О компании</h1>

        <div class="form-group required ">
            <label for="production_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('production_title') is-invalid @enderror" title="production_title" type="text"
                   id="production_title" name="production_title" value="{{  isset($mainPage) ? $mainPage->production_title : (old('production_title') ?? '') }}">
            @error('production_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок KZ
            </label>
            <input class="form-control @error('production_title_kz') is-invalid @enderror" title="production_title_kz" type="text"
                   id="production_title_kz" name="production_title_kz" value="{{  isset($mainPage) ? $mainPage->production_title_kz : (old('production_title_kz') ?? '') }}">
            @error('production_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="production_description" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control @error('production_description') is-invalid @enderror" title="production_description" id="production_description" name="production_description" rows="4">{{  isset($mainPage) ? $mainPage->production_description : (old('production_description') ?? '') }}</textarea>
            @error('production_description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="production_description_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <textarea class="form-control @error('production_description_kz') is-invalid @enderror" title="production_description_kz" id="production_description_kz" name="production_description_kz" rows="4">{{  isset($mainPage) ? $mainPage->production_description_kz : (old('production_description_kz') ?? '') }}</textarea>
            @error('production_description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="consultation_photo" class="control-label" title="Заполните обизательно!">
                Фото</label>
            <input class="form-control @error('consultation_photo') is-invalid @enderror"
                name="consultation_photo" type="file" id="consultation_photo">
                @error('consultation_photo')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        <div class="col-md-12">
            <h1 class="h1">Карта</h1>
            <div class="form-group required ">
                <label for="carreer_title" class="control-label" title="Заполните обязательно!">
                    Заголовок
                </label>
                <input class="form-control @error('carreer_title') is-invalid @enderror" title="carreer_title" type="text"
                       id="carreer_title" name="carreer_title" value="{{  isset($mainPage) ? $mainPage->carreer_title : (old('carreer_title') ?? '') }}">
                @error('carreer_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="carreer_title_kz" class="control-label" title="Заполните обязательно!">
                    Заголовок KZ
                </label>
                <input class="form-control @error('carreer_title_kz') is-invalid @enderror" title="carreer_title_kz" type="text"
                       id="carreer_title_kz" name="carreer_title_kz" value="{{  isset($mainPage) ? $mainPage->carreer_title_kz : (old('carreer_title_kz') ?? '') }}">
                @error('carreer_title_kz')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group required ">
                <label for="carreer_text" class="control-label" title="Заполните обязательно!">
                    Текст
                </label>
                <textarea class="form-control @error('carreer_text') is-invalid @enderror" title="carreer_text" id="carreer_text" name="carreer_text" rows="4">{{  isset($mainPage) ? $mainPage->carreer_text : (old('carreer_text') ?? '') }}</textarea>
                @error('carreer_text')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group required ">
                <label for="carreer_text_kz" class="control-label" title="Заполните обязательно!">
                    Текст KZ
                </label>
                <textarea class="form-control @error('carreer_text_kz') is-invalid @enderror" title="carreer_text_kz" id="carreer_text_kz" name="carreer_text_kz" rows="4">{{  isset($mainPage) ? $mainPage->carreer_text_kz : (old('carreer_text_kz') ?? '') }}</textarea>
                @error('carreer_text_kz')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group required ">
                <label for="carreer_photo1" class="control-label" title="Заполните обязательно!">
                    Фото
                </label>
                <input class="form-control @error('carreer_photo1') is-invalid @enderror" title="carreer_photo1" type="file"
                       id="carreer_photo1" name="carreer_photo1" value="{{  isset($mainPage) ? $mainPage->carreer_photo1 : (old('carreer_photo1') ?? '') }}">
                @error('carreer_photo1')
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

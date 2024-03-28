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
        <br>
        <br>
        <h2 class="h2">Allur Finance</h2>
        <div class="form-group required ">
            <label for="career_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('career_title') is-invalid @enderror" title="career_title" type="text"
                   id="career_title" name="career_title" value="{{  isset($mainPage) ? $mainPage->career_title : (old('career_title') ?? '') }}">
            @error('career_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="career_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для карьеры на казахском
            </label>
            <input class="form-control @error('career_title_kz') is-invalid @enderror" title="career_title_kz" type="text"
                   id="career_title_kz" name="career_title_kz" value="{{  isset($mainPage) ? $mainPage->career_title_kz : (old('career_title_kz') ?? '') }}">
            @error('career_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="finance_photo" class="control-label" title="Заполните обизательно!">
                Фото </label>
            <input class="form-control @error('finance_photo') is-invalid @enderror"
                name="finance_photo" type="file" id="finance_photo">
                @error('finance_photo')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <br>
        <br>
        <h1 class="h1">Карьера</h1>
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

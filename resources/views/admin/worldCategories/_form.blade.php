<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($worldCategory) ? $worldCategory->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($worldCategory) ? $worldCategory->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обизательно!">
                Картинка </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
                @error('image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="image_mob" class="control-label" title="Заполните обизательно!">
                Картинка(Мобильная) </label>
            <input class="form-control @error('image_mob') is-invalid @enderror"
                name="image_mob" type="file" id="image_mob">
                @error('image_mob')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="cover_photo" class="control-label" title="Заполните обизательно!">
                Картинка для Обложки </label>
            <input class="form-control @error('cover_photo') is-invalid @enderror"
                name="cover_photo" type="file" id="cover_photo">
                @error('cover_photo')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="main_page_image" class="control-label" title="Заполните обизательно!">
                Картинка для главной страницы </label>
            <input class="form-control @error('main_page_image') is-invalid @enderror"
                name="main_page_image" type="file" id="main_page_image">
                @error('main_page_image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="slug" class="control-label" title="Заполните обязательно!">
                Slug
            </label>
            <input class="form-control @error('slug') is-invalid @enderror" title="slug" type="text"
                   id="slug" name="slug" value="{{  isset($worldCategory) ? $worldCategory->slug : (old('slug') ?? '') }}">
            @error('slug')
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

<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            <label for="image" class="control-label" title="Заполните обизательно!">
                Баннер </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
                @error('image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="image_kz" class="control-label" title="Заполните обизательно!">
                Баннер KZ </label>
            <input class="form-control @error('image_kz') is-invalid @enderror"
                name="image_kz" type="file" id="image_kz">
                @error('image_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="title" class="control-label" title="Заполните обизательно!">
                Название </label>
            <input class="form-control @error('title') is-invalid @enderror"
                name="title" type="text" id="title" value="{{ isset($banner) ? $banner->title : (old("title") ?? '') }}">
                @error('title')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="title_kz" class="control-label" title="Заполните обизательно!">
                Название KZ </label>
            <input class="form-control @error('title_kz') is-invalid @enderror"
                name="title_kz" type="text" id="title_kz" value="{{ isset($banner) ? $banner->title_kz : (old("title_kz") ?? '') }}">
                @error('title_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="slug" class="control-label" title="Заполните обизательно!">
                Slug </label>
            <input class="form-control @error('slug') is-invalid @enderror"
                name="slug" type="text" id="slug" value="{{ isset($banner) ? $banner->slug : (old("slug") ?? '') }}">
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

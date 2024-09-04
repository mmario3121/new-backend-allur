<div class="row">
    <div class="col-md-12">
        <div class="form-group ">
            <label for="image" class="control-label" title="Заполните обизательно!">
                Картинка/Видео </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
                @error('image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="title" class="control-label" title="Заполните обизательно!">
                Заголовок </label>
            <input class="form-control @error('title') is-invalid @enderror"
                name="title" type="text" id="title" value="{{ isset($mainPageBanner) ? $mainPageBanner->title : (old("title") ?? '') }}">
                @error('title')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="title_kz" class="control-label" title="Заполните обизательно!">
            Заголовок KZ </label>
            <input class="form-control @error('title_kz') is-invalid @enderror"
                name="title_kz" type="text" id="title_kz" value="{{ isset($mainPageBanner) ? $mainPageBanner->title_kz : (old("title_kz") ?? '') }}">
                @error('title_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="description" class="control-label" title="Заполните обизательно!">
                Описание </label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                name="description" cols="50" rows="10" id="description">{{ isset($mainPageBanner) ? $mainPageBanner->description : (old("description") ?? '') }}</textarea>
                @error('description')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="description_kz" class="control-label" title="Заполните обизательно!">
                Описание KZ </label>
            <textarea class="form-control @error('description_kz') is-invalid @enderror"
                name="description_kz" cols="50" rows="10" id="description_kz">{{ isset($mainPageBanner) ? $mainPageBanner->description_kz : (old("description_kz") ?? '') }}</textarea>
                @error('description_kz')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="link" class="control-label" title="Заполните обизательно!">
                Ссылка </label>
            <input class="form-control @error('link') is-invalid @enderror"
                name="link" type="text" id="link" value="{{ isset($mainPageBanner) ? $mainPageBanner->link : (old("link") ?? '') }}">
                @error('link')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group ">
            <label for="model_id" class="control-label" title="Заполните обизательно!">
                Модель </label>
            <select class="form-control @error('model_id') is-invalid @enderror"
                name="model_id" id="model_id">
                <option value="">Выберите модель</option>
                @foreach($models as $model)
                    <option value="{{ $model->id }}" {{ isset($mainPageBanner) && $mainPageBanner->model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                @endforeach
            </select>
            @error('model_id')
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

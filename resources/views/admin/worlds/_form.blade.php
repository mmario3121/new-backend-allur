<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($world) ? $world->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название KZ
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($world) ? $world->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Картинка </label>
            <input class="form-control @error('image') is-invalid @enderror"
                name="image" type="file" id="image">
                @error('image')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>
        <div class="form-group required ">
            <label for="description" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" title="description" type="text"
                   id="description" name="description">{{  isset($world) ? $world->description : (old('description') ?? '') }}</textarea>
            @error('description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="description_kz" class="control-label" title="Заполните обязательно!">
                Текст KZ
            </label>
            <textarea class="form-control @error('description_kz') is-invalid @enderror" title="description_kz" type="text"
                   id="description_kz" name="description_kz" >{{  isset($world) ? $world->description_kz : (old('description_kz') ?? '') }}</textarea>
            @error('description_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        @if($worldCategory->id == 1)
        <div class="form-group required ">
            <label for="year" class="control-label" title="Заполните обязательно!">
                Год
            </label>
            <input class="form-control @error('year') is-invalid @enderror" title="year" type="number"
                   id="year" name="year" value="{{  isset($world) ? $world->year : (old('year') ?? '') }}">
            @error('year')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        @endif
        @if(!isset($world))
        <input type="hidden" id="worldcategory_id" name="worldcategory_id" value="{{ $worldCategory->id }}">
        @endif


        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

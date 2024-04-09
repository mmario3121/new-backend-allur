<div class="row">
    <div class="col-md-12">
    <h2 class="h2">Благотворительность</h2>
        
        <div class="form-group required ">
            <label for="block1_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block1_title" type="text"
                   id="block1_title" value="{{  isset($social) ? $social->block1_title : (old('block1_title') ?? '') }}"
                   name="block1_title"
                   >
            @error('block1_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block1_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block1_image') is-invalid @enderror" title="block1_image" type="file"
                   id="block1_image" value="{{  isset($social) ? $social->block1_image : (old('block1_image') ?? '') }}"
                   name="block1_image"
                   >
            @error('block1_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block1_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block1_text" type="text"
                   id="block1_text" value="{{  isset($social) ? $social->block1_text : (old('block1_text') ?? '') }}"
                   name="block1_text"
                   >
            @error('block1_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Образование</h2>
        
        <div class="form-group required ">
            <label for="block2_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block2_title" type="text"
                   id="block2_title" value="{{  isset($social) ? $social->block2_title : (old('block2_title') ?? '') }}"
                   name="block2_title"
                   >
            @error('block2_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block2_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block2_image') is-invalid @enderror" title="block2_image" type="file"
                   id="block2_image" value="{{  isset($social) ? $social->block2_image : (old('block2_image') ?? '') }}"
                   name="block2_image"
                   >
            @error('block2_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block2_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block2_text" type="text"
                   id="block2_text" value="{{  isset($social) ? $social->block2_text : (old('block2_text') ?? '') }}"
                   name="block2_text"
                   >
            @error('block2_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Материальная Помощь</h2>

        <div class="form-group required ">
            <label for="block3_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block3_title" type="text"
                   id="block3_title" value="{{  isset($social) ? $social->block3_title : (old('block3_title') ?? '') }}"
                   name="block3_title"
                   >
            @error('block3_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block3_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block3_image') is-invalid @enderror" title="block3_image" type="file"
                   id="block3_image" value="{{  isset($social) ? $social->block3_image : (old('block3_image') ?? '') }}"
                   name="block3_image"
                   >
            @error('block3_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block3_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block3_text" type="text"
                   id="block3_text" value="{{  isset($social) ? $social->block3_text : (old('block3_text') ?? '') }}"
                   name="block3_text"
                   >
            @error('block3_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Спорт</h2>

        <div class="form-group required ">
            <label for="block4_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block4_title" type="text"
                   id="block4_title" value="{{  isset($social) ? $social->block4_title : (old('block4_title') ?? '') }}"
                   name="block4_title"
                   >
            @error('block4_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block4_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block4_image') is-invalid @enderror" title="block4_image" type="file"
                   id="block4_image" value="{{  isset($social) ? $social->block4_image : (old('block4_image') ?? '') }}"
                   name="block4_image"
                   >
            @error('block4_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block4_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block4_text" type="text"
                   id="block4_text" value="{{  isset($social) ? $social->block4_text : (old('block4_text') ?? '') }}"
                   name="block4_text"
                   >
            @error('block4_text')
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

<div class="row">
    <div class="col-md-12">
        <h2 class="h2">Блок 1</h2>
        
        <div class="form-group required ">
            <label for="block1_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block1_title" type="text"
                   id="block1_title" value="{{  isset($carreer) ? $carreer->block1_title : (old('block1_title') ?? '') }}"
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
                   id="block1_image" value="{{  isset($carreer) ? $carreer->block1_image : (old('block1_image') ?? '') }}"
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
                   id="block1_text" value="{{  isset($carreer) ? $carreer->block1_text : (old('block1_text') ?? '') }}"
                   name="block1_text"
                   >
            @error('block1_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block1_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block1_title_kz') is-invalid @enderror" title="block1_title_kz" type="text"
                   id="block1_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block1_title_kz : (old('block1_title_kz') ?? '') }}"
                   name="block1_title_kz"
                   >
            @error('block1_title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block1_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block1_text_kz') is-invalid @enderror" title="block1_text_kz" type="text"
                   id="block1_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block1_text_kz : (old('block1_text_kz') ?? '') }}"
                   name="block1_text_kz"
                   >
            @error('block1_text_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 2</h2>
        
        <div class="form-group required ">
            <label for="block2_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block2_title" type="text"
                   id="block2_title" value="{{  isset($carreer) ? $carreer->block2_title : (old('block2_title') ?? '') }}"
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
                   id="block2_image" value="{{  isset($carreer) ? $carreer->block2_image : (old('block2_image') ?? '') }}"
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
                   id="block2_text" value="{{  isset($carreer) ? $carreer->block2_text : (old('block2_text') ?? '') }}"
                   name="block2_text"
                   >
            @error('block2_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="block2_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block2_title_kz') is-invalid @enderror" title="block2_title_kz" type="text"
                   id="block2_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block2_title_kz : old('block2_title_kz', '') }}"
                   name="block2_title_kz">
            @error('block2_title_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="block2_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block2_text_kz') is-invalid @enderror" title="block2_text_kz" type="text"
                   id="block2_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block2_text_kz : old('block2_text_kz', '') }}"
                   name="block2_text_kz">
            @error('block2_text_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 3</h2>

        <div class="form-group required ">
            <label for="block3_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block3_title" type="text"
                   id="block3_title" value="{{  isset($carreer) ? $carreer->block3_title : (old('block3_title') ?? '') }}"
                   name="block3_title"
                   >
            @error('block3_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block3_image" class="control-label" title="Заполните обязательно!">
                Видео
            </label>
            <input class="form-control @error('block3_image') is-invalid @enderror" title="block3_image" type="file"
                   id="block3_image" value="{{  isset($carreer) ? $carreer->block3_image : (old('block3_image') ?? '') }}"
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
                   id="block3_text" value="{{  isset($carreer) ? $carreer->block3_text : (old('block3_text') ?? '') }}"
                   name="block3_text"
                   >
            @error('block3_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="block3_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block3_title_kz') is-invalid @enderror" title="block3_title_kz" type="text"
                   id="block3_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block3_title_kz : old('block3_title_kz', '') }}"
                   name="block3_title_kz">
            @error('block3_title_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="block3_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block3_text_kz') is-invalid @enderror" title="block3_text_kz" type="text"
                   id="block3_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block3_text_kz : old('block3_text_kz', '') }}"
                   name="block3_text_kz">
            @error('block3_text_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 4</h2>

        <div class="form-group required ">
            <label for="block4_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block4_title" type="text"
                   id="block4_title" value="{{  isset($carreer) ? $carreer->block4_title : (old('block4_title') ?? '') }}"
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
                   id="block4_image" value="{{  isset($carreer) ? $carreer->block4_image : (old('block4_image') ?? '') }}"
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
                   id="block4_text" value="{{  isset($carreer) ? $carreer->block4_text : (old('block4_text') ?? '') }}"
                   name="block4_text"
                   >
            @error('block4_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="block4_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block4_title_kz') is-invalid @enderror" title="block4_title_kz" type="text"
                   id="block4_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block4_title_kz : old('block4_title_kz', '') }}"
                   name="block4_title_kz">
            @error('block4_title_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="block4_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block4_text_kz') is-invalid @enderror" title="block4_text_kz" type="text"
                   id="block4_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block4_text_kz : old('block4_text_kz', '') }}"
                   name="block4_text_kz">
            @error('block4_text_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 5</h2>

        <div class="form-group required ">
            <label for="block5_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block5_title" type="text"
                   id="block5_title" value="{{  isset($carreer) ? $carreer->block5_title : (old('block5_title') ?? '') }}"
                   name="block5_title"
                   >
            @error('block5_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block5_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block5_image') is-invalid @enderror" title="block5_image" type="file"
                   id="block5_image" value="{{  isset($carreer) ? $carreer->block5_image : (old('block5_image') ?? '') }}"
                   name="block5_image"
                   >
            @error('block5_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block5_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block5_text" type="text"
                   id="block5_text" value="{{  isset($carreer) ? $carreer->block5_text : (old('block5_text') ?? '') }}"
                   name="block5_text"
                   >
            @error('block5_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="block5_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block5_title_kz') is-invalid @enderror" title="block5_title_kz" type="text"
                   id="block5_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block5_title_kz : old('block5_title_kz', '') }}"
                   name="block5_title_kz">
            @error('block5_title_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="block5_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block5_text_kz') is-invalid @enderror" title="block5_text_kz" type="text"
                   id="block5_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block5_text_kz : old('block5_text_kz', '') }}"
                   name="block5_text_kz">
            @error('block5_text_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 6</h2>
        
        <div class="form-group required ">
            <label for="block6_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block6_title" type="text"
                   id="block6_title" value="{{  isset($carreer) ? $carreer->block6_title : (old('block6_title') ?? '') }}"
                   name="block6_title"
                   >
            @error('block6_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block6_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block6_image') is-invalid @enderror" title="block6_image" type="file"
                   id="block6_image" value="{{  isset($carreer) ? $carreer->block6_image : (old('block6_image') ?? '') }}"
                   name="block6_image"
                   >
            @error('block6_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        
        <div class="form-group required ">
            <label for="block6_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block6_text" type="text"
                   id="block6_text" value="{{  isset($carreer) ? $carreer->block6_text : (old('block6_text') ?? '') }}"
                   name="block6_text"
                   >
            @error('block6_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
            <label for="block6_title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок (KZ)
            </label>
            <input class="form-control @error('block6_title_kz') is-invalid @enderror" title="block6_title_kz" type="text"
                   id="block6_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block6_title_kz : old('block6_title_kz', '') }}"
                   name="block6_title_kz">
            @error('block6_title_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="block6_text_kz" class="control-label" title="Заполните обязательно!">
                Текст (KZ)
            </label>
            <input class="form-control @error('block6_text_kz') is-invalid @enderror" title="block6_text_kz" type="text"
                   id="block6_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block6_text_kz : old('block6_text_kz', '') }}"
                   name="block6_text_kz">
            @error('block6_text_kz')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 7</h2>

        <div class="form-group required ">
            <label for="block7_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block7_title" type="text"
                   id="block7_title" value="{{  isset($carreer) ? $carreer->block7_title : (old('block7_title') ?? '') }}"
                   name="block7_title"
                   >
            @error('block7_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="block7_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block7_image') is-invalid @enderror" title="block7_image" type="file"
                   id="block7_image" value="{{  isset($carreer) ? $carreer->block7_image : (old('block7_image') ?? '') }}"
                   name="block7_image"
                   >
            @error('block7_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block7_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block7_text" type="text"
                   id="block7_text" value="{{  isset($carreer) ? $carreer->block7_text : (old('block7_text') ?? '') }}"
                   name="block7_text"
                   >
            @error('block7_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="block7_title_kz" class="control-label" title="Заполните обязательно!">
        Заголовок (KZ)
    </label>
    <input class="form-control @error('block7_title_kz') is-invalid @enderror" title="block7_title_kz" type="text"
           id="block7_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block7_title_kz : old('block7_title_kz', '') }}"
           name="block7_title_kz">
    @error('block7_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="block7_text_kz" class="control-label" title="Заполните обязательно!">
        Текст (KZ)
    </label>
    <input class="form-control @error('block7_text_kz') is-invalid @enderror" title="block7_text_kz" type="text"
           id="block7_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block7_text_kz : old('block7_text_kz', '') }}"
           name="block7_text_kz">
    @error('block7_text_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

        <br>
        <br>
        <h2 class="h2">Блок 8</h2>

        <div class="form-group required ">
            <label for="block8_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block8_title" type="text"
                   id="block8_title" value="{{  isset($carreer) ? $carreer->block8_title : (old('block8_title') ?? '') }}"
                   name="block8_title"
                   >
            @error('block8_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block8_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block8_image') is-invalid @enderror" title="block8_image" type="file"
                   id="block8_image" value="{{  isset($carreer) ? $carreer->block8_image : (old('block8_image') ?? '') }}"
                   name="block8_image"
                   >
            @error('block8_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block8_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block8_text" type="text"
                   id="block8_text" value="{{  isset($carreer) ? $carreer->block8_text : (old('block8_text') ?? '') }}"
                   name="block8_text"
                   >
            @error('block8_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="block8_title_kz" class="control-label" title="Заполните обязательно!">
        Заголовок (KZ)
    </label>
    <input class="form-control @error('block8_title_kz') is-invalid @enderror" title="block8_title_kz" type="text"
           id="block8_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block8_title_kz : old('block8_title_kz', '') }}"
           name="block8_title_kz">
    @error('block8_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="block8_text_kz" class="control-label" title="Заполните обязательно!">
        Текст (KZ)
    </label>
    <input class="form-control @error('block8_text_kz') is-invalid @enderror" title="block8_text_kz" type="text"
           id="block8_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block8_text_kz : old('block8_text_kz', '') }}"
           name="block8_text_kz">
    @error('block8_text_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

        <br>
        <br>
        <h2 class="h2">Блок 9</h2>

        <div class="form-group required ">
            <label for="block9_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block9_title" type="text"
                   id="block9_title" value="{{  isset($carreer) ? $carreer->block9_title : (old('block9_title') ?? '') }}"
                   name="block9_title"
                   >
            @error('block9_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block9_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block9_image') is-invalid @enderror" title="block9_image" type="file"
                   id="block9_image" value="{{  isset($carreer) ? $carreer->block9_image : (old('block9_image') ?? '') }}"
                   name="block9_image"
                   >
            @error('block9_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block9_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block9_text" type="text"
                   id="block9_text" value="{{  isset($carreer) ? $carreer->block9_text : (old('block9_text') ?? '') }}"
                   name="block9_text"
                   >
            @error('block9_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="block9_title_kz" class="control-label" title="Заполните обязательно!">
        Заголовок (KZ)
    </label>
    <input class="form-control @error('block9_title_kz') is-invalid @enderror" title="block9_title_kz" type="text"
           id="block9_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block9_title_kz : old('block9_title_kz', '') }}"
           name="block9_title_kz">
    @error('block9_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="block9_text_kz" class="control-label" title="Заполните обязательно!">
        Текст (KZ)
    </label>
    <input class="form-control @error('block9_text_kz') is-invalid @enderror" title="block9_text_kz" type="text"
           id="block9_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block9_text_kz : old('block9_text_kz', '') }}"
           name="block9_text_kz">
    @error('block9_text_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

        <br>
        <br>
        <h2 class="h2">Блок 10</h2>

        <div class="form-group required ">
            <label for="block10_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block10_title" type="text"
                   id="block10_title" value="{{  isset($carreer) ? $carreer->block10_title : (old('block10_title') ?? '') }}"
                   name="block10_title"
                   >
            @error('block10_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="block10_title_kz" class="control-label" title="Заполните обязательно!">
        Заголовок (KZ)
    </label>
    <input class="form-control @error('block10_title_kz') is-invalid @enderror" title="block10_title_kz" type="text"
           id="block10_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block10_title_kz : old('block10_title_kz', '') }}"
           name="block10_title_kz">
    @error('block10_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

        <div class="form-group required ">
            <label for="block10_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block10_image') is-invalid @enderror" title="block10_image" type="file"
                   id="block10_image" value="{{  isset($carreer) ? $carreer->block10_image : (old('block10_image') ?? '') }}"
                   name="block10_image"
                   >
            @error('block10_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <h2 class="h2">Блок 11 - Завод</h2>
        <div class="form-group required ">
            <label for="card1_title" class="control-label" title="Заполните обязательно!">
                Карточка 1
            </label>
            <input class="form-control @error('card1_title') is-invalid @enderror" title="card1_title" type="text"
                   id="card1_title" value="{{  isset($carreer) ? $carreer->card1_title : (old('card1_title') ?? '') }}"
                   name="card1_title" placeholder="Оглавление"
                   >
            <br>
            <input class="form-control @error('card1_text') is-invalid @enderror" title="card1_text" type="text"
                   id="card1_text" value="{{  isset($carreer) ? $carreer->card1_text : (old('card1_text') ?? '') }}"
                   name="card1_text" placeholder="Текст"
                   >
            @error('card1_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card2_title" class="control-label" title="Заполните обязательно!">
                Карточка 2
            </label>
            <input class="form-control @error('card2_title') is-invalid @enderror" title="card2_title" type="text"
                   id="card2_title" value="{{  isset($carreer) ? $carreer->card2_title : (old('card2_title') ?? '') }}"
                   name="card2_title" placeholder="Оглавление"
                   >
            <br>
            <input class="form-control @error('card2_text') is-invalid @enderror" title="card2_text" type="text"
                   id="card2_text" value="{{  isset($carreer) ? $carreer->card2_text : (old('card2_text') ?? '') }}"
                   name="card2_text" placeholder="Текст"
                   >
            @error('card2_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card3_title" class="control-label" title="Заполните обязательно!">
                Карточка 3
            </label>
            <input class="form-control @error('card3_title') is-invalid @enderror" title="card3_title" type="text"
                   id="card3_title" value="{{  isset($carreer) ? $carreer->card3_title : (old('card3_title') ?? '') }}"
                   name="card3_title" placeholder="Оглавление"
                   >
            <br>
            <input class="form-control @error('card3_text') is-invalid @enderror" title="card3_text" type="text"
                   id="card3_text" value="{{  isset($carreer) ? $carreer->card3_text : (old('card3_text') ?? '') }}"
                   name="card3_text" placeholder="Текст"
                   >
            @error('card3_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card4_title" class="control-label" title="Заполните обязательно!">
                Карточка 4
            </label>
            <input class="form-control @error('card4_title') is-invalid @enderror" title="card4_title" type="text"
                   id="card4_title" value="{{  isset($carreer) ? $carreer->card4_title : (old('card4_title') ?? '') }}"
                   name="card4_title" placeholder="Оглавление"
                   >
            <br>
            <input class="form-control @error('card4_text') is-invalid @enderror" title="card4_text" type="text"
                   id="card4_text" value="{{  isset($carreer) ? $carreer->card4_text : (old('card4_text') ?? '') }}"
                   name="card4_text" placeholder="Текст"
                   >
            @error('card4_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="card1_title_kz" class="control-label" title="Заполните обязательно!">
        Карточка 1 (KZ)
    </label>
    <input class="form-control @error('card1_title_kz') is-invalid @enderror" title="card1_title_kz" type="text"
           id="card1_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card1_title_kz : old('card1_title_kz', '') }}"
           name="card1_title_kz" placeholder="Оглавление">
    <br>
    <input class="form-control @error('card1_text_kz') is-invalid @enderror" title="card1_text_kz" type="text"
           id="card1_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card1_text_kz : old('card1_text_kz', '') }}"
           name="card1_text_kz" placeholder="Текст">
    @error('card1_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="card2_title_kz" class="control-label" title="Заполните обязательно!">
        Карточка 2 (KZ)
    </label>
    <input class="form-control @error('card2_title_kz') is-invalid @enderror" title="card2_title_kz" type="text"
           id="card2_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card2_title_kz : old('card2_title_kz', '') }}"
           name="card2_title_kz" placeholder="Оглавление">
    <br>
    <input class="form-control @error('card2_text_kz') is-invalid @enderror" title="card2_text_kz" type="text"
           id="card2_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card2_text_kz : old('card2_text_kz', '') }}"
           name="card2_text_kz" placeholder="Текст">
    @error('card2_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="card3_title_kz" class="control-label" title="Заполните обязательно!">
        Карточка 3 (KZ)
    </label>
    <input class="form-control @error('card3_title_kz') is-invalid @enderror" title="card3_title_kz" type="text"
           id="card3_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card3_title_kz : old('card3_title_kz', '') }}"
           name="card3_title_kz" placeholder="Оглавление">
    <br>
    <input class="form-control @error('card3_text_kz') is-invalid @enderror" title="card3_text_kz" type="text"
           id="card3_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card3_text_kz : old('card3_text_kz', '') }}"
           name="card3_text_kz" placeholder="Текст">
    @error('card3_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="card4_title_kz" class="control-label" title="Заполните обязательно!">
        Карточка 4 (KZ)
    </label>
    <input class="form-control @error('card4_title_kz') is-invalid @enderror" title="card4_title_kz" type="text"
           id="card4_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card4_title_kz : old('card4_title_kz', '') }}"
           name="card4_title_kz" placeholder="Оглавление">
    <br>
    <input class="form-control @error('card4_text_kz') is-invalid @enderror" title="card4_text_kz" type="text"
           id="card4_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->card4_text_kz : old('card4_text_kz', '') }}"
           name="card4_text_kz" placeholder="Текст">
    @error('card4_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<h2 class="h2">Блок 11</h2>

        <div class="form-group required ">
            <label for="block11_title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="block11_title" type="text"
                   id="block11_title" value="{{  isset($carreer) ? $carreer->block11_title : (old('block11_title') ?? '') }}"
                   name="block11_title"
                   >
            @error('block11_title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block11_image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('block11_image') is-invalid @enderror" title="block11_image" type="file"
                   id="block11_image" value="{{  isset($carreer) ? $carreer->block11_image : (old('block11_image') ?? '') }}"
                   name="block11_image"
                   >
            @error('block11_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="block11_text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <input class="form-control @error('text') is-invalid @enderror" title="block11_text" type="text"
                   id="block11_text" value="{{  isset($carreer) ? $carreer->block11_text : (old('block11_text') ?? '') }}"
                   name="block11_text"
                   >
            @error('block11_text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required">
    <label for="block11_title_kz" class="control-label" title="Заполните обязательно!">
        Заголовок (KZ)
    </label>
    <input class="form-control @error('block11_title_kz') is-invalid @enderror" title="block11_title_kz" type="text"
           id="block11_title_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block11_title_kz : old('block11_title_kz', '') }}"
           name="block11_title_kz">
    @error('block11_title_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group required">
    <label for="block11_text_kz" class="control-label" title="Заполните обязательно!">
        Текст (KZ)
    </label>
    <input class="form-control @error('block11_text_kz') is-invalid @enderror" title="block11_text_kz" type="text"
           id="block11_text_kz" value="{{  isset($carreer_kz) ? $carreer_kz->block11_text_kz : old('block11_text_kz', '') }}"
           name="block11_text_kz">
    @error('block11_text_kz')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

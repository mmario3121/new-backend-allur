<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Заголовок
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($komek) ? $komek->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Заголовок для казахского
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" name="title_kz" value="{{  isset($komek) ? $komek->title_kz : (old('title_kz') ?? '') }}">
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text" class="control-label" title="Заполните обязательно!">
                Текст
            </label>
            <textarea class="form-control @error('text') is-invalid @enderror" title="text" id="text" name="text"
                      rows="10">{{  isset($komek) ? $komek->text : (old('text') ?? '') }}</textarea>
            @error('text')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="text_kz" class="control-label" title="Заполните обязательно!">
                Текст для казахского
            </label>
            <textarea class="form-control @error('text_kz') is-invalid @enderror" title="text_kz" id="text_kz" name="text_kz"
                      rows="10">{{  isset($komek) ? $komek->text_kz : (old('text_kz') ?? '') }}</textarea>
            @error('text_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                   id="image" name="image">
            @error('image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="form_image" class="control-label" title="Заполните обязательно!">
                Изображение формы
            </label>
            <input class="form-control @error('form_image') is-invalid @enderror" title="form_image" type="file"
                   id="form_image" name="form_image">
            @error('form_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="services" class="control-label" title="Заполните обязательно!">
                Список услуг
            </label>
            <div id="services-list">
                @if(isset($komek))
                    @if($komek->services == null)
                        @php
                            $komek->services = '[]';
                        @endphp
                    @endif
                    @foreach(json_decode($komek->services) as $service)
                        <div class="service">
                            <input class="form-control" title="services" type="text" name="services[]"
                                   value="{{ $service }}">
                            <button type="button" class="remove-service">Удалить</button>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" id="add-service">Добавить услугу</button>
        </div>

        <div class="form-group required ">
            <label for="card1" class="control-label" title="Заполните обязательно!">
                Карточка 1
            </label>
            <input class="form-control @error('card1') is-invalid @enderror" title="card1" type="text"
                   id="card1" name="card1" value="{{  isset($komek) ? $komek->card1 : (old('card1') ?? '') }}">
            @error('card1')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card2" class="control-label" title="Заполните обязательно!">
                Карточка 2
            </label>
            <input class="form-control @error('card2') is-invalid @enderror" title="card2" type="text"
                   id="card2" name="card2" value="{{  isset($komek) ? $komek->card2 : (old('card2') ?? '') }}">
            @error('card2')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card3" class="control-label" title="Заполните обязательно!">
                Карточка 3
            </label>
            <input class="form-control @error('card3') is-invalid @enderror" title="card3" type="text"
                   id="card3" name="card3" value="{{  isset($komek) ? $komek->card3 : (old('card3') ?? '') }}">
            @error('card3')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card4" class="control-label" title="Заполните обязательно!">
                Карточка 4
            </label>
            <input class="form-control @error('card4') is-invalid @enderror" title="card4" type="text"
                   id="card4" name="card4" value="{{  isset($komek) ? $komek->card4 : (old('card4') ?? '') }}">
            @error('card4')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card5" class="control-label" title="Заполните обязательно!">
                Карточка 5
            </label>
            <input class="form-control @error('card5') is-invalid @enderror" title="card5" type="text"
                   id="card5" name="card5" value="{{  isset($komek) ? $komek->card5 : (old('card5') ?? '') }}">
            @error('card5')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="card6" class="control-label" title="Заполните обязательно!">
                Карточка 6
            </label>
            <input class="form-control @error('card6') is-invalid @enderror" title="card6" type="text"
                   id="card6" name="card6" value="{{  isset($komek) ? $komek->card6 : (old('card6') ?? '') }}">
            @error('card6')
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
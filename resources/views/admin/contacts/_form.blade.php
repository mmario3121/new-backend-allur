<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs mb-3" id="custom-tabs-two-tab" role="tablist">
            @foreach(\App\Models\Translate::LANGUAGES_ASSOC as $key => $language)
                <li class="nav-item @if($loop->first) active @endif">
                    <button class="nav-link @if($loop->first) active @endif"
                            id="{{ $key }}-tab" data-toggle="pill" href="#{{ $key }}-tab-content"
                            role="tab" aria-controls="ru-tab-content" aria-selected="true">
                        {{ $language }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="custom-tabs-two-tabContent">
            @forelse(\App\Models\Translate::LANGUAGES_ASSOC as $key => $language)
                <div class="tab-pane fade @if($loop->first) active in show @endif" id="{{ $key }}-tab-content"
                     role="tabpanel" aria-labelledby="{{ $key }}-tab">
                    <div class="form-group required ">
                        <label for="company-{{ $key }}" class="control-label" title="Заполните обизательно!">
                            Компания ({{ $key }})
                        </label>
                        <input class="form-control @error('company.' . $key) is-invalid @enderror"
                               name="company[{{ $key }}]" type="text"
                               id="company-{{ $key }}"
                               value="{{ isset($contact) ? $contact->companyTranslate?->{$key} : (old('company.'.$key) ?? '') }}">
                        @error('company.' . $key)
                        <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group required ">
                        <label for="address-{{ $key }}" class="control-label" title="Заполните обизательно!">
                            Адрес ({{ $key }})
                        </label>
                        <input class="form-control @error('address.' . $key) is-invalid @enderror"
                               name="address[{{ $key }}]" type="text"
                               id="address-{{ $key }}"
                               value="{{ isset($contact) ? $contact->addressTranslate?->{$key} : (old('address.'.$key) ?? '') }}">
                        @error('address.' . $key)
                        <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>
                </div>
            @empty
                Переводы не найдено
            @endforelse
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group required">
            <label for="email" class="control-label" title="Заполните обизательно!">
                Электронаая почта
            </label>
            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                   id="email" value="{{ old('email') ?? (isset($contact) ? $contact->email : '') }}"
                   required>
            @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group required ">
            <label for="phone" class="control-label" title="Заполните обизательно!">
                Телефон
            </label>
            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text"
                   id="phone" value="{{ old('phone') ?? (isset($contact) ? $contact->phone : '') }}"
                   required>
            @error('phone')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
    </div>

    <div class="col-12">
    <div class="form-group required">
        <label for="image" class="control-label">Изображение</label>
        <input class="form-control @error('image') is-invalid @enderror"
               name="image" type="file" id="image" accept="image/*" onchange="loadFile(event)">
        @error('image')
        <span class="error invalid-feedback"> {{ $message }} </span>
        @enderror
        <br>
        @if(isset($contact))
            <img id="image-preview" class="rounded" src="{{ $contact->image_url }}" style="max-width: 400px;" alt="">
        @else
            <img id="image-preview" class="rounded" style="display: none;max-width: 400px;" alt="" src="">
        @endif
    </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>

</div>

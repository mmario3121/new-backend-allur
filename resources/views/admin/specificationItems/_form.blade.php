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
                        <label for="title-{{ $key }}" class="control-label" title="Заполните обизательно!">
                            Заголовок ({{ $key }})
                        </label>
                        <input class="form-control @error('title.' . $key) is-invalid @enderror"
                               name="title[{{ $key }}]"
                               id="title-{{ $key }}" max="255" type="text"
                               value="{{ isset($specificationItem) ? $specificationItem->titleTranslate?->{$key} : (old('title.'.$key ) ?? '') }}"
                               required>
                        @error('title.' . $key)
                        <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>
                </div>
            @empty
                Переводы не найдено
            @endforelse
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

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
                        <label for="file-{{ $key }}" class="control-label" title="Заполните обизательно!">Документ
                            ({{ $key }}) </label>
                        <input class="form-control @error('file.' . $key) is-invalid @enderror"
                               accept=".doc,.docx,.pdf"
                               name="file[{{ $key }}]" type="file" id="file-{{ $key }}">
                        @error('file.' . $key)
                        <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                    </div>
                    @if(isset($agreement) && $agreement->fileTranslate?->{$key})
                        <a class="mt-4 mr-3" download href="{{ $agreement->fileUrl($agreement->fileTranslate, $key) }}">
                            Скачать Документ ({{ $key }})
                        </a>
                        <a href="{{ route('admin.agreements.deleteFile', ['agreement' => $agreement, 'language' => $key]) }}"
                           class="btn btn-sm btn-danger">
                            Удалить документ
                        </a>
                    @endif
                </div>
            @empty
                Переводы не найдено
            @endforelse
        </div>


        <div class="form-group required">
            <label for="type" class="control-label">Тип </label>
            <div class="select2-purple">
                <select name="type" id="type" class="form-control select2" style="width: 100%;">
                    @forelse($types as $key => $type)
                        <option
                            {{ isset($agreement) && $agreement->type == $key ? 'selected' : (old('type') == $key ? 'selected' : '') }}
                            value="{{ $key }}">
                            {{ $type }}
                        </option>
                    @empty
                        Тип не найден
                    @endforelse
                </select>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

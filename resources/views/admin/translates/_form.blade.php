<div class="row">
    <div class="col-md-12">

        <div class="form-group ">
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
                @foreach(\App\Models\Translate::LANGUAGES_ASSOC as $key => $language)
                    <div class="tab-pane fade @if($loop->first) active in show @endif" id="{{ $key }}-tab-content"
                         role="tabpanel" aria-labelledby="{{ $key }}-tab">
                        <div class="form-group required">
                            <label for="title-{{ $key }}" class="control-label" title="Заполните обизательно!">
                                Текст ({{ $key }})
                            </label>
                            <textarea id="title-{{ $key }}"
                                      class="form-control ckeditor @error("title.$key") is-invalid @enderror"
                                      rows="3" name="title[{{ $key }}]"
                            >{{ isset($aboutItem) ? $aboutItem->titleTranslate?->{$key} : (old("title.$key") ?? '') }}</textarea>
                            @error("title.$key")
                            <span class="error invalid-feedback"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="form-group required">
            <label for="image" class="control-label">Иконка </label>
            <input class="form-control @error('image') is-invalid @enderror"
                   name="image" type="file" id="image" accept="image/*" onchange="loadFile(event)">
            @error('image')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            <br>
            @if(isset($aboutItem))
                <img id="image-preview" class="rounded" src="{{ $aboutItem->image_url }}" style="max-width: 300px;"
                     alt="">
            @else
                <img id="image-preview" class="rounded" style="display: none;max-width: 300px;" alt="">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

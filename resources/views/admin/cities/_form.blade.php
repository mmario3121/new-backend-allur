<ul class="nav nav-tabs mb-3" id="custom-tabs-two-tab" role="tablist">
    <li class="nav-item active">
        <button class="nav-link active" id="ru-tab" data-toggle="pill" href="#ru-tab-content"
           role="tab" aria-controls="ru-tab-content" aria-selected="true">Русский</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" id="kz-tab" data-toggle="pill" href="#kz-tab-content"
           role="tab" aria-controls="kz-tab-content" aria-selected="false">Казахский</button>
    </li>
</ul>
<div class="tab-content" id="custom-tabs-two-tabContent">
    <div class="tab-pane fade active in show" id="ru-tab-content" role="tabpanel"
         aria-labelledby="ru-tab">
        <div class="form-group required ">
            <label for="title-ru" class="control-label" title="Заполните обизательно!">
                Название (Ru)
            </label>
            <input class="form-control @error('title.ru') is-invalid @enderror" name="title[ru]" type="text"
                   id="title-ru"
                   value="{{ old('title.ru') ?? (isset($city) ? $city->titleTranslate?->ru : '') }}"
                   required>
            @error('title.ru')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="kz-tab-content" role="tabpanel"
         aria-labelledby="kz-tab">
        <div class="form-group required">
            <label for="title-kz" class="control-label">Название (Kz)</label>
            <input class="form-control @error('title.kz') is-invalid @enderror" name="title[kz]" type="text"
                   id="title-kz"
                   value="{{ old('title.kz') ?? (isset($city) ? $city->titleTranslate?->kz : '') }}" required>
            @error('title.kz')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="bitrix_id" class="control-label">ID Битрикс</label>
        <input class="form-control @error('bitrix_id') is-invalid @enderror" name="bitrix_id" type="text"
               id="bitrix_id"
               value="{{ old('bitrix_id') ?? (isset($city) ? $city->bitrix_id : '') }}">
        @error('bitrix_id')
        <span class="error invalid-feedback"> {{ $message }} </span>
        @enderror
</div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
</div>

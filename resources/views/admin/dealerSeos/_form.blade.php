<div class="row">
    <div class="col-md-12">
        
        <div class="form-group required">
            <label for="dealer_id" class="control-label">Город </label>
            <select name="dealer_id" id="dealer_id" class="form-control select2" style="width: 100%;">
                @forelse($dealers as $dealer)
                    <option
                        {{ isset($dealerSeo) && $dealerSeo->dealer_id == $dealer->id ? 'selected' : (old('dealer_id') == $dealer->id ? 'selected' : '') }}
                        value="{{ $dealer->id }}">
                        {{ $dealer->name }}
                    </option>
                @empty
                    Дилеры не найдены
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <label for="code" class="control-label">Код </label>
            <textarea id="code"
                                      class="form-control @error('code') is-invalid @enderror"
                                      rows="3" name="code"
                            >{{ isset($dealerSeo) ? $dealerSeo->code : (old("code") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="position" class="control-label">Тип </label>
            <select name="position" id="position" class="form-control select2" style="width: 100%;">
                <option
                    {{ isset($dealerSeo) && $dealerSeo->position == 'head' ? 'selected' : '' }}
                    value="head">
                    Head
                </option>
                <option
                    {{ isset($dealerSeo) && $dealerSeo->position == 'body' ? 'selected' : '' }}
                    value="body">
                    Body
                </option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
        <div class="form-group required">
            <label for="dealer_id" class="control-label">Дилер </label>
            <select name="dealer_id" id="dealer_id" class="form-control select2" style="width: 100%;">
                @forelse($dealers as $dealer)
                    <option
                        {{ isset($dealerAddress) && $dealerAddress->dealer_id == $dealer->id ? 'selected' : (old('dealer_id') == $dealer->id ? 'selected' : '') }}
                        value="{{ $dealer->id }}">
                        {{ $dealer->name }}
                    </option>
                @empty
                    Дилеры не найдены
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <label for="address" class="control-label">Адрес </label>
            <textarea id="address"
                                      class="form-control @error('address') is-invalid @enderror"
                                      rows="3" name="address"
                            >{{ isset($dealerAddress) ? $dealerAddress->address : (old("address") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="address_kz" class="control-label">Адрес  KZ</label>
            <textarea id="address_kz"
                                      class="form-control @error('address_kz') is-invalid @enderror"
                                      rows="3" name="address_kz"
                            >{{ isset($dealerAddress) ? $dealerAddress->address_kz : (old("address_kz") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="address2" class="control-label">Адрес 2 </label>
            <textarea id="address2"
                                      class="form-control @error('address2') is-invalid @enderror"
                                      rows="3" name="address2"
                            >{{ isset($dealerAddress) ? $dealerAddress->address2 : (old("address2") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="address2_kz" class="control-label">Адрес 2 KZ</label>
            <textarea id="address2_kz"
                                      class="form-control @error('address2_kz') is-invalid @enderror"
                                      rows="3" name="address2_kz"
                            >{{ isset($dealerAddress) ? $dealerAddress->address2_kz : (old("address2_kz") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="worktime" class="control-label">Время работы </label>
            <textarea id="worktime"
                                      class="form-control @error('worktime') is-invalid @enderror"
                                      rows="3" name="worktime"
                            >{{ isset($dealerAddress) ? $dealerAddress->worktime : (old("worktime") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="worktime_kz" class="control-label">Время работы KZ</label>
            <textarea id="worktime_kz"
                                      class="form-control @error('worktime_kz') is-invalid @enderror"
                                      rows="3" name="worktime_kz"
                            >{{ isset($dealerAddress) ? $dealerAddress->worktime_kz : (old("worktime_kz") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="phone" class="control-label">Телефон (Через запятую если несколько) </label>
            <textarea id="phone"
                                      class="form-control @error('phone') is-invalid @enderror"
                                      rows="3" name="phone"
                            >{{ isset($dealerAddress) ? $dealerAddress->phone : (old("phone") ?? '') }}</textarea>
        </div>
        <div class="form-group required">
            <label for="coordinates" class="control-label">Ссылка на 2Гис </label>
            <textarea id="coordinates"
                                      class="form-control @error('coordinates') is-invalid @enderror"
                                      rows="3" name="coordinates"
                            >{{ isset($dealerAddress) ? $dealerAddress->coordinates : (old("coordinates") ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="coordinates2" class="control-label">Ссылка на 2Гис 2</label>
            <textarea id="coordinates2"
                                      class="form-control @error('coordinates2') is-invalid @enderror"
                                      rows="3" name="coordinates2"
                            >{{ isset($dealerAddress) ? $dealerAddress->coordinates2 : (old("coordinates2") ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

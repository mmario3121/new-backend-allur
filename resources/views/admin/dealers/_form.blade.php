<div class="row">
    <div class="col-md-12">
        @if(Route::currentRouteName() == 'admin.dealers.create')
         <div class="form-group required">
            <label for="user_id" class="control-label">Пользователь </label>
            <select name="user_id" id="user_id" class="form-control select2" style="width: 100%;">
                @forelse($users as $user)
                    <option
                        {{ isset($dealer) && $dealer->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}
                        value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @empty
                    Пользователи не найдены
                @endforelse
            </select>
        </div>
        @endif
        <div class="form-group required">
            <label for="city_id" class="control-label">Город </label>
            <select name="city_id" id="city_id" class="form-control select2" style="width: 100%;">
                @forelse($cities as $city)
                    <option
                        {{ isset($dealer) && $dealer->city_id == $city->id ? 'selected' : (old('city_id') == $city->id ? 'selected' : '') }}
                        value="{{ $city->id }}">
                        {{ $city->titleTranslate->ru }}
                    </option>
                @empty
                    Города не найдены
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <label for="name" class="control-label">Название </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($dealer) ? $dealer->name : '') }}" required>
        </div>
        <div class="form-group required">
            <label for="name_kz" class="control-label">Название (kz) </label>
            <input type="text" name="name_kz" id="name_kz" class="form-control" value="{{ old('name_kz', isset($dealer) ? $dealer->name_kz : '') }}" required>
        </div>
        <div class="form-group">
            <label for="url" class="control-label">Ссылка </label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', isset($dealer) ? $dealer->url : '') }}">
        </div>
        <div class="form-group required">
            <label for="bitrix_id" class="control-label">ID в Битриксе </label>
            <input type="text" name="bitrix_id" id="bitrix_id" class="form-control" value="{{ old('bitrix_id', isset($dealer) ? $dealer->bitrix_id : '') }}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Имя: </label>
            <input type="text" class="form-control" id="name" name="name" required
                   value="{{ isset($user) ? $user->name : (old('name') ?? '') }}">
            @error('name')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Эл. почта: </label>
            <input type="text" class="form-control" id="email" name="email" required
                   value="{{ isset($user) ? $user->email : (old('email') ?? '') }}">
            @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Телефон: </label>
            <input type="text" class="form-control phone" id="phone" name="phone"
                   value="{{ isset($user) ? $user->phone : (old('phone') ?? '') }}">
            @error('phone')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password"
                   value="" autocomplete="off" >
            @error('password')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="city_id" class="control-label">Город </label>
            <select name="city_id" id="city_id" class="form-control select2" style="width: 100%;">
                @forelse($cities as $city)
                    <option
                        {{ isset($user) && $user->city_id == $city->id ? 'selected' : (old('city_id') == $city->id ? 'selected' : '') }}
                        value="{{ $city->id }}">
                        {{ $city->titleTranslate?->ru }}
                    </option>
                @empty
                    Горада не найден
                @endforelse
            </select>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label for="role" class="control-label">Роль: </label>
                <select name="role" id="role" class="form-control type select2" style="width: 100%;">
                    @forelse($roles as $index => $role)
                        <option value="{{ $index }}"
                            {{ (isset($user) && $user->roles[0]->name == $index)
                                ? 'selected' : (old('role') && old('role') == $index ? 'selected' : '')  }}>
                            {{ $role }}
                        </option>
                    @empty
                        <option selected disabled>
                            Роль не найдено
                        </option>
                    @endforelse
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Сохранить
        </button>
    </div>
</div>

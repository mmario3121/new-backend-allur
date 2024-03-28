<div class="row">
    <div class="col-md-12">

        <div class="form-group required">
            <label for="phone" class="control-label">Телефон </label>
            <input class="form-control @error('phone') is-invalid @enderror"
                   name="phone" type="text" id="phone" maxlength="255"
                   value="{{ isset($application) ? $application->phone : (old('phone') ?? '') }}">
            @error('phone')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="city_id" class="control-label">Город </label>
            <select name="city_id" id="city_id" class="form-control select2" style="width: 100%;">
                @forelse($cities as $city)
                    <option
                        {{ isset($application) && $application->city_id == $city->id ? 'selected' : (old('city_id') == $city->id ? 'selected' : '') }}
                        value="{{ $city->id }}">
                        {{ $city->titleTranslate?->ru }}
                    </option>
                @empty
                    Горада не найден
                @endforelse
            </select>
        </div>

        <div class="form-group required">
            <label for="name" class="control-label">Имя </label>
            <input class="form-control @error('name') is-invalid @enderror"
                   name="name" type="text" id="name" maxlength="255"
                   value="{{ isset($application) ? $application->name : (old('name') ?? '') }}">
            @error('name')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>


        <div class="form-group required">
            <label for="email" class="control-label">E-mail </label>
            <input class="form-control @error('email') is-invalid @enderror"
                   name="email" type="email" id="email" maxlength="255"
                   value="{{ isset($application) ? $application->email : (old('email') ?? '') }}">
            @error('email')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="comment" class="control-label">Комментария </label>
            <textarea class="form-control @error('comment') is-invalid @enderror"
                      name="comment" type="text" id="comment" maxlength="10000" rows="3"
            >{{ isset($application) ? $application->comment : (old('comment') ?? '') }}</textarea>
            @error('email')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="status" class="control-label">Статус </label>
            <select name="status" id="status" class="form-control select2" style="width: 100%;">
                @forelse($statuses as $key => $status)
                    <option
                        {{ isset($application) && $application->status == $key ? 'selected' : (old('status') == $key ? 'selected' : '') }}
                        value="{{ $key }}">
                        {{ $status }}
                    </option>
                @empty
                    Статусы не найден
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>

    </div>
</div>

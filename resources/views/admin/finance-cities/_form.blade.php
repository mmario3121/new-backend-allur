<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="name" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('name') is-invalid @enderror" title="name" type="text"
                   id="name" name="name" value="{{  isset($finance_city) ? $finance_city->name : (old('name') ?? '') }}">
            @error('name')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="email" class="control-label" title="Заполните обязательно!">
                Email
            </label>
            <input class="form-control @error('email') is-invalid @enderror" title="email" type="text"
                   id="email" name="email" value="{{  isset($finance_city) ? $finance_city->email : (old('email') ?? '') }}">
            @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

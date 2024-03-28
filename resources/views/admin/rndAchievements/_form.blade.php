<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <label for="image">Картинка </label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                   id="image" name="image">
            @error('image')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="text">Текст (Ru) </label>
            <textarea id="text"
                      class="form-control ckeditor @error('text') is-invalid @enderror"
                      rows="3" name="text"
            >{{ isset($rndAchievement) ? $rndAchievement->text : (old('text') ?? '') }}</textarea>
            @error('text')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="text_kz">Текст (Kz) </label>
            <textarea id="text_kz"
                      class="form-control ckeditor @error('text_kz') is-invalid @enderror"
                      rows="3" name="text_kz"
            >{{ isset($rndAchievement) ? $rndAchievement->text_kz : (old('text_kz') ?? '') }}</textarea>
            @error('text_kz')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

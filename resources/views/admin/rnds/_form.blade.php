<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="section1">Секция 1 (Ru) </label>
            <textarea id="section1"
                      class="form-control ckeditor @error('section1') is-invalid @enderror"
                      rows="3" name="section1"
            >{{ isset($rnd) ? $rnd->section1 : (old('section1') ?? '') }}</textarea>
            @error('section1')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="section2">Секция 2 (Ru) </label>
            <textarea id="section2"
                      class="form-control ckeditor @error('section2') is-invalid @enderror"
                      rows="3" name="section2"
            >{{ isset($rnd) ? $rnd->section2 : (old('section2') ?? '') }}</textarea>
            @error('section2')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="section3_image">Секция 3 Картинка (Ru) </label>
            <input type="file" class="form-control-file @error('section3_image') is-invalid @enderror"
                   id="section3_image" name="section3_image">
            @error('section3_image')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="section3_banner">Секция 3 Баннер (Ru) </label>
            <input type="file" class="form-control-file @error('section3_banner') is-invalid @enderror"
                   id="section3_banner" name="section3_banner">
            @error('section3_banner')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
        //section3_text input
        <div class="form-group">
            <label for="section3_text">Секция 3 Текст (Ru) </label>
            <textarea id="section3_text"
                      class="form-control ckeditor @error('section3_text') is-invalid @enderror"
                      rows="3" name="section3_text"
            >{{ isset($rnd) ? $rnd->section3_text : (old('section3_text') ?? '') }}</textarea>
            @error('section3_text')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
        </div>
    </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">


        <div class="form-group required">
            <label for="image" class="control-label">Фото</label>
            <input class="form-control @error('image') is-invalid @enderror"
                   name="image" type="file" id="image" accept="image/*" onchange="loadFile(event)">
            @error('image')
            <span class="error invalid-feedback"> {{ $message }} </span>
            @enderror
            <br>
            @if(isset($articleImage))
                <img id="image-preview" class="rounded" src="{{ $articleImage->image_url }}" style="max-width: 300px;"
                     alt="">
            @else
                <img id="image-preview" class="rounded" style="display: none;max-width: 300px;" alt="">
            @endif
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="position">Очередность</label>--}}
{{--            <input class="form-control @error('position') is-invalid @enderror"--}}
{{--                   name="position" type="number" id="position" min="0"--}}
{{--                   value="{{ isset($articleImage) && $articleImage->position ? $articleImage->position : (isset($lastCertificateItem) ? $lastCertificateItem->id + 1 : 1) }}">--}}
{{--            @error('position')--}}
{{--            <span class="error invalid-feedback"> {{ $message }} </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

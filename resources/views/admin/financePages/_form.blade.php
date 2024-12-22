<div class="row">
    <div class="col-md-12">
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" value="{{  isset($financePage) ? $financePage->title : (old('title') ?? '') }}"
                   name="title"
                   >
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group required ">
            <label for="title_kz" class="control-label" title="Заполните обязательно!">
                Название (kz)
            </label>
            <input class="form-control @error('title_kz') is-invalid @enderror" title="title_kz" type="text"
                   id="title_kz" value="{{  isset($financePage) ? $financePage->title_kz : (old('title_kz') ?? '') }}"
                   name="title_kz"
                   >
            @error('title_kz')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 1</h2>
        
            <div class="form-group required ">
                <label for="image" class="control-label" title="Заполните обязательно!">
                    Изображение
                </label>
                <input class="form-control @error('image') is-invalid @enderror" title="image" type="file"
                    id="image" value="{{  isset($financePage) ? $financePage->image : (old('image') ?? '') }}"
                    name="image"
                    >
                @error('image')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="text" class="control-label" title="Заполните обязательно!">
                Текст
                </label>
                <input class="form-control @error('text') is-invalid @enderror" title="text" type="text"
                id="text" value="{{  isset($financePage) ? $financePage->text : (old('text') ?? '') }}"
                name="text"
                >
                @error('text')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group required ">
                <label for="text_kz" class="control-label" title="Заполните обязательно!">
                Текст (kz)
                </label>
                <input class="form-control @error('text_kz') is-invalid @enderror" title="text_kz" type="text"
                id="text_kz" value="{{  isset($financePage) ? $financePage->text_kz : (old('text_kz') ?? '') }}"
                name="text_kz"
                >
                @error('text_kz')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 2</h2>
            <div class="form-group required ">
                <label for="card1_title" class="control-label" title="Заполните обязательно!">
                    Карточка 1
                </label>
                <input class="form-control @error('card1_title') is-invalid @enderror" title="card1_title" type="text"
                    id="card1_title" value="{{  isset($financePage) ? $financePage->card1_title : (old('card1_title') ?? '') }}"
                    name="card1_title" placeholder="Оглавление"
                    >
                <br>
                <input class="form-control @error('card1_title_kz') is-invalid @enderror" title="card1_title_kz" type="text"
                    id="card1_title_kz" value="{{  isset($financePage) ? $financePage->card1_title_kz : (old('card1_title_kz') ?? '') }}"
                    name="card1_title_kz" placeholder="Оглавление (kz)"
                    >
                <br>
                <input class="form-control @error('card1_text') is-invalid @enderror" title="card1_text" type="text"
                    id="card1_text" value="{{  isset($financePage) ? $financePage->card1_text : (old('card1_text') ?? '') }}"
                    name="card1_text" placeholder="Текст"
                    >
                <br>
                <input class="form-control @error('card1_text_kz') is-invalid @enderror" title="card1_text_kz" type="text"
                    id="card1_text_kz" value="{{  isset($financePage) ? $financePage->card1_text_kz : (old('card1_text_kz') ?? '') }}"
                    name="card1_text_kz" placeholder="Текст (kz)"
                    >
                @error('card1_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="card2_title" class="control-label" title="Заполните обязательно!">
                    Карточка 2
                </label>
                <input class="form-control @error('card2_title') is-invalid @enderror" title="card2_title" type="text"
                    id="card2_title" value="{{  isset($financePage) ? $financePage->card2_title : (old('card2_title') ?? '') }}"
                    name="card2_title" placeholder="Оглавление"
                    >
                <br>
                <input class="form-control @error('card2_title_kz') is-invalid @enderror" title="card2_title_kz" type="text"
                    id="card2_title_kz" value="{{  isset($financePage) ? $financePage->card2_title_kz : (old('card2_title_kz') ?? '') }}"
                    name="card2_title_kz" placeholder="Оглавление (kz)"
                    >
                <br>
                <input class="form-control @error('card2_text') is-invalid @enderror" title="card2_text" type="text"
                    id="card2_text" value="{{  isset($financePage) ? $financePage->card2_text : (old('card2_text') ?? '') }}"
                    name="card2_text" placeholder="Текст"
                    >
                <br>
                <input class="form-control @error('card2_text_kz') is-invalid @enderror" title="card2_text_kz" type="text"
                    id="card2_text_kz" value="{{  isset($financePage) ? $financePage->card2_text_kz : (old('card2_text_kz') ?? '') }}"
                    name="card2_text_kz" placeholder="Текст (kz)"
                    >
                @error('card2_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="card3_title" class="control-label" title="Заполните обязательно!">
                    Карточка 3
                </label>
                <input class="form-control @error('card3_title') is-invalid @enderror" title="card3_title" type="text"
                    id="card3_title" value="{{  isset($financePage) ? $financePage->card3_title : (old('card3_title') ?? '') }}"
                    name="card3_title" placeholder="Оглавление"
                    >
                <br>
                <input class="form-control @error('card3_title_kz') is-invalid @enderror" title="card3_title_kz" type="text"
                    id="card3_title_kz" value="{{  isset($financePage) ? $financePage->card3_title_kz : (old('card3_title_kz') ?? '') }}"
                    name="card3_title_kz" placeholder="Оглавление (kz)"
                    >
                <br>
                <input class="form-control @error('card3_text') is-invalid @enderror" title="card3_text" type="text"
                    id="card3_text" value="{{  isset($financePage) ? $financePage->card3_text : (old('card3_text') ?? '') }}"
                    name="card3_text" placeholder="Текст"
                    >
                <br>
                <input class="form-control @error('card3_text_kz') is-invalid @enderror" title="card3_text_kz" type="text"
                    id="card3_text_kz" value="{{  isset($financePage) ? $financePage->card3_text_kz : (old('card3_text_kz') ?? '') }}"
                    name="card3_text_kz" placeholder="Текст (kz)"
                    >
                @error('card3_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="card4_title" class="control-label" title="Заполните обязательно!">
                    Карточка 4
                </label>
                <input class="form-control @error('card4_title') is-invalid @enderror" title="card4_title" type="text"
                    id="card4_title" value="{{  isset($financePage) ? $financePage->card4_title : (old('card4_title') ?? '') }}"
                    name="card4_title" placeholder="Оглавление"
                    >
                <br>
                <input class="form-control @error('card4_title_kz') is-invalid @enderror" title="card4_title_kz" type="text"
                    id="card4_title_kz" value="{{  isset($financePage) ? $financePage->card4_title_kz : (old('card4_title_kz') ?? '') }}"
                    name="card4_title_kz" placeholder="Оглавление (kz)"
                    >
                <br>
                <input class="form-control @error('card4_text') is-invalid @enderror" title="card4_text" type="text"
                    id="card4_text" value="{{  isset($financePage) ? $financePage->card4_text : (old('card4_text') ?? '') }}"
                    name="card4_text" placeholder="Текст"
                    >
                <br>
                <input class="form-control @error('card4_text_kz') is-invalid @enderror" title="card4_text_kz" type="text"
                    id="card4_text_kz" value="{{  isset($financePage) ? $financePage->card4_text_kz : (old('card4_text_kz') ?? '') }}"
                    name="card4_text_kz" placeholder="Текст (kz)"
                    >
                @error('card4_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        </div>
            <br>
            <br>
            <h2 class="h2">Блок 3</h2>
        <div class="form-group required ">
            <label for="block2_image" class="control-label" title="Заполните обязательно!">
                Изображение блока 3
            </label>
            <input class="form-control @error('block2_image') is-invalid @enderror" title="block2_image" type="file"
                   id="block2_image" value="{{  isset($financePage) ? $financePage->block2_image : (old('block2_image') ?? '') }}"
                   name="block2_image"
                   >
            @error('block2_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="row">
            <div class="form-group required ">
                <label for="card5_title" class="control-label" title="Заполните обязательно!">
                    Карточка 1
                </label>
                <input class="form-control @error('card5_title') is-invalid @enderror" title="card5_title" type="text"
                    id="card5_title" value="{{  isset($financePage) ? $financePage->card5_title : (old('card5_title') ?? '') }}"
                    name="card5_title" placeholder="Оглавление"
                    >
                <br>
                <input class="form-control @error('card5_title_kz') is-invalid @enderror" title="card5_title_kz" type="text"
                    id="card5_title_kz" value="{{  isset($financePage) ? $financePage->card5_title_kz : (old('card5_title_kz') ?? '') }}"
                    name="card5_title_kz" placeholder="Оглавление (kz)"
                    >
                <br>
                <input class="form-control @error('card5_text') is-invalid @enderror" title="card5_text" type="text"
                    id="card5_text" value="{{  isset($financePage) ? $financePage->card5_text : (old('card5_text') ?? '') }}"
                    name="card5_text" placeholder="Текст"
                    >
                <br>
                <input class="form-control @error('card5_text_kz') is-invalid @enderror" title="card5_text_kz" type="text"
                    id="card5_text_kz" value="{{  isset($financePage) ? $financePage->card5_text_kz : (old('card5_text_kz') ?? '') }}"
                    name="card5_text_kz" placeholder="Текст (kz)"
                    >
                <br>
                <input class="form-control @error('card5_subtitle') is-invalid @enderror" title="card5_subtitle" type="text"
                    id="card5_subtitle" value="{{  isset($financePage) ? $financePage->card5_subtitle : (old('card5_subtitle') ?? '') }}"
                    name="card5_subtitle" placeholder="Подзаголовок"
                    >
                <br>
                <input class="form-control @error('card5_subtitle_kz') is-invalid @enderror" title="card5_subtitle_kz" type="text"
                    id="card5_subtitle_kz" value="{{  isset($financePage) ? $financePage->card5_subtitle_kz : (old('card5_subtitle_kz') ?? '') }}"
                    name="card5_subtitle_kz" placeholder="Подзаголовок (kz)"
                    >
                <div class="form-group required">
                    <label for="mini_card_5_subtitle" class="control-label">Поздаголовок при открытии</label>
                    <input class="form-control" type="text" id="mini_card_5_subtitle" name="mini_card_5[subtitle]"
                        value="{{ isset($miniCard5['subtitle']) ? $miniCard5['subtitle'] : old('mini_card_5.subtitle') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_subtitle_kz" class="control-label">Поздаголовок при открытии (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_subtitle_kz" name="mini_card_5[subtitle_kz]"
                        value="{{ isset($miniCard5['subtitle_kz']) ? $miniCard5['subtitle_kz'] : old('mini_card_5.subtitle_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_annotation" class="control-label">Текст с *</label>
                    <input class="form-control" type="text" id="mini_card_5_annotation" name="mini_card_5[annotation]"
                        value="{{ isset($miniCard5['annotation']) ? $miniCard5['annotation'] : old('mini_card_5.annotation') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_annotation_kz" class="control-label">Текст с * (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_annotation_kz" name="mini_card_5[annotation_kz]"
                        value="{{ isset($miniCard5['annotation_kz']) ? $miniCard5['annotation_kz'] : old('mini_card_5.annotation_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_field1" class="control-label">Поле с иконкой 1</label>
                    <input class="form-control" type="text" id="mini_card_5_field1" name="mini_card_5[field1]"
                        value="{{ isset($miniCard5['field1']) ? $miniCard5['field1'] : old('mini_card_5.field1') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_field1_kz" class="control-label">Поле с иконкой 1 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_field1_kz" name="mini_card_5[field1_kz]"
                        value="{{ isset($miniCard5['field1_kz']) ? $miniCard5['field1_kz'] : old('mini_card_5.field1_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_5_field2" class="control-label">Поле с иконкой 2</label>
                    <input class="form-control" type="text" id="mini_card_5_field2" name="mini_card_5[field2]"
                        value="{{ isset($miniCard5['field2']) ? $miniCard5['field2'] : old('mini_card_5.field2') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_5_field2_kz" class="control-label">Поле с иконкой 2 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_field2_kz" name="mini_card_5[field2_kz]"
                        value="{{ isset($miniCard5['field2_kz']) ? $miniCard5['field2_kz'] : old('mini_card_5.field2_kz') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_5_field3" class="control-label">Поле с иконкой 3</label>
                    <input class="form-control" type="text" id="mini_card_5_field3" name="mini_card_5[field3]"
                        value="{{ isset($miniCard5['field3']) ? $miniCard5['field3'] : old('mini_card_5.field3') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_5_field3_kz" class="control-label">Поле с иконкой 3 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_field3_kz" name="mini_card_5[field3_kz]"
                        value="{{ isset($miniCard5['field3_kz']) ? $miniCard5['field3_kz'] : old('mini_card_5.field3_kz') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_5_field4" class="control-label">Поле с иконкой 4</label>
                    <input class="form-control" type="text" id="mini_card_5_field4" name="mini_card_5[field4]"
                        value="{{ isset($miniCard5['field4']) ? $miniCard5['field4'] : old('mini_card_5.field4') }}" placeholder="Field 4">
                    <br>
                    <label for="mini_card_5_field4_kz" class="control-label">Поле с иконкой 4 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_5_field4_kz" name="mini_card_5[field4_kz]"
                        value="{{ isset($miniCard5['field4_kz']) ? $miniCard5['field4_kz'] : old('mini_card_5.field4_kz') }}" placeholder="Field 4">
                </div>

                @error('card5_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        <div class="form-group required ">
                <label for="card6_title" class="control-label" title="Заполните обязательно!">
                Карточка 2
                </label>
                <input class="form-control @error('card6_title') is-invalid @enderror" title="card6_title" type="text"
                   id="card6_title" value="{{  isset($financePage) ? $financePage->card6_title : (old('card6_title') ?? '') }}"
                   name="card6_title" placeholder="Оглавление"
                   >
                <br>
                <input class="form-control @error('card6_title_kz') is-invalid @enderror" title="card6_title_kz" type="text"
                   id="card6_title_kz" value="{{  isset($financePage) ? $financePage->card6_title_kz : (old('card6_title_kz') ?? '') }}"
                   name="card6_title_kz" placeholder="Оглавление (kz)"
                   >
                <br>
                <input class="form-control @error('card6_text') is-invalid @enderror" title="card6_text" type="text"
                   id="card6_text" value="{{  isset($financePage) ? $financePage->card6_text : (old('card6_text') ?? '') }}"
                   name="card6_text" placeholder="Текст"
                   >
                <br>
                <input class="form-control @error('card6_text_kz') is-invalid @enderror" title="card6_text_kz" type="text"
                   id="card6_text_kz" value="{{  isset($financePage) ? $financePage->card6_text_kz : (old('card6_text_kz') ?? '') }}"
                   name="card6_text_kz" placeholder="Текст (kz)"
                   >
                <br>
                <input class="form-control @error('card6_subtitle') is-invalid @enderror" title="card6_subtitle" type="text"
                   id="card6_subtitle" value="{{  isset($financePage) ? $financePage->card6_subtitle : (old('card6_subtitle') ?? '') }}"
                   name="card6_subtitle" placeholder="Подзаголовок"
                     >
                <br>
                <input class="form-control @error('card6_subtitle_kz') is-invalid @enderror" title="card6_subtitle_kz" type="text"
                   id="card6_subtitle_kz" value="{{  isset($financePage) ? $financePage->card6_subtitle_kz : (old('card6_subtitle_kz') ?? '') }}"
                   name="card6_subtitle_kz" placeholder="Подзаголовок (kz)"
                   >
                <div class="form-group required">
                   <label for="mini_card_6_subtitle" class="control-label">Поздаголовок при открытии</label>
                    <input class="form-control" type="text" id="mini_card_6_subtitle" name="mini_card_6[subtitle]"
                        value="{{ isset($miniCard6['subtitle']) ? $miniCard6['subtitle'] : old('mini_card_6.subtitle') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_subtitle_kz" class="control-label">Поздаголовок при открытии (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_subtitle_kz" name="mini_card_6[subtitle_kz]"
                        value="{{ isset($miniCard6['subtitle_kz']) ? $miniCard6['subtitle_kz'] : old('mini_card_6.subtitle_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_annotation" class="control-label">Текст с *</label>
                    <input class="form-control" type="text" id="mini_card_6_annotation" name="mini_card_6[annotation]"
                        value="{{ isset($miniCard6['annotation']) ? $miniCard6['annotation'] : old('mini_card_6.annotation') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_annotation_kz" class="control-label">Текст с * (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_annotation_kz" name="mini_card_6[annotation_kz]"
                        value="{{ isset($miniCard6['annotation_kz']) ? $miniCard6['annotation_kz'] : old('mini_card_6.annotation_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_field1" class="control-label">Поле с иконкой 1</label>
                    <input class="form-control" type="text" id="mini_card_6_field1" name="mini_card_6[field1]"
                        value="{{ isset($miniCard6['field1']) ? $miniCard6['field1'] : old('mini_card_6.field1') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_field1_kz" class="control-label">Поле с иконкой 1 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_field1_kz" name="mini_card_6[field1_kz]"
                        value="{{ isset($miniCard6['field1_kz']) ? $miniCard6['field1_kz'] : old('mini_card_6.field1_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_6_field2" class="control-label">Поле с иконкой 2</label>
                    <input class="form-control" type="text" id="mini_card_6_field2" name="mini_card_6[field2]"
                        value="{{ isset($miniCard6['field2']) ? $miniCard6['field2'] : old('mini_card_6.field2') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_6_field2_kz" class="control-label">Поле с иконкой 2 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_field2_kz" name="mini_card_6[field2_kz]"
                        value="{{ isset($miniCard6['field2_kz']) ? $miniCard6['field2_kz'] : old('mini_card_6.field2_kz') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_6_field3" class="control-label">Поле с иконкой 3</label>
                    <input class="form-control" type="text" id="mini_card_6_field3" name="mini_card_6[field3]"
                        value="{{ isset($miniCard6['field3']) ? $miniCard6['field3'] : old('mini_card_6.field3') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_6_field3_kz" class="control-label">Поле с иконкой 3 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_field3_kz" name="mini_card_6[field3_kz]"
                        value="{{ isset($miniCard6['field3_kz']) ? $miniCard6['field3_kz'] : old('mini_card_6.field3_kz') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_6_field4" class="control-label">Поле с иконкой 4</label>
                    <input class="form-control" type="text" id="mini_card_6_field4" name="mini_card_6[field4]"
                        value="{{ isset($miniCard6['field4']) ? $miniCard6['field4'] : old('mini_card_6.field4') }}" placeholder="Field 4">
                    <br>
                    <label for="mini_card_6_field4_kz" class="control-label">Поле с иконкой 4 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_6_field4_kz" name="mini_card_6[field4_kz]"
                        value="{{ isset($miniCard6['field4_kz']) ? $miniCard6['field4_kz'] : old('mini_card_6.field4_kz') }}" placeholder="Field 4">
                </div>
                @error('card6_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
        </div>

        <div class="form-group required ">
                <label for="card7_title" class="control-label" title="Заполните обязательно!">
                Карточка 3
                </label>
                <input class="form-control @error('card7_title') is-invalid @enderror" title="card7_title" type="text"
                   id="card7_title" value="{{  isset($financePage) ? $financePage->card7_title : (old('card7_title') ?? '') }}"
                   name="card7_title" placeholder="Оглавление"
                   >
                <br>
                <input class="form-control @error('card7_title_kz') is-invalid @enderror" title="card7_title_kz" type="text"
                   id="card7_title_kz" value="{{  isset($financePage) ? $financePage->card7_title_kz : (old('card7_title_kz') ?? '') }}"
                   name="card7_title_kz" placeholder="Оглавление (kz)"
                   >
                <br>
                <input class="form-control @error('card7_text') is-invalid @enderror" title="card7_text" type="text"
                   id="card7_text" value="{{  isset($financePage) ? $financePage->card7_text : (old('card7_text') ?? '') }}"
                   name="card7_text" placeholder="Текст"
                   >
                <br>
                <input class="form-control @error('card7_text_kz') is-invalid @enderror" title="card7_text_kz" type="text"
                   id="card7_text_kz" value="{{  isset($financePage) ? $financePage->card7_text_kz : (old('card7_text_kz') ?? '') }}"
                   name="card7_text_kz" placeholder="Текст (kz)"
                   >
                <br>
                <input class="form-control @error('card7_subtitle') is-invalid @enderror" title="card7_subtitle" type="text"
                   id="card7_subtitle" value="{{  isset($financePage) ? $financePage->card7_subtitle : (old('card7_subtitle') ?? '') }}"
                   name="card7_subtitle" placeholder="Подзаголовок"
                   >
                <br>
                <input class="form-control @error('card7_subtitle_kz') is-invalid @enderror" title="card7_subtitle_kz" type="text"
                   id="card7_subtitle_kz" value="{{  isset($financePage) ? $financePage->card7_subtitle_kz : (old('card7_subtitle_kz') ?? '') }}"
                   name="card7_subtitle_kz" placeholder="Подзаголовок (kz)"
                   >
                   <div class="form-group required">
                   <label for="mini_card_7_subtitle" class="control-label">Поздаголовок при открытии</label>
                    <input class="form-control" type="text" id="mini_card_7_subtitle" name="mini_card_7[subtitle]"
                        value="{{ isset($miniCard7['subtitle']) ? $miniCard7['subtitle'] : old('mini_card_7.subtitle') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_7_subtitle_kz" class="control-label">Поздаголовок при открытии (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_subtitle_kz" name="mini_card_7[subtitle_kz]"
                        value="{{ isset($miniCard7['subtitle_kz']) ? $miniCard7['subtitle_kz'] : old('mini_card_7.subtitle_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_7_annotation" class="control-label">Текст с *</label>
                    <input class="form-control" type="text" id="mini_card_7_annotation" name="mini_card_7[annotation]"
                        value="{{ isset($miniCard7['annotation']) ? $miniCard7['annotation'] : old('mini_card_7.annotation') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_7_annotation_kz" class="control-label">Текст с * (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_annotation_kz" name="mini_card_7[annotation_kz]"
                        value="{{ isset($miniCard7['annotation_kz']) ? $miniCard7['annotation_kz'] : old('mini_card_7.annotation_kz') }}" placeholder="Field 1">
                    <br>
                   <label for="mini_card_7_field1" class="control-label">Поле с иконкой 1</label>
                    <input class="form-control" type="text" id="mini_card_7_field1" name="mini_card_7[field1]"
                        value="{{ isset($miniCard7['field1']) ? $miniCard7['field1'] : old('mini_card_7.field1') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_7_field1_kz" class="control-label">Поле с иконкой 1 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_field1_kz" name="mini_card_7[field1_kz]"
                        value="{{ isset($miniCard7['field1_kz']) ? $miniCard7['field1_kz'] : old('mini_card_7.field1_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_7_field2" class="control-label">Поле с иконкой 2</label>
                    <input class="form-control" type="text" id="mini_card_7_field2" name="mini_card_7[field2]"
                        value="{{ isset($miniCard7['field2']) ? $miniCard7['field2'] : old('mini_card_7.field2') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_7_field2_kz" class="control-label">Поле с иконкой 2 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_field2_kz" name="mini_card_7[field2_kz]"
                        value="{{ isset($miniCard7['field2_kz']) ? $miniCard7['field2_kz'] : old('mini_card_7.field2_kz') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_7_field3" class="control-label">Поле с иконкой 3</label>
                    <input class="form-control" type="text" id="mini_card_7_field3" name="mini_card_7[field3]"
                        value="{{ isset($miniCard7['field3']) ? $miniCard7['field3'] : old('mini_card_7.field3') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_7_field3_kz" class="control-label">Поле с иконкой 3 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_field3_kz" name="mini_card_7[field3_kz]"
                        value="{{ isset($miniCard7['field3_kz']) ? $miniCard7['field3_kz'] : old('mini_card_7.field3_kz') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_7_field4" class="control-label">Поле с иконкой 4</label>
                    <input class="form-control" type="text" id="mini_card_7_field4" name="mini_card_7[field4]"
                        value="{{ isset($miniCard7['field4']) ? $miniCard7['field4'] : old('mini_card_7.field4') }}" placeholder="Field 4">
                    <br>
                    <label for="mini_card_7_field4_kz" class="control-label">Поле с иконкой 4 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_7_field4_kz" name="mini_card_7[field4_kz]"
                        value="{{ isset($miniCard7['field4_kz']) ? $miniCard7['field4_kz'] : old('mini_card_7.field4_kz') }}" placeholder="Field 4">
                </div>
                @error('card7_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="card8_title" class="control-label" title="Заполните обязательно!">
                Карточка 4
                </label>
                <input class="form-control @error('card8_title') is-invalid @enderror" title="card8_title" type="text"
                   id="card8_title" value="{{  isset($financePage) ? $financePage->card8_title : (old('card8_title') ?? '') }}"
                   name="card8_title" placeholder="Оглавление"
                   >
                <br>
                <input class="form-control @error('card8_title_kz') is-invalid @enderror" title="card8_title_kz" type="text"
                   id="card8_title_kz" value="{{  isset($financePage) ? $financePage->card8_title_kz : (old('card8_title_kz') ?? '') }}"
                   name="card8_title_kz" placeholder="Оглавление (kz)"
                   >
                <br>
                <input class="form-control @error('card8_text') is-invalid @enderror" title="card8_text" type="text"
                   id="card8_text" value="{{  isset($financePage) ? $financePage->card8_text : (old('card8_text') ?? '') }}"
                   name="card8_text" placeholder="Текст"
                   >
                <br>
                <input class="form-control @error('card8_text_kz') is-invalid @enderror" title="card8_text_kz" type="text"
                   id="card8_text_kz" value="{{  isset($financePage) ? $financePage->card8_text_kz : (old('card8_text_kz') ?? '') }}"
                   name="card8_text_kz" placeholder="Текст (kz)"
                   >
                <br>
                <input class="form-control @error('card8_subtitle') is-invalid @enderror" title="card8_subtitle" type="text"
                   id="card8_subtitle" value="{{  isset($financePage) ? $financePage->card8_subtitle : (old('card8_subtitle') ?? '') }}"
                   name="card8_subtitle" placeholder="Подзаголовок"
                   >
                <br>
                <input class="form-control @error('card8_subtitle_kz') is-invalid @enderror" title="card8_subtitle_kz" type="text"
                   id="card8_subtitle_kz" value="{{  isset($financePage) ? $financePage->card8_subtitle_kz : (old('card8_subtitle_kz') ?? '') }}"
                   name="card8_subtitle_kz" placeholder="Подзаголовок (kz)"
                   >
                <div class="form-group required">
                    <label for="mini_card_8_subtitle" class="control-label">Поздаголовок при открытии</label>
                    <input class="form-control" type="text" id="mini_card_8_subtitle" name="mini_card_8[subtitle]"
                        value="{{ isset($miniCard8['subtitle']) ? $miniCard8['subtitle'] : old('mini_card_8.subtitle') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_subtitle_kz" class="control-label">Поздаголовок при открытии (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_subtitle_kz" name="mini_card_8[subtitle_kz]"
                        value="{{ isset($miniCard8['subtitle_kz']) ? $miniCard8['subtitle_kz'] : old('mini_card_8.subtitle_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_annotation" class="control-label">Текст с *</label>
                    <input class="form-control" type="text" id="mini_card_8_annotation" name="mini_card_8[annotation]"
                        value="{{ isset($miniCard8['annotation']) ? $miniCard8['annotation'] : old('mini_card_8.annotation') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_annotation_kz" class="control-label">Текст с * (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_annotation_kz" name="mini_card_8[annotation_kz]"
                        value="{{ isset($miniCard8['annotation_kz']) ? $miniCard8['annotation_kz'] : old('mini_card_8.annotation_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_field1" class="control-label">Поле с иконкой 1</label>
                    <input class="form-control" type="text" id="mini_card_8_field1" name="mini_card_8[field1]"
                        value="{{ isset($miniCard8['field1']) ? $miniCard8['field1'] : old('mini_card_8.field1') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_field1_kz" class="control-label">Поле с иконкой 1 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_field1_kz" name="mini_card_8[field1_kz]"
                        value="{{ isset($miniCard8['field1_kz']) ? $miniCard8['field1_kz'] : old('mini_card_8.field1_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_8_field2" class="control-label">Поле с иконкой 2</label>
                    <input class="form-control" type="text" id="mini_card_8_field2" name="mini_card_8[field2]"
                        value="{{ isset($miniCard8['field2']) ? $miniCard8['field2'] : old('mini_card_8.field2') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_8_field2_kz" class="control-label">Поле с иконкой 2 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_field2_kz" name="mini_card_8[field2_kz]"
                        value="{{ isset($miniCard8['field2_kz']) ? $miniCard8['field2_kz'] : old('mini_card_8.field2_kz') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_8_field3" class="control-label">Поле с иконкой 3</label>
                    <input class="form-control" type="text" id="mini_card_8_field3" name="mini_card_8[field3]"
                        value="{{ isset($miniCard8['field3']) ? $miniCard8['field3'] : old('mini_card_8.field3') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_8_field3_kz" class="control-label">Поле с иконкой 3 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_field3_kz" name="mini_card_8[field3_kz]"
                        value="{{ isset($miniCard8['field3_kz']) ? $miniCard8['field3_kz'] : old('mini_card_8.field3_kz') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_8_field4" class="control-label">Поле с иконкой 4</label>
                    <input class="form-control" type="text" id="mini_card_8_field4" name="mini_card_8[field4]"
                        value="{{ isset($miniCard8['field4']) ? $miniCard8['field4'] : old('mini_card_8.field4') }}" placeholder="Field 4">
                    <br>
                    <label for="mini_card_8_field4_kz" class="control-label">Поле с иконкой 4 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_8_field4_kz" name="mini_card_8[field4_kz]"
                        value="{{ isset($miniCard8['field4_kz']) ? $miniCard8['field4_kz'] : old('mini_card_8.field4_kz') }}" placeholder="Field 4">
                </div>
                @error('card8_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group required ">
                <label for="card9_title" class="control-label" title="Заполните обязательно!">
                Карточка 5
                </label>
                <input class="form-control @error('card9_title') is-invalid @enderror" title="card9_title" type="text"
                   id="card9_title" value="{{  isset($financePage) ? $financePage->card9_title : (old('card9_title') ?? '') }}"
                   name="card9_title" placeholder="Оглавление"
                   >
                <br>
                <input class="form-control @error('card9_title_kz') is-invalid @enderror" title="card9_title_kz" type="text"
                   id="card9_title_kz" value="{{  isset($financePage) ? $financePage->card9_title_kz : (old('card9_title_kz') ?? '') }}"
                   name="card9_title_kz" placeholder="Оглавление (kz)"
                   >
                <br>
                <input class="form-control @error('card9_text') is-invalid @enderror" title="card9_text" type="text"
                   id="card9_text" value="{{  isset($financePage) ? $financePage->card9_text : (old('card9_text') ?? '') }}"
                   name="card9_text" placeholder="Текст"
                   >
                <br>
                <input class="form-control @error('card9_text_kz') is-invalid @enderror" title="card9_text_kz" type="text"
                   id="card9_text_kz" value="{{  isset($financePage) ? $financePage->card9_text_kz : (old('card9_text_kz') ?? '') }}"
                   name="card9_text_kz" placeholder="Текст (kz)"
                   >
                <br>
                <input class="form-control @error('card9_subtitle') is-invalid @enderror" title="card9_subtitle" type="text"
                   id="card9_subtitle" value="{{  isset($financePage) ? $financePage->card9_subtitle : (old('card9_subtitle') ?? '') }}"
                   name="card9_subtitle" placeholder="Подзаголовок"
                   >
                <br>
                <input class="form-control @error('card9_subtitle_kz') is-invalid @enderror" title="card9_subtitle_kz" type="text"
                   id="card9_subtitle_kz" value="{{  isset($financePage) ? $financePage->card9_subtitle_kz : (old('card9_subtitle_kz') ?? '') }}"
                   name="card9_subtitle_kz" placeholder="Подзаголовок (kz)"
                   >
                   <div class="form-group required">
                   <label for="mini_card_9_subtitle" class="control-label">Поздаголовок при открытии</label>
                    <input class="form-control" type="text" id="mini_card_9_subtitle" name="mini_card_9[subtitle]"
                        value="{{ isset($miniCard9['subtitle']) ? $miniCard9['subtitle'] : old('mini_card_9.subtitle') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_subtitle_kz" class="control-label">Поздаголовок при открытии (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_subtitle_kz" name="mini_card_9[subtitle_kz]"
                        value="{{ isset($miniCard9['subtitle_kz']) ? $miniCard9['subtitle_kz'] : old('mini_card_9.subtitle_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_annotation" class="control-label">Текст с *</label>
                    <input class="form-control" type="text" id="mini_card_9_annotation" name="mini_card_9[annotation]"
                        value="{{ isset($miniCard9['annotation']) ? $miniCard9['annotation'] : old('mini_card_9.annotation') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_annotation_kz" class="control-label">Текст с * (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_annotation_kz" name="mini_card_9[annotation_kz]"
                        value="{{ isset($miniCard9['annotation_kz']) ? $miniCard9['annotation_kz'] : old('mini_card_9.annotation_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_field1" class="control-label">Поле с иконкой 1</label>
                    <input class="form-control" type="text" id="mini_card_9_field1" name="mini_card_9[field1]"
                        value="{{ isset($miniCard9['field1']) ? $miniCard9['field1'] : old('mini_card_9.field1') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_field1_kz" class="control-label">Поле с иконкой 1 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_field1_kz" name="mini_card_9[field1_kz]"
                        value="{{ isset($miniCard9['field1_kz']) ? $miniCard9['field1_kz'] : old('mini_card_9.field1_kz') }}" placeholder="Field 1">
                    <br>
                    <label for="mini_card_9_field2" class="control-label">Поле с иконкой 2</label>
                    <input class="form-control" type="text" id="mini_card_9_field2" name="mini_card_9[field2]"
                        value="{{ isset($miniCard9['field2']) ? $miniCard9['field2'] : old('mini_card_9.field2') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_9_field2_kz" class="control-label">Поле с иконкой 2 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_field2_kz" name="mini_card_9[field2_kz]"
                        value="{{ isset($miniCard9['field2_kz']) ? $miniCard9['field2_kz'] : old('mini_card_9.field2_kz') }}" placeholder="Field 2">
                    <br>
                    <label for="mini_card_9_field3" class="control-label">Поле с иконкой 3</label>
                    <input class="form-control" type="text" id="mini_card_9_field3" name="mini_card_9[field3]"
                        value="{{ isset($miniCard9['field3']) ? $miniCard9['field3'] : old('mini_card_9.field3') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_9_field3_kz" class="control-label">Поле с иконкой 3 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_field3_kz" name="mini_card_9[field3_kz]"
                        value="{{ isset($miniCard9['field3_kz']) ? $miniCard9['field3_kz'] : old('mini_card_9.field3_kz') }}" placeholder="Field 3">
                    <br>
                    <label for="mini_card_9_field4" class="control-label">Поле с иконкой 4</label>
                    <input class="form-control" type="text" id="mini_card_9_field4" name="mini_card_9[field4]"
                        value="{{ isset($miniCard9['field4']) ? $miniCard9['field4'] : old('mini_card_9.field4') }}" placeholder="Field 4">
                    <br>
                    <label for="mini_card_9_field4_kz" class="control-label">Поле с иконкой 4 (kz)</label>
                    <input class="form-control" type="text" id="mini_card_9_field4_kz" name="mini_card_9[field4_kz]"
                        value="{{ isset($miniCard9['field4_kz']) ? $miniCard9['field4_kz'] : old('mini_card_9.field4_kz') }}" placeholder="Field 4">
                </div>
                @error('card9_title')
                <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="form-group required">
            <label for="form_image" class="control-label">Изображение Формы</label>
            <input class="form-control @error('form_image') is-invalid @enderror" title="form_image" type="file" id="form_image" name="form_image">
            @error('form_image')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>  
    </div>

    <div class="form-group required">
        <label for="seo_title" class="control-label">SEO Title</label>
        <input class="form-control @error('seo_title') is-invalid @enderror" title="seo_title" type="text" id="seo_title" value="{{  isset($seo) ? $seo->title : (old('seo_title') ?? '') }}" name="seo_title" placeholder="SEO Title">
        @error('seo_title')
        <span class="error invalid-feedback">{{ $message }} </span>
        @enderror
    </div>
    <div class="form-group required">
        <label for="seo_description" class="control-label">SEO Description</label>
        <input class="form-control @error('seo_description') is-invalid @enderror" title="seo_description" type="text" id="seo_description" value="{{  isset($seo) ? $seo->description : (old('seo_description') ?? '') }}" name="seo_description" placeholder="SEO Description">
        @error('seo_description')
        <span class="error invalid-feedback">{{ $message }} </span>
        @enderror
    </div>
    <div class="form-group required">
        <label for="seo_keywords" class="control-label">SEO Keywords</label>
        <input class="form-control @error('seo_keywords') is-invalid @enderror" title="seo_keywords" type="text" id="seo_keywords" value="{{  isset($seo) ? $seo->keywords : (old('seo_keywords') ?? '') }}" name="seo_keywords" placeholder="SEO Keywords">
        @error('seo_keywords')
        <span class="error invalid-feedback">{{ $message }} </span>
        @enderror
        </div> 

        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

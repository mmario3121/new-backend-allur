<div class="row">
    <div class="col-md-12">
    <br>
        <br>
        <h2 class="h2">Блок 1</h2>
        
        <div class="form-group">
            <label for="block1_title">Заголовок блока 1</label>
            <input id="block1_title" type="text" class="form-control" name="block1_title" value="{{  isset($aboutCompany) ? $aboutCompany->block1_title : (old('block1_title') ?? '') }}">
        </div>
        <div class="form-group">
            <label for="block1_title_kz">Заголовок блока 1 (kz)</label>
            <input id="block1_title_kz" type="text" class="form-control" name="block1_title_kz" value="{{  isset($aboutCompany) ? $aboutCompany->block1_title_kz : (old('block1_title_kz') ?? '') }}">
        </div>
        <div class="form-group">
            <label for="block1_text">Текст блока 1</label>
            <textarea id="block1_text" class="form-control" name="block1_text">{{
                isset($aboutCompany) ? $aboutCompany->block1_text : (old('block1_text') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block1_text_kz">Текст блока 1 (kz)</label>
            <textarea id="block1_text_kz" class="form-control" name="block1_text_kz">{{
                isset($aboutCompany) ? $aboutCompany->block1_text_kz : (old('block1_text_kz') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block1_image">Изображение блока 1</label>
            <input id="block1_image" type="file" class="form-control" name="block1_image">
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 2</h2>
        
        <div class="form-group">
            <label for="block2_title">Заголовок блока 2</label>
            <input id="block2_title" type="text" class="form-control" name="block2_title" value="{{
                isset($aboutCompany) ? $aboutCompany->block2_title : (old('block2_title') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block2_title_kz">Заголовок блока 2 (kz)</label>
            <input id="block2_title_kz" type="text" class="form-control" name="block2_title_kz" value="{{
                isset($aboutCompany) ? $aboutCompany->block2_title_kz : (old('block2_title_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block2_text">Текст блока 2</label>
            <textarea id="block2_text" class="form-control" name="block2_text">{{
                isset($aboutCompany) ? $aboutCompany->block2_text : (old('block2_text') ?? '')
            }}</textarea>
        </div>
        <div class="form-group">
            <label for="block2_text_kz">Текст блока 2 (kz)</label>
            <textarea id="block2_text_kz" class="form-control" name="block2_text_kz">{{
                isset($aboutCompany) ? $aboutCompany->block2_text_kz : (old('block2_text_kz') ?? '')
            }}</textarea>
        </div>
        <div class="form-group">
            <label for="block2_image">Изображение блока 2</label>
            <input id="block2_image" type="file" class="form-control" name="block2_image">
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 3</h2>
        
        <div class="form-group">
            <label for="block3_title">Заголовок блока 3</label>
            <input id="block3_title" type="text" class="form-control" name="block3_title" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_title : (old('block3_title') ?? '')
            }}">
        </div> 
        <div class="form-group">
            <label for="block3_title_kz">Заголовок блока 3 (kz)</label>
            <input id="block3_title_kz" type="text" class="form-control" name="block3_title_kz" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_title_kz : (old('block3_title_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block3_text">Текст блока 3</label>
            <textarea id="block3_text" class="form-control" name="block3_text">{{ 
                isset($aboutCompany) ? $aboutCompany->block3_text : (old('block3_text') ?? '')
            }}</textarea>
        </div>
        <div class="form-group">
            <label for="block3_text_kz">Текст блока 3 (kz)</label>
            <textarea id="block3_text_kz" class="form-control" name="block3_text_kz">{{ 
                isset($aboutCompany) ? $aboutCompany->block3_text_kz : (old('block3_text_kz') ?? '')
            }}</textarea>
        </div>

        <div class="form-group">
            <label for="block3_image">Изображение блока 3</label>
            <input id="block3_image" type="file" class="form-control" name="block3_image">
        </div>
        <div class="form-group">
            <label for="block3_card1">Карточка 1 блока 3</label>
            <input id="block3_card1" type="text" class="form-control" name="block3_card1" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block3_card1 : (old('block3_card1') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block3_card1_kz">Карточка 1 блока 3 (kz)</label>
            <input id="block3_card1_kz" type="text" class="form-control" name="block3_card1_kz" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block3_card1_kz : (old('block3_card1_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block3_card1_text">Текст карточки 1 блока 3</label>
            <input id="block3_card1_text" type="text" class="form-control" name="block3_card1_text" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block3_card1_text : (old('block3_card1_text') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block3_card1_text_kz">Текст карточки 1 блока 3 (kz)</label>
            <input id="block3_card1_text_kz" type="text" class="form-control" name="block3_card1_text_kz" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block3_card1_text_kz : (old('block3_card1_text_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block3_card2">Карточка 2 блока 3</label>
            <input id="block3_card2" type="text" class="form-control" name="block3_card2" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_card2 : (old('block3_card2') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block3_card2_kz">Карточка 2 блока 3 (kz)</label>
            <input id="block3_card2_kz" type="text" class="form-control" name="block3_card2_kz" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_card2_kz : (old('block3_card2_kz') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block3_card2_text">Текст карточки 2 блока 3</label>
            <input id="block3_card2_text" type="text" class="form-control" name="block3_card2_text" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_card2_text : (old('block3_card2_text') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block3_card2_text_kz">Текст карточки 2 блока 3 (kz)</label>
            <input id="block3_card2_text_kz" type="text" class="form-control" name="block3_card2_text_kz" value="{{
                isset($aboutCompany) ? $aboutCompany->block3_card2_text_kz : (old('block3_card2_text_kz') ?? '')
             }}">
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 4</h2>
        
        <div class="form-group">
            <label for="block4_title">Заголовок блока 4</label>
            <input id="block4_title" type="text" class="form-control" name="block4_title" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block4_title : (old('block4_title') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block4_title_kz">Заголовок блока 4 (kz)</label>
            <input id="block4_title_kz" type="text" class="form-control" name="block4_title_kz" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block4_title_kz : (old('block4_title_kz') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block4_text">Текст блока 4</label>
            <textarea id="block4_text" class="form-control" name="block4_text">{{ 
                isset($aboutCompany) ? $aboutCompany->block4_text : (old('block4_text') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block4_text_kz">Текст блока 4 (kz)</label>
            <textarea id="block4_text_kz" class="form-control" name="block4_text_kz">{{ 
                isset($aboutCompany) ? $aboutCompany->block4_text_kz : (old('block4_text_kz') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block4_image">Изображение блока 4</label>
            <input id="block4_image" type="file" class="form-control" name="block4_image">
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 5</h2>
        
        <div class="form-group">
            <label for="block5_title">Заголовок блока 5</label>
            <input id="block5_title" type="text" class="form-control" name="block5_title" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block5_title : (old('block5_title') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block5_title_kz">Заголовок блока 5 (kz)</label>
            <input id="block5_title_kz" type="text" class="form-control" name="block5_title_kz" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block5_title_kz : (old('block5_title_kz') ?? '')
             }}">
        </div>
        <div class="form-group">
            <label for="block5_text">Текст блока 5</label>
            <textarea id="block5_text" class="form-control" name="block5_text">{{ 
                isset($aboutCompany) ? $aboutCompany->block5_text : (old('block5_text') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block5_text_kz">Текст блока 5 (kz)</label>
            <textarea id="block5_text_kz" class="form-control" name="block5_text_kz">{{ 
                isset($aboutCompany) ? $aboutCompany->block5_text_kz : (old('block5_text_kz') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block5_image">Изображение блока 5</label>
            <input id="block5_image" type="file" class="form-control" name="block5_image">
        </div>
        <br>
        <br>
        <h2 class="h2">Блок 6</h2>
        
        <div class="form-group">
            <label for="block6_title">Заголовок блока 6</label>
            <input id="block6_title" type="text" class="form-control" name="block6_title" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block6_title : (old('block6_title') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block6_title_kz">Заголовок блока 6 (kz)</label>
            <input id="block6_title_kz" type="text" class="form-control" name="block6_title_kz" value="{{ 
                isset($aboutCompany) ? $aboutCompany->block6_title_kz : (old('block6_title_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block6_text">Текст блока 6</label>
            <textarea id="block6_text" class="form-control" name="block6_text">{{ 
                isset($aboutCompany) ? $aboutCompany->block6_text : (old('block6_text') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block6_text_kz">Текст блока 6 (kz)</label>
            <textarea id="block6_text_kz" class="form-control" name="block6_text_kz">{{ 
                isset($aboutCompany) ? $aboutCompany->block6_text_kz : (old('block6_text_kz') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block6_image">Изображение блока 6</label>
            <input id="block6_image" type="file" class="form-control" name="block6_image">
        </div>

        <br>
        <br>
        <h2 class="h2">Блок 7</h2>
        
        <div class="form-group">
            <label for="block7_title">Заголовок блока 7</label>
            <input id="block7_title" type="text" class="form-control" name="block7_title" value="{{
                isset($aboutCompany) ? $aboutCompany->block7_title : (old('block7_title') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block7_title_kz">Заголовок блока 7 (kz)</label>
            <input id="block7_title_kz" type="text" class="form-control" name="block7_title_kz" value="{{
                isset($aboutCompany) ? $aboutCompany->block7_title_kz : (old('block7_title_kz') ?? '')
            }}">
        </div>
        <div class="form-group">
            <label for="block7_text">Текст блока 7</label>
            <textarea id="block7_text" class="form-control" name="block7_text">{{
                isset($aboutCompany) ? $aboutCompany->block7_text : (old('block7_text') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block7_text_kz">Текст блока 7 (kz)</label>
            <textarea id="block7_text_kz" class="form-control" name="block7_text_kz">{{ 
                isset($aboutCompany) ? $aboutCompany->block7_text_kz : (old('block7_text_kz') ?? '')
             }}</textarea>
        </div>
        <div class="form-group">
            <label for="block7_image">Изображение блока 7</label>
            <input id="block7_image" type="file" class="form-control" name="block7_image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </div>
</div>

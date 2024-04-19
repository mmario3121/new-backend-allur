<div class="row">
    <div class="col-md-12">
        <div class="form-group required">
            <select name="shop_item_id" class="form-control select2" style="width: 100%;">
                <option value="">Товар</option>
                @forelse($shopItems as $shopItem)
                    <option
                        value="{{ $shopItem->id }}" {{ (isset($shopItem) && $shopItem->shop_item_id === $shopItem->id) ? 'selected' : (old('shop_item_id') && old('shop_item_id') == $shopItem->id ? 'selected' : '')  }}>
                        {{ $shopItem->title }}
                    </option>
                @empty
                    <option disabled>
                        Товары не найдены
                    </option>
                @endforelse
            </select>
        </div>
        <div class="form-group required">
            <select name="category" class="form-control select2" style="width: 100%;" required>
                <option>Категория</option>
                <option value="1" {{ (isset($shopItem) && $shopItem->category_id === 1) ? 'selected' : (old('category_id') && old('category_id') == 1 ? 'selected' : '')  }}>
                    Одежда
                </option>
                <option value="2" {{ (isset($shopItem) && $shopItem->category_id === 2) ? 'selected' : (old('category_id') && old('category_id') == 2 ? 'selected' : '')  }}>
                    Аксессуары
                </option>
                <option value="3" {{ (isset($shopItem) && $shopItem->category_id === 3) ? 'selected' : (old('category_id') && old('category_id') == 3 ? 'selected' : '')  }}>
                    Инвентарь
                </option>
            </select>
        </div>
        <div class="form-group required ">
            <label for="title" class="control-label" title="Заполните обязательно!">
                Название
            </label>
            <input class="form-control @error('title') is-invalid @enderror" title="title" type="text"
                   id="title" name="title" value="{{  isset($shopItem) ? $shopItem->title : (old('title') ?? '') }}">
            @error('title')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="article" class="control-label" title="Заполните обязательно!">
                Артикул
            </label>
            <input class="form-control @error('article') is-invalid @enderror" title="article" type="text"
                   id="article" name="article" value="{{  isset($shopItem) ? $shopItem->article : (old('article') ?? '') }}">
            @error('article')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="color" class="control-label" title="Заполните обязательно!">
                Цвет
            </label>
            <input class="form-control @error('color') is-invalid @enderror" title="color" type="text"
                   id="color" name="color" value="{{  isset($shopItem) ? $shopItem->color : (old('color') ?? '') }}">
            @error('color')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="size" class="control-label" title="Заполните обязательно!">
                Размер
            </label>
            <input class="form-control @error('size') is-invalid @enderror" title="size" type="text"
                   id="size" name="size" value="{{  isset($shopItem) ? $shopItem->size : (old('size') ?? '') }}">
            @error('size')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="price" class="control-label" title="Заполните обязательно!">
                Цена
            </label>
            <input class="form-control @error('price') is-invalid @enderror" title="price" type="text"
                   id="price" name="price" value="{{  isset($shopItem) ? $shopItem->price : (old('price') ?? '') }}">
            @error('price')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required ">
            <label for="description" class="control-label" title="Заполните обязательно!">
                Описание
            </label>
            <input class="form-control @error('description') is-invalid @enderror" title="description" type="text"
                   id="description" name="description" value="{{  isset($shopItem) ? $shopItem->description : (old('description') ?? '') }}">
            @error('description')
            <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>

        <div class="form-group required">
            <label for="image" class="control-label" title="Заполните обязательно!">
                Изображение
            </label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" title="image" id="image" required>
            @error('image')
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

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Текст</th>
                <th>Картинка</th>
                <th>Редактировать</th>
            </tr>
        </thead>

        <tbody>
        @forelse($socials as $social)
            <tr>
                <td>{{ $social->title }}</td>
                <td>{{ $social->text }}</td>
                <td>
                    <img src="{{ $social->image_url }}" alt="{{ $social->title }}" class="img-thumbnail"
                         style="max-width: 100px">
                </td>
                <td class="btn-row-width-3">
                    <div class="margin">
                        <div class="btn-group">
                        <a href="{{ route('admin.socials.edit', ['social' => $social]) }}"
                            class="btn btn-default">Изменить</a>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <form
                                action="{{route('admin.socials.destroy', ['social' => $social])}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Удаление" type="submit" class="dropdown-item"
                                            onclick="confirm('Подтвердите удаление')">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" class="text-danger" colspan="4">
                    Не найдено
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

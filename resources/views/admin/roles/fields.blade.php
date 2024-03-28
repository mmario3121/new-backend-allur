@csrf
<div class="card-body">
    <div class="form-group">
        <label>Название</label>
        <input type="text"
               name="name"
               class="form-control" placeholder="Имя" value="{{old('name') ? old('name') : $role->name ?? ''}}">
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>



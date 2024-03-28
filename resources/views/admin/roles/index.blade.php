@extends('layouts.admin')
@section('content')
    <p>
        <a href="{{route('admin.roles.create')}}" class="btn btn-success">Добавить Роль</a>
    </p>
    @if(count($roles))
        <div class="table-responsive-sm table-responsive-md">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Тут пока ничего нет...</p>
    @endif
@endsection


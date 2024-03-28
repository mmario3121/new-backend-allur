@extends('layouts.admin')

@section('content')
    <div class="card-header">
        <h3 class="card-title">Новый пользователь</h3>
    </div>
    <form name="banner-type" action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
        @include('admin.roles.fields')
    </form>
@endsection

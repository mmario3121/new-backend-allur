@extends('admin.layouts.app')

@section('content')
    <div class="card-header">
        <h3 class="card-title">Изменить</h3>
    </div>
    <form name="allur-product" action="{{route('user.update', ['user' => $user->id])}}"
          enctype="multipart/form-data"
          method="post">
        @method('put')
        @include('admin.user.fields')
    </form>
@endsection

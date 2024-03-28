@extends('layouts.admin')

@section('title', 'Редактирование города')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактирование города</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-warning btn-sm mb-4" href="{{ route('admin.cities.index') }}"
               title="Назад">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            @include('admin._components.alert')

            <form method="POST" action="{{ route('admin.cities.update', [ 'city' => $city]) }}"
                  class="form-horizontal">
                @method('PATCH')
                @csrf
                @include('admin.cities._form')
            </form>

        </div>
    </section>
@endsection

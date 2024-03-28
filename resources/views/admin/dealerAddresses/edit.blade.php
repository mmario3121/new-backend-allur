@extends('layouts.admin')

@section('title', 'Редактирование ')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактирование </h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a href="{{route('admin.dealerAddresses.index')}}" title="Назад"
            class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST"
                  action="{{ route('admin.dealerAddresses.update', ['dealerAddress' => $dealerAddress]) }}"
                  class="form-horizontal">
                @csrf
                @method('PATCH')
                @include('admin.dealerAddresses._form')
            </form>

        </div>
    </section>
@endsection



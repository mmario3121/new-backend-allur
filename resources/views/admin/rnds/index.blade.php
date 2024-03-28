@extends('layouts.admin')

@section('title', "RND")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">RND</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <div class="card-tools mb-4">
                <a href="{{ route('admin.rnds.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>
        </div>
    </section>
@endsection

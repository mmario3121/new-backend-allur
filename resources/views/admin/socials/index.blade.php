@extends('layouts.admin')

@section('title', "Страница Корпоративно-социальная ответственность")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0"> Страница Корпоративно-социальная ответственность</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @include('admin._components.alert')
            <div class="card-tools mb-4">
                <a href="{{ route('admin.socials.create') }}"
                   class="btn btn-success btn-sm mr-1 mb-2 mb-sm-0" title="Добавить">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Добавить
                </a>
            </div>

            {{-- Tabs Navigation --}}
            <ul class="nav nav-tabs" id="socialTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="charity-tab" data-toggle="tab" href="#charity" role="tab" aria-controls="charity" aria-selected="true">Благотворительность</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Образование</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="material-aid-tab" data-toggle="tab" href="#material_aid" role="tab" aria-controls="material_aid" aria-selected="false">Материальная помощь</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sport-tab" data-toggle="tab" href="#sport" role="tab" aria-controls="sport" aria-selected="false">Спорт</a>
                </li>
            </ul>

            {{-- Tabs Content --}}
            <div class="tab-content mt-4" id="socialTabsContent">
                {{-- Charity Tab --}}
                <div class="tab-pane fade show active" id="charity" role="tabpanel" aria-labelledby="charity-tab">
                    @include('admin.socials._table', ['socials' => $socials->where('type', 'charity')])
                </div>

                {{-- Education Tab --}}
                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    @include('admin.socials._table', ['socials' => $socials->where('type', 'education')])
                </div>

                {{-- Material Aid Tab --}}
                <div class="tab-pane fade" id="material_aid" role="tabpanel" aria-labelledby="material-aid-tab">
                    @include('admin.socials._table', ['socials' => $socials->where('type', 'material_aid')])
                </div>

                {{-- Sport Tab --}}
                <div class="tab-pane fade" id="sport" role="tabpanel" aria-labelledby="sport-tab">
                    @include('admin.socials._table', ['socials' => $socials->where('type', 'sport')])
                </div>
            </div>
        </div>
    </section>
@endsection

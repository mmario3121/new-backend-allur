@extends('layouts.admin')

@section('title', 'Редактировать')

@push('styles')
    @includeIf('admin._components.summernoteStyles')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')
            <a href="{{ route('admin.mainPages.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <form method="POST" class="pb-5"
                  action="{{ route('admin.mainPages.update', ['mainPage' => $mainPage]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.mainPages._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Создаем массив для хранения выбранных файлов
    let selectedFiles = [];

    document.getElementById('upload_button').onclick = function() {
        // Эмулируем клик по input
        document.getElementById('production_images').click();
    };

    document.getElementById('production_images').onchange = function(event) {
        // Добавляем новые файлы к уже выбранным
        selectedFiles = selectedFiles.concat(Array.from(event.target.files));

        // Создаем новый объект DataTransfer
        let dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => {
            // Добавляем каждый файл в объект DataTransfer
            dataTransfer.items.add(file);
        });

        // Устанавливаем файлы в input через объект DataTransfer
        document.getElementById('production_images').files = dataTransfer.files;
    };
</script>
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
@endpush

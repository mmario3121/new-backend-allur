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
            <a href="{{ route('admin.komeks.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>
            <form method="POST" class="pb-5"
                  action="{{ route('admin.komeks.update', ['komek' => $komek]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.komeks._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    @includeIf('admin._components.loadFileScript')
    @includeIf('admin._components.summernoteScripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    let serviceIndex = 0; // Индекс для именования полей

    document.getElementById('add-service').addEventListener('click', function () {
        const servicesList = document.getElementById('services-list');
        const newService = createServiceInput(serviceIndex);
        servicesList.appendChild(newService);
        serviceIndex++; // Увеличиваем индекс
    });

    function createServiceInput(index) {
        const serviceContainer = document.createElement('div');
        serviceContainer.classList.add('service');

        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = `services[${index}]`;
        newInput.classList.add('form-control');
        newInput.placeholder = 'Введите название услуги';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Удалить';
        removeButton.classList.add('remove-service');
        removeButton.addEventListener('click', function () {
            serviceContainer.remove();
        });

        serviceContainer.appendChild(newInput);
        serviceContainer.appendChild(removeButton);

        return serviceContainer;
    }

    // Добавляем обработчики событий для уже существующих кнопок удаления
    document.querySelectorAll('.remove-service').forEach(button => {
        button.addEventListener('click', function () {
            button.closest('.service').remove();
        });
    });
});
    </script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const servicesListKz = document.getElementById('services-kz-list');
    const addServiceKzButton = document.getElementById('add-service-kz');

    addServiceKzButton.addEventListener('click', function () {
        const index = servicesListKz.children.length;
        const serviceContainerKz = document.createElement('div');
        serviceContainerKz.classList.add('service-kz');

        const newInputKz = document.createElement('input');
        newInputKz.type = 'text';
        newInputKz.name = `services_kz[${index}]`;
        newInputKz.classList.add('form-control');
        newInputKz.placeholder = 'Введите название услуги';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Удалить';
        removeButton.classList.add('remove-service-kz');
        removeButton.addEventListener('click', function () {
            serviceContainerKz.remove();
        });

        serviceContainerKz.appendChild(newInputKz);
        serviceContainerKz.appendChild(removeButton);

        servicesListKz.appendChild(serviceContainerKz);
    });

    // Добавляем обработчики событий для уже существующих кнопок удаления
    document.querySelectorAll('.remove-service-kz').forEach(button => {
        button.addEventListener('click', function () {
            button.closest('.service-kz').remove();
        });
    });
});
</script>
@endpush

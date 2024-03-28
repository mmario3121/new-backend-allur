@extends('layouts.admin')

@section('title', 'Настройки сайта')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Настройки сайта</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')

            <a class="btn btn-primary btn-sm" href="{{ url('/admin/settings/log-viewer') }}">
                1) Посмотреть логи
            </a>

            <form method="POST" action="{{ route('admin.commands.optimizeClear') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    2) Optimize-clear
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.storageLink') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    3) Storage-link
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.configClear') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    4) Config-clear
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.configCache') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    5) Config-cache
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.routeClear') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    6) Route-clear
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.routeCache') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    7) Route-cache
                </button>
            </form>

            <form method="POST" action="{{ route('admin.commands.cacheClear') }}"
                  class="d-inline">
                @method('POST')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" title="Storage-link">
                    8) Cache-clear
                </button>
            </form>

            <div class="mt-3" style="height: 600px;">
                <div id="fm"></div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });
    </script>
@endpush

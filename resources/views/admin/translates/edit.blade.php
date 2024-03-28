@extends('layouts.admin')

@section('title', 'Редактировать')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="m-0">Редактировать</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @include('admin._components.alert')


            <a href="{{ route('admin.translates.index') }}" title="Назад"
               class="btn btn-warning btn-sm mb-3">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Назад
            </a>

            <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                  action="{{ route('admin.aboutItems.update', ['about' => $about, 'aboutItem' => $aboutItem]) }}">
                @method('PATCH')
                @csrf
                @include('admin.aboutItems._form')
            </form>

        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-ru-RU.min.js"></script>

    <script>
        let loadFile = function (event) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('image-preview');
                output.style.display = 'block'
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('.ckeditor').summernote({
            height: 260,
            tabDisable: true,
            tabSize: 4,
            lang: 'ru-RU',
            fontNames: [
                'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                'Tahoma', 'Times New Roman', 'Verdana',
            ],
            fontNamesIgnoreCheck: [],
            toolbar: [
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['height', ['height']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            callbacks: {
                onMediaDelete: function ($target, editor, $editable) {
                    $.ajax({
                        url: '/admin/summernote/delete-image',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            src: $target.attr('src')
                        },
                        success: function (response) {
                            console.log(response.message);
                        },
                        error: function (xhr, status, error) {
                            console.log('Image delete failed: ' + error);
                        }
                    });
                },
                onImageUpload: function (files) {
                    let formData = new FormData();
                    formData.append('file', files[0]);
                    $.ajax({
                        url: '/admin/summernote/upload-image',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === true) {
                                $(this).summernote('insertImage', response.url);
                            }
                        }.bind(this),
                        error: function (response) {
                            if (response.status === false) {
                                alert(response.message);
                                console.log('Summernote response', response)
                                console.log(response.errors)
                            }
                        }
                    });
                }
            }
        });
    </script>
@endpush


@extends('layouts.mail')

@section('email-content')
    <div>
        <h4 style="text-align: center">Отклик на вакансию {{ $vacancyApplication->vacancy?->titleTranslate->ru }} </h4>

        <b>ФИО:</b> {{ $vacancyApplication->full_name }} <br>
        <b>Номер телефона:</b> {{ $vacancyApplication->phone }} <br>
        <b>E-mail:</b> {{ $vacancyApplication->email }} <br>
        <b>Резюме:</b>

        <a href="{{ $vacancyApplication->file_url }}" target="_blank">
            {{ $vacancyApplication->file }}
        </a>
    </div>
@endsection

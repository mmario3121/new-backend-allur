@extends('layouts.mail')

@section('email-content')
    <div>
        <h4 style="text-align: center">
            Сcылка для восстановления пароля:

            <a href="https://front-mentorme.mydev.kz/reset?email={{$email}}&token={{$token}}" target="_blank">
                востановить
            </a>
        </h4>
    </div>
@endsection

@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            {!!Form::open()->method('post')->route('check')!!}

            {!!Form::text('inn', 'Введите ИНН')->required()->help("Инн физического лица, 10 или 12 цифр, см. <a target='_blank' href='http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=134082&dst=1000000001#00009710269741562971'>Приказ
от 29 июня 2012 г. n ммв-7-6/435</a>")!!}


            @if (\Session::has('success'))
                @if (\Session::get('status'))
                    <div class="alert alert-success">
                        {{\Session::get('message')}}
                    </div>
                @endif
                @if (!\Session::get('status'))
                    <div class="alert alert-danger">
                        {{\Session::get('message')}}
                    </div>
                @endif
            @endif

            {!!Form::submit('Проверить')!!}

            {!!Form::close()!!}


        </div>
    </div>

@endsection

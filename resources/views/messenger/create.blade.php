@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="col-md-12 text-center corporateBlue">
            <h2>Создать новое сообщение</h2>
        </div>
        {!! Form::open(['route' => 'messages.store']) !!}
        {!! Form::hidden('recipients[]', $userId) !!}
        <div class="col-md-6 col-md-offset-3">
            <!-- Subject Form Input -->
{{--             <div class="form-group">
                {!! Form::label('subject', 'Тема', ['class' => 'control-label pull-right']) !!}
                {!! Form::text('subject', null, ['class' => 'form-control messageTextSubject']) !!}
            </div> --}}

            <!-- Message Form Input -->
            <div class="form-group">
                <textarea class="form-control messageTextArea" name="message" rows="10" placeholder="Ваше сообщение"></textarea>
            </div>


            <!-- Submit Form Input -->
            <div class="form-group pull-right">
                {!! Form::submit('Отправить', ['class' => 'btn btn-yoga-custom form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
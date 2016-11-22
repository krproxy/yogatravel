@extends('layouts.master')

@section('body')
    <div class="container">
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <div class="col-xs-2">
                    <img class="img-responsive img-circle messageAvatar"
                         src="{!! $thread->creator()->avatar !!}" alt="">
                </div>
                <div class="col-xs-10">
                    <h2>{!! $thread->creator()->name !!}</h2>
                </div>
                <div class="col-xs-12">
                    <h3><b>{{$thread->subject}}</b></h3>
                </div>
            </div>

            {{--            <h1>{!! $thread->subject !!}</h1>--}}

            @foreach($thread->messages as $message)
                <div class="row {{ $message->user_id == Auth::id() ? "messageFromMe" : "messageForMe" }}">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                @if($message->user_id != Auth::id())
                                    <img width="30px" src="{{$message->user->avatar}}"
                                         alt="{!! $message->user->name !!}"
                                         class="img-circle">
                                    <strong><a href="/profile/{{$message->user->id}}">{!! $message->user->name !!}</a>: </strong>
                                @else
                                    <span class="color-we f600-14">Вы: </span>
                                @endif
                                <?php
                                $d1 = strtotime($message->created_at);
                                $date2 = date("d.m.Y H:m", $d1);
                                ?>
                                <img src="/img/SVG/clock_14x14.svg" alt="" width="14px">
                                <span class="grey-check-map">{{$date2}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p>{!! $message->body !!}</p>
                    </div>
                </div>
            @endforeach

            <!-- Message Form Input -->
            <div class="form-group">
                <textarea class="form-control messageTextArea" name="message" rows="10" placeholder="Ваше сообщение"></textarea>
            </div>


            <!-- Submit Form Input -->
            <div class="form-group pull-right">
                {!! Form::submit('Отправить', ['class' => 'btn btn-yoga-custom form-control']) !!}
            </div>
        </div>
        {{--<div class="col-md-4 pull-right">--}}
        {{--@if($users->count() > 0)--}}
        {{--<div class="checkbox">--}}
        {{--@foreach($users as $user)--}}
        {{--<p>--}}
        {{--<label title="{!! $user->name !!}">--}}
        {{--<input type="checkbox" name="recipients[]" value="{!! $user->id !!}">{!! $user->name !!}--}}
        {{--</label>--}}
        {{--</p>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--</div>--}}
        {!! Form::close() !!}
    </div>
@stop
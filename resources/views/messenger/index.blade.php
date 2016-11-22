@extends('layouts.master')

@section('body')
    <div class="container">

        {{--<div class="col-xs-12">--}}
        {{--<a href="{{URL::to('messages/create')}}" class="btn btn-login">Начать разговор</a>--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-md-6 col-md-offset-3 corporateBlue text-left pleft37">
                <h2>Мои диалоги:</h2>
                <hr>
            </div>
        </div>

        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
                {!! Session::get('error_message') !!}
            </div>
        @endif
        @if($threads->count() > 0)
            @foreach($threads as $thread)
                <?php
                    // получаем нашего собеседника
                    $companions = $thread->participants()->whereNotIn('user_id', [Auth::id()])->get();
                    $companion = null;
                    if (count($companions) == 0){
                        $companion = Auth::user();                    
                    }
                    else {
                        $companion = $companions[0]->user()->get();   
                        $companion = $companion[0];   
                    }
                ?>
                <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                <div class="row messages-row" onclick="location.href='messages/{{ $thread->id }}'">
                    <div class="col-xs-6 col-xs-offset-3 pleft37 media alert {!!$class!!}">
                        <div class="row">
{{--                             <div class="col-xs-12">
                                <h4>{{$thread->subject}}</h4>
                            </div> --}}
{{--                             <div class="col-xs-2 messageAvatarCol">
                                <a href="/profile/{{$thread->creator()->id}}">
                                    <img class="img-responsive img-circle messageAvatar"
                                         src="{!! $thread->creator()->avatar !!}" alt="">
                                </a>
                            </div> --}}
                            <div class="col-xs-2 messageAvatarCol">
                                <a href="/profile/{{$companion->id}}">
                                    <img class="img-responsive img-circle messageAvatar"
                                         src="{!! $companion->avatar !!}" alt="">
                                </a>
                            </div>
                            <div class="col-xs-10">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php
                                        $d1 = strtotime($thread->created_at);
                                        $date2 = date("d.m.Y H:m", $d1);
                                        ?>
                                        <strong><a href="/profile/{{$companion->id}}">{!! $companion->name !!}</a>: </strong>
                                        <img src="/img/SVG/clock_14x14.svg" alt="" width="14px">
                                        <span class="grey-check-map">{{$date2}}</span>
                                    </div>
                                    <div class="col-xs-12">
                                        @if($thread->latestMessage->user_id == Auth::id())
                                            <strong>Вы: </strong>
                                        @endif
                                        {{-- {!! link_to('messages/' . $thread->id, $thread->latestMessage->body) !!} --}}
                                        {!! $thread->latestMessage->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-xs-offset-3 messageUnderline">
                        <hr>
                    </div>

                    {{--<h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>--}}
                    {{--<p>{!! $thread->latestMessage->body !!}</p>--}}
                    {{--<p>--}}
                    {{--<small><strong>Создатель:</strong> {!! $thread->creator()->name !!}</small>--}}
                    {{--</p>--}}
                    {{--<p>--}}
                    {{--<small><strong>Участники:</strong> {!! $thread->participantsString(Auth::id()) !!}</small>--}}
                    {{--</p>--}}
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-md-6 col-md-offset-3 corporateBlue text-left pleft37">
                    <h2>Извините, нет активных разговоров.</h2>
                </div>
            </div>
        @endif
    </div>
@stop

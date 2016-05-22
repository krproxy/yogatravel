@extends('layouts.master')

@section('ogUrl', asset('/service/'.$service->id))
@section('ogType', "article")
@section('ogTitle', $service->address)
@section('ogDescription', $service->description)
@if(count($service->attaches) != 0)
    @section('ogImage', asset($service->attaches->first()->filename))
@endif
@section('title', $service->address)

@section('description', $service->description)
@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="w70p inline">
                    @if($service->type=='teaService')
                        <p class="color-tea f25-400">
                            <img src='/img/SVG/geometka_tea_12x20.svg' class='img18' alt=''>
                            {{$service->address}}
                        </p>
                    @elseif($service->type=='checkInn')
                        <p class="corporateBlue">
                            <img src='/img/SVG/geometka_check-in_12x20.svg' class='img18' alt=''>
                            {{$service->address}}
                        </p>
                    @elseif($service->type=='couchService')
                        <p class="color-sleep f25-400">
                            <img src='/img/SVG/geometka_couch_12x20.svg' class='img18' alt=''>
                            {{$service->address}}
                        </p>
                    @elseif($service->type=='walkServices')
                        <p class="color-walk f25-400">
                            <img src='/img/SVG/geometka_walk_12x20.svg' class='img18' alt=''>
                            {{$service->address}}
                        </p>
                    @endif
                </div>
                <div class="w29p inline text-right f300-16">
                    <img src='/img/SVG/clock_14x14.svg' class='w14 mt--5'>
                    {{ date("d,m,Y", strtotime($service->created_at))}}
                </div>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php $isActive = true;?>
                        @if(count($service->attaches) != 0)
                            @for($i=0; $i<count($service->attaches); $i++)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                                <?php if ($isActive) {
                                    echo 'class="active"';
                                    $isActive = false;
                                } ?>
                                ></li>
                            @endfor
                        @endif
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $isActive = true;?>
                        @if(count($service->attaches) != 0)
                            @foreach($service->attaches as $attach)
                                <div class="item <?php if ($isActive) {
                                    echo 'active';
                                    $isActive = false;
                                }  ?>">
                                    <a class="fancybox" rel="group" href="{{URL::to($attach->filename)}}"><img
                                                src="{{URL::to($attach->filename.'/600/400/chunk')}}"
                                                alt="{{$attach->alt}}"
                                                title="{{$attach->title}}"/></a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <p class="f300-16">{{$service->description}}</p>
                <div class="w100p">
                    @if($service->type=='teaService')
                        <a href="{{URL::to('messages/create/' . $service->user->id)}}"
                           class="btn btn-all btn-tea-bg">
                            <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                            Принять приглашение
                        </a>
                    @elseif($service->type=='couchService')
                        <a href="{{URL::to('messages/create/' . $service->user->id)}}"
                           class="btn  btn-all btn-sleep-bg">
                            <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                            Принять приглашение
                        </a>
                    @elseif($service->type=='walkServices')
                        <a href="{{URL::to('messages/create/' . $service->user->id)}}"
                           class="btn btn-all btn-walk-bg">
                            <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                            Принять приглашение
                        </a>
                    @endif


                    <div class="media">
                        <div class="media-left">
                            <a href="{{URL::to('/profile/' . $service->user->id)}}">
                                <img src="{{isset($service->user->avatar)?$service->user->avatar:asset('img/SVG/profile_12x13.svg')}}"
                                     alt="" class="img37 circle .mt--5 media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Автор:</h4>
                            @if($service->type=='teaService')
                                <a href="{{URL::to('/profile/' . $service->user->id)}}">
                                    <span class="f600-16 color-tea pm-0">{{$service->user->name}}</span>
                                </a>
                                <img src='/img/SVG/share_tea_18x18.svg' class='img18 pull-right mt14' alt=''>
                            @elseif($service->type=='checkInn')
                                <a href="{{URL::to('/profile/' . $service->user->id)}}">
                                    <span class="f600-16 corporateBlue pm-0">{{$service->user->name}}</span>
                                </a>
                                <img src='/img/SVG/share_check-in_18x18.svg' class='img18 pull-right mt14' alt=''>
                            @elseif($service->type=='couchService')
                                <a href="{{URL::to('/profile/' . $service->user->id)}}">
                                    <span class="f600-16 color-sleep">{{$service->user->name}}</span>
                                </a>
                                <img src='/img/SVG/share_couch_18x18.svg' class='img18 pull-right mt14' alt=''>
                            @elseif($service->type=='walkServices')
                                <a href="{{URL::to('/profile/' . $service->user->id)}}">
                                    <span class="f600-16 color-walk">{{$service->user->name}}</span>
                                </a>
                                <img src='/img/SVG/share_walk_18x18.svg' class='img18 pull-right mt14' alt=''>
                            @endif
                        </div>
                    </div>
                </div>
                @if(Auth::check())
                    <form class="form-horizontal " role="form" method="POST" action="{{ url('addComment') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="yoga_point_id" value="{{$service->id}}">

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">

                    <textarea class="form-control w100p mt14" name="comment" placeholder="Комментарий"
                              rows="5"></textarea>

                            @if ($errors->has('comment'))
                                <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-y btn-yoga-custom pull-right">
                                <span>Комментировать</span>
                            </button>
                        </div>
                    </form>
                @else
                    <div class="text-center">
                        <a href="{{asset('auth/login')}}" class="btn btn-yoga-custom w100p mt14">
                            Зарегистрируйтесь чтобы оставить комментарий</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                @foreach($service->comments as $comment)
                    <a href="/profile/{{$comment->user_id}}">
                        <img src="{{$comment->user->avatar}}" alt="" class="img20 circle">
                        <span class="f600-16 color-grey-name">{{$comment->user->name}}</span>
                    </a>,
                    <span class="color-date">
                        <img src="/img/SVG/clock_14x14.svg" class="w14 mt--5">
                        {{ date("d.m.Y, H:m", strtotime($comment->created_at)) }}
                    </span>
                    <br>
                    {{$comment->text}}
                    <hr>
                @endforeach
            </div>
        </div>

    </div>
@stop

@section('customScripts')

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox();
        });
    </script>
@endsection
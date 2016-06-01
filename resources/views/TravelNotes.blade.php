@extends('layouts.master')

@section('title', 'Новости и блоги йогов, путешественников всех стран мира')

@section('description', 'Новости о тревеле, переездах, личном опыте, развитии через путешествия от йогов. Рассказы странников о культуре, кухне, людях разных стран мира')

@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        В данном разделе планируются публикации из личных блогов путешественников. На данном этапе здесь
                        публикуются новости в формате твиттера.
                    </div>
                </div>
                @foreach($posts as $post)
                    @if($post['message'])
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{$post['created_time']->format('Y-m-d H:i:s')}}
                            </div>
                            <div class="panel-body">
                                <p class="text-justify">{{$post['message']}}</p>
                                @if(isset($post['tags']))
                                    @foreach($post['tags'] as $tag)
                                        <a class="label label-info" target="_blank"
                                           href="{{url('https://www.facebook.com/hashtag/' . $tag)}}">
                                            <small>#{{$tag}}</small>
                                        </a>&#160;
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{--<div class="well">--}}
                            {{--<p>{{$post['created_time']->format('Y-m-d H:i:s')}}--}}
                                {{--<a target="_blank" href="https://www.facebook.com/YogaTravel.All/posts/{{$post['id']}}">подробнее</a>--}}
                            {{--</p>--}}
                            {{--<p class="text-justify">{{$post['message']}}</p>--}}
                            {{--@if(isset($post['tags']))--}}
                                {{--@foreach($post['tags'] as $tag)--}}
                                    {{--<a class="label label-info" target="_blank"--}}
                                       {{--href="{{url('https://www.facebook.com/hashtag/' . $tag)}}">--}}
                                        {{--<small>#{{$tag}}</small>--}}
                                    {{--</a>&#160;--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

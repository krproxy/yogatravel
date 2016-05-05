@extends('layouts.app')

@section('title', 'Новости и блоги йогов, путешественников всех стран мира')

@section('description', 'Новости о тревеле, переездах, личном опыте, развитии через путешествия от йогов. Рассказы странников о культуре, кухне, людях разных стран мира')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{--<h3>Данный раздел находится в разработке</h3>--}}
                @foreach($posts as $post)
                    @if($post['message'])
                        <div class="well">
                            <p>{{$post['created_time']->format('Y-m-d H:i:s')}}, <a target="_blank"
                                                                                    href="https://www.facebook.com/YogaTravel.All/posts/{{$post['id']}}">подробнее</a>
                            </p>
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
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

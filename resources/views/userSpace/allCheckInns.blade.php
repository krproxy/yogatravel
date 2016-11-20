@extends('layouts.master')

@section('body')
    <div class="container spark-screen">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/SettingPost') }}"
              enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <th class="active">адрес</th>
                            <th class="warning">описание</th>
                            <th class="success">редактировать</th>
                            {{-- <th class="danger">удалить</th> --}}
                        </tr>
                        @foreach($allCheckInns as $checkInn)
                            <tr>
                                <td class="active">{{$checkInn->address}}</td>
                                <td class="warning">{{$checkInn->description}}</td>
                                <td class="success"><a href="{{asset('editYogaPoint/'.$checkInn->id)}}"
                                                       class="btn btn-yoga-custom">редактировать</a></td>
                                {{-- <td class="danger"><a href="{{asset('deleteYogaPoint/'.$checkInn->id)}}" --}}
                                                      {{-- class="btn btn-danger">удалить</a></td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
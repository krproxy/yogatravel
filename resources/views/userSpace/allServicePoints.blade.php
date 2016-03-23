@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/SettingPost') }}"
              enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <th class="info">тип</th>
                            <th class="active">адрес</th>
                            <th class="warning">описание</th>
                            <th class="success">редактировать</th>
                            <th class="danger">удалить</th>
                        </tr>
                        @foreach($myServices as $service)
                            <tr>
                                <td class="info">{{$service->type}}</td>
                                <td class="active">{{$service->address}}</td>
                                <td class="warning">{{$service->description}}</td>
                                <td class="success"><a href="{{asset('editYogaPoint/'.$service->id)}}"
                                                       class="btn btn-green">редактировать</a></td>
                                <td class="danger"><a href="{{asset('deleteYogaPoint/'.$service->id)}}"
                                                      class="btn btn-danger">удалить</a></td>
                            </tr>
                        @endforeach
                    </table>


                </div>
            </div>
        </form>
    </div>
@endsection
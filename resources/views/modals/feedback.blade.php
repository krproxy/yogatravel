<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 09.05.16
 * Time: 9:29
 */ ?>
        <!-- Modal_FAQ -->
<div class="modal fade" id="FEEDBACK" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Отправить нам сообщение</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal " role="form" method="POST" action="{{ url('/feedback') }}">
                    {!! csrf_field() !!}
                    @include('widgets.form._formitem_text', ['name' => 'name', 'lable'=>true, 'title' => 'Ваше имя', 'placeholder' => 'Укажите Ваше имя' ])
                    @include('widgets.form._formitem_text', ['name' => 'email', 'lable'=>true, 'title' => 'Email', 'placeholder' => 'Укажите Ваш Email' ])
                    @include('widgets.form._formitem_textarea', ['name' => 'text', 'lable'=>true, 'title' => 'Ваше сообщение', 'placeholder' => 'Напишите текст сообщения' ])
                    @include('widgets.form._formitem_btn_submit', ['title' => 'Отправить сообщение'])
                    {{--<button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>--}}
                </form>
            </div>
            {{--<div class="modal-footer">--}}
            {{--<div class="panel-body">--}}
            {{--<ul class="list-inline">--}}
            {{--<li>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>

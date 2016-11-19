<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:36
 */ ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <ul class="list-inline">
                    <li class="footer-social">
                        <a href="https://vk.com/yoga_travel_all"><img class="footer-social-btn"
                                                                      src="/img/SVG/footer_vk_40x41.svg" alt=""></a>
                        <a href="https://www.facebook.com/YogaTravel.All"><img class="footer-social-btn"
                                                                               src="/img/SVG/footer_fb_40x41.svg"
                                                                               alt=""></a>
                    </li>
                    <li class="footer-text">
                        <ul style="list-style-type:none">
                            <li><a href="#" data-toggle="modal" data-target="#FEEDBACK">Написать нам</a></li>
{{--                             <li><a href="#" data-toggle="modal" data-target="#FAQ">
                                    Часто задаваемые вопросы
                                </a></li> --}}
                            <li><a href="#" data-toggle="modal" data-target="#rules">
                                    Правила пользования сайтом
                                </a></li>
                            <li class="yoga-copyright">&#169; {{date("Y")}} YogaTravel</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@include('modals.feedback')
@include('modals.FAQ')
@include('modals.rules')
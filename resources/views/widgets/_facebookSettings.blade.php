<?php
/**
 * получаем фейсбук обработчик и генерим урл для авторизации
 */
$fb = app(SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);
$fb_login_url = $fb->getLoginUrl(['email', 'publish_actions']);
?>
<hr>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon" style="color: #4c67a1;">
            <i id="facebook-registration" class="fa fa-facebook fa-lg"></i>
        </span>
            <span class="input-group-btn">
                @if(Auth::user()->fb_access_token)
                    <a class="btn btn-socials"
                       href="{{asset('fbAccountUnbind')}}"> Отвязать аккаунт</a>
                @else
                    <a class="btn btn-socials"
                       href="{{asset($fb_login_url)}}"> Присоединить аккаунт</a>
                @endif
            </span>
    </div><!-- /input-group -->
</div>
@if(Auth::user()->fb_access_token)
    <div class="form-group">
        <label><input type="checkbox"
                      id="my-checkbox"
                      data-size="small"
                      name="fb_in_wall_posting_allowed"
                      {{Auth::user()->fb_in_wall_posting_allowed?'checked':''}}
                      onchange="disableFalse()">
            <span class="corporateBlue"> Публиковать в ленте</span>
        </label>
    </div>
    <div class="form-group">
        <label><input type="checkbox"
                      id="my-checkbox"
                      data-size="small"
                      name="fb_in_group_posting_allowed"
                      {{Auth::user()->fb_in_group_posting_allowed?'checked':''}}
                      onchange="disableFalse()">
            <span class="corporateBlue"> Публиковать в группе Yoga Travel</span>
        </label>
    </div>
    <hr>
@endif

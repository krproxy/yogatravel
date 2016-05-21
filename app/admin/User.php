<?php

Admin::model(\App\User::class)->title('Йога Пользователи')->with()->filters(function ()
{

})->columns(function ()
{
	Column::adminString('name', 'Name');
	Column::adminString('email', 'Email');
	Column::adminString('shortStory', 'ShortStory');
	Column::adminString('is_blocked', 'Is_blocked');
	Column::adminString('can_fb_in_wall_posting', 'Can_fb_in_wall_posting');
	Column::adminString('can_fb_in_group_posting', 'Can_fb_in_group_posting');
})->form(function ()
{
	FormItem::text('name', 'Name');
	FormItem::text('email', 'Email');
	FormItem::text('avatar', 'Avatar');
	FormItem::text('social_id', 'Social');
	FormItem::text('fb_access_token', 'Fb Access Token');
	FormItem::checkbox('fb_in_wall_posting_allowed', 'Fb In Wall Posting Allowed');
	FormItem::checkbox('fb_in_group_posting_allowed', 'Fb In Group Posting Allowed');
	FormItem::text('shortStory', 'Short Story');
	FormItem::text('password', 'Password');
	FormItem::text('remember_token', 'Remember Token');
	FormItem::checkbox('is_blocked', 'Is Blocked');
	FormItem::checkbox('can_fb_in_wall_posting', 'Can Fb In Wall Posting');
	FormItem::checkbox('can_fb_in_group_posting', 'Can Fb In Group Posting');
});
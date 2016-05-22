<?php

Admin::model(\App\User::class)->title('Йога Пользователи')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('name', 'Name');
	Column::string('email', 'Email');
	Column::string('shortStory', 'ShortStory');
	Column::string('is_blocked', 'Is_blocked');
	Column::string('can_fb_in_wall_posting', 'Can_fb_in_wall_posting');
	Column::string('can_fb_in_group_posting', 'Can_fb_in_group_posting');
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
<?php


namespace app\admin\validate;


use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require',
        'captcha'  => 'require',
        'token'    => 'token',
    ];

    protected $message = [
        'username' => '用户名不允许为空',
        'password' => '密码不允许为空',
        'captcha'  => '验证码不允许为空',
        'token'    => '令牌失效',
    ];
}
<?php


namespace app\admin\business;


use think\exception\ValidateException;

class AdminUser extends AdminBase
{
    public static function validates($data)
    {
        try {
            $validate = new \app\admin\validate\AdminUser();
            $result = $validate->check($data);
            if (true !== $result) {
                return $validate->getError();
            }
        } catch (ValidateException $e) {
            return "验证失败";
        }
    }
}
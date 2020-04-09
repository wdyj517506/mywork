<?php


namespace app\admin\controller;


use think\exception\ValidateException;
use think\facade\View;
use app\common\mysql\model\Admin;
use liliuwei\think\Auth;
class Login extends AdminBase
{
    public function index()
    {
        return View::fetch();
    }

    public function check()
    {
        $data = $this->request->param('','','trim');
        if(!captcha_check($data['captcha'])){
            return $this->show(config("status.code.error"), "验证码错误");
        };
        try {
            $validate = new \app\admin\validate\AdminUser();
            $result = $validate->check($data);
            if (true !== $result) {
                return $this->show(config("status.code.error"), $validate->getError().$result, $data);
            }
            $adminUser = new Admin();
            $modelresoult = $adminUser->getAdminByUsername($data);
            if(!$modelresoult){
                return $this->show(config("status.code.error"), "用户名有误");
            }
        } catch (ValidateException $e) {
            return $this->show(config("status.code.error"), "验证失败".$e->getError(), $data);
        }
        return $this->show(config("status.code.success"), "登录成功");
    }
    public function add()
    {
        
    }
}
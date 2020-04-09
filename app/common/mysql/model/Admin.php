<?php


namespace app\common\mysql\model;


use think\Model;

class Admin extends Model
{
    public function getAdminByUsername($data) : bool
    {
        $where = [
            'username' => $data['username'],
        ];
        $result = Admin::where($where)->find();
        if($result){
            return true;
        }
        return false;
    }
}
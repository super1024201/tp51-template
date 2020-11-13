<?php

namespace app\admin\controller;

class Config extends Common
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function index()
    {
        if (request()->isAjax()) {
            $path = __DIR__ . '/../../../config/web_config.php';
            $data = input();
            $op = fopen($path, 'w');
            $res = fwrite($op, "<?php" . "\n" . "return " . var_export($data, true) . ';');
            if ($res !== false) {
                return ['code' => 200, 'msg' => '保存成功!'];
            } else {
                return ['code' => 500, 'msg' => '保存失败，网络繁忙!'];
            }
        }

        $this->assign('data', config('web_config.'));

        return $this->fetch();
    }
}
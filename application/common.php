<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

if (!function_exists('upload')) {
    function upload($folder = 'public', $name = 'img', $ext = 'jpg,jpeg,png,gif')
    {
        $file = request()->file($name);
        $pre_path = '/uploads/' . $folder;
        $info = $file->rule("uniqids")->validate(['size' => 50 * 1024 * 1024, 'ext' => $ext])->move("." . $pre_path);
        if ($info) {
            return ['code' => 200, 'msg' => '上传成功！', 'path' => $pre_path . "/" . $info->getSaveName()];
        } else {
            return ['code' => 500,  'msg' => $file->getError()];
        }
    }
}

if (!function_exists('p')) {
    function p($data)
    {
        if (is_array($data)) {
            echo '<pre>';
            print_r($data);
            exit;
        } elseif (is_string($data)) {
            echo PHP_EOL . $data . PHP_EOL;
            exit;
        } else {
            echo PHP_EOL;
            var_dump($data);
            echo PHP_EOL;
            exit;
        }
    }
}

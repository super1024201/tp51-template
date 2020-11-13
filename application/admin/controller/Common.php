<?php
/**
 * Author: super
 * Date: 2020/11/13
 */

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{
    public function initialize()
    {
        parent::initialize();

        if (!session('?admin')) {
            // $this->redirect('Login/index');
        }
    }

    /**
     * 文件上传
     * @access public
     * @return array
     */
    public function uploadFile()
    {
        return upload();
    }
}

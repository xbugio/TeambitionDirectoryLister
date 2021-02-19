<?php
// TEAMBITION_COOKIE teambition在网页登陆后的cookie，有效期较长，可以直接复用
define('TEAMBITION_COOKIE', '');

// TEAMBITION_ORGID 登陆网页版teambition后显示在url上(org后面)
define('TEAMBITION_ORGID', '');

// TEAMBITION_DRIVEID 登陆网页后访问该接口地址(TEAMBITION_ORGID换成对应的内容)
// https://pan.teambition.com/pan/api/orgs/TEAMBITION_ORGID后在返回数据中获取(driveId)
define('TEAMBITION_DRIVEID', '');

// TEAMBITION_ROOT_NODEID 想作为根目录共享的文件夹ID，在网页登陆后显示在url上(folder后面)
define('TEAMBITION_ROOT_NODEID', '');

// THEMEPATH 主题目录
define('THEMEPATH', 'resources/themes/bootstrap');

// REWRITE_MODE 是否开启URL伪静态
define('REWRITE_MODE', false);
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
/*http://localhost:8085/thinkphp5_study/public/index.php/api/news/index?id=1变为
 * http://localhost:8085/thinkphp5_study/public/index.php/news/1
*/
//Route::rule('news/:id', 'api/news/index');   //查询
Route::get(':version/news/:id', 'api/:version.News/view');
Route::get(':version/news/', 'api/:version.News/index');   //查询
Route::post(':version/News', 'api/:version.News/create');//创建
Route::put(':version/News/:id', 'api/:version.News/update');//更新
Route::delete(':version/News/:id', 'api/:version.News/delete');//删除
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
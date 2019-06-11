<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'RegisterController@register');
    $router->post('/login', 'LoginController@login');
    //get info tinh thanh
    $router->post('getTinhThanh','TinhController@getTinh');

    //get info quanhuyen by tinh thanh
    $router->post('getQuanHuyen','QuanhuyenController@getQuanhuyen');

    //get info xaphuong by tinh quanhuyen
    $router->post('getXaphuong','XaphuongController@getXaphuong');

    // get InfoCategory loaitin 
    $router->post('getLoaitin','LoaitinController@getLoaitin');

    $router->post('getTinmuaban','HomeController@getTinmuaban');
    $router->post('/getUser','LoginController@getUser');
    $router->post('/logout','LoginController@logout');
    $router->post('addInfo','MainController@addInfo');

    $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
        $router->group(['prefix' => 'media'], function () use ($router) {
            $router->post('/uploadImage','MediaController@uploadImage');
        });
        $router->group(['prefix' => 'tintuc'], function () use ($router) {
            $router->post('/themtin','HomeController@createNews');
            $router->group(['middleware' => ['edit']], function () use ($router) {
                $router->post('/editTintuc','HomeController@postEditTintuc');
            });
            $router->group(['middleware' => ['edit1']], function () use ($router) {
                $router->post('/editTinmua','HomeController@postEditTinmua');
            });
        });
        
        $router->post('editUser','HomeController@postEditUser');                                     

    });
});
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->group(['middleware' => 'login'], function () use ($router) {      
        $router->get('login', 'AuthController@index');
        $router->get('register', 'AuthController@register');
    });

    $router->group(['middleware' => 'admin'], function () use ($router) {
        $router->get('/home','HomeController@index');

        $router->get('quanhuyen','QuanhuyenController@getDS');

        $router->get('middleware', function ()  {
            return view('contents.middlewareFail', ['title' => 'Authentication fail','id'=>'quanlyuser']);
        });
        //Get tin mua ban - backend admin
        $router->get('tinmuaban','HomeController@getTinmuaban');
        //Get tin tuc - backend
        $router->get('tintucnhadat/{id}','HomeController@getTintucnhadat');

        //quyen admin vaf editor
        $router->group(['middleware' => ['isAdmin']], function () use ($router) {
            $router->get('getUser','HomeController@getUser');
            $router->get('active/{id}','HomeController@activeUser');
            $router->get('userEdit/{id}','HomeController@editUser');
            $router->get('delete/{id}','HomeController@deleteUser');
        });
        $router->get('vietbai', function ()  {
            return view('contents.vietbai', ['title' => 'Viết bài mới','id'=>'vietbai']);
        });
        //xacc thuc quyen edit voi tin tuc
        $router->group(['middleware' => ['edit']], function () use ($router) {
            $router->get('editTintuc/{id}','HomeController@getEditTintuc');
            $router->get('deleteTintuc/{id}','HomeController@deleteTintuc');
        });
        //quyen edit tinmua ban
        $router->group(['middleware' => ['edit1']], function () use ($router) {
            $router->get('editTinmua/{id}','HomeController@getEditTinmua');
            $router->get('deleteTinmua/{id}','HomeController@deleteUser');
        });                 
        $router->get('loaiTin','HomeController@loaiTin');
        $router->get('tailieu','HomeController@getTailieu');
        $router->post('themXaphuong','HomeController@createXaphuong');
        $router->post('themQuanhuyen','HomeController@createQuanhuyen');
        $router->post('themTinh','HomeController@createTinh');
        $router->post('themLoai','HomeController@createThemloai');
       
    });
});
// Front end
$router->get('/','MainController@index');
$router->get('/muaban-bds/{slug}','MainController@muabanByQuanhuyen');
$router->get('/muaban/{slug}','MainController@muabanByXaPhuong');
$router->get('/tinban/{slug}','MainController@getTinban');
$router->get('/loaitin/{slug}','MainController@getTinByLoaiTin');
$router->get('/tintuc/{slug}','MainController@getTintuc');

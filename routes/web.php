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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
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

    $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
        $router->group(['prefix' => 'media'], function () use ($router) {
            $router->post('/uploadImage','MediaController@uploadImage');
        });
        $router->group(['prefix' => 'tintuc'], function () use ($router) {
            $router->post('/themtin','HomeController@createNews');
            $router->group(['middleware' => ['edit']], function () use ($router) {
                $router->post('/editTintuc','LoginController@postEditTintuc');
            });
            $router->group(['middleware' => ['edit1']], function () use ($router) {
                $router->post('/editTinmua','HomeController@postEditTinmua');
            });
        });
        
        $router->post('editUser','HomeController@postEditUser');                                     

    });
});
$router->group(['prefix' => 'admin'], function () use ($router) {
       
    $router->get('login', 'AuthController@index');
    $router->get('register', 'AuthController@register');
    
    $router->group(['middleware' => 'admin'], function () use ($router) {
        $router->get('home','HomeController@index');
        
        $router->get('quanhuyen', function ()  {
            return view('contents.quanhuyen', ['title' => 'Page quanhuyen','id'=>'quanhuyen']);
        });
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
        });
        $router->get('vietbai', function ()  {
            return view('contents.vietbai', ['title' => 'Viết bài mới','id'=>'vietbai']);
        });
        //xacc thuc quyen edit voi tin tuc
        $router->group(['middleware' => ['edit']], function () use ($router) {
            $router->get('editTintuc/{id}','HomeController@getEditTintuc');
        });
        //quyen edit tinmua ban
        $router->group(['middleware' => ['edit1']], function () use ($router) {
            $router->get('editTinmua/{id}','HomeController@getEditTinmua');
        });                 

        
    });
});

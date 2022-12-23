<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HTTP 동사(verbs)
// 모든 표준 HTTP 동사(GET, POST, PUT, DELETE, OPTIONS, etc)를 사용할 수 있음

$routes->get('/', 'Home::index');
$routes->get('board', 'Board::index');
$routes->get('board/(:any)', 'Board::view/$1');

$routes->get('formex/formex_1', 'Formex::formex_1');
$routes->get('formex/formex_2', 'Formex::formex_2');
$routes->post('formex/formex_result_post', 'Formex::formex_result_post');
$routes->get('formex/formex_result_get', 'Formex::formex_result_get');

// Dbex
$routes->get('dbex', 'Dbex::index');
// DB 추가
$routes->get('dbex/preparedInsert', 'Dbex::preparedInsert');

$routes->get('viewex', 'Viewex::index');
// Viewex
// DB 목록
$routes->get('viewex/multi_db_list', 'Viewex::multi_db_list');

// 단일 파일 업로드 양식(Single FileUpload)
$routes->get('viewex/single_upload_form', 'Viewex::single_upload_form');
$routes->post('viewex/single_upload', 'Viewex::single_upload');

// 멀티 파일 업로드 양식(Multi FileUpload)
$routes->get('viewex/multi_upload_form', 'Viewex::multi_upload_form');
$routes->post('viewex/multi_upload', 'Viewex::multi_upload');

//$routes->get('formex/(:any)', 'Board::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

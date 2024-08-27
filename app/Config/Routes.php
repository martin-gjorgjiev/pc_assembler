<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
//$routes->get('examples/(:any)', 'Examples::$1');
//$routes->match(['get', 'post'],'examples/(:any)', 'Examples::$1');

#workspace CRUD ones
$routes->match(['get', 'post'], 'workspace/users/edituserform/(:segment)', 'Workspace::edituserform/$1');
$routes->post('workspace/users/edituser', 'Workspace::edituser');
$routes->get('workspace/users', 'Workspace::users');
$routes->match(['get', 'post'], 'workspace/users/(:any)', 'Workspace::users/$1');

$routes->get('workspace/users2', 'Workspace::users2');
$routes->match(['get', 'post'], 'workspace/users2/(:any)', 'Workspace::users2/$1');

$routes->get('workspace/cpu', 'Workspace::cpu');
$routes->match(['get', 'post'],'workspace/cpu/(:any)', 'Workspace::cpu/$1');

$routes->get('workspace/gpu', 'Workspace::gpu');
$routes->match(['get', 'post'],'workspace/gpu/(:any)', 'Workspace::gpu/$1');

$routes->get('workspace/motherboard', 'Workspace::motherboard');
$routes->match(['get', 'post'],'workspace/motherboard/(:any)', 'Workspace::motherboard/$1');

$routes->get('workspace/storage', 'Workspace::storage');
$routes->match(['get', 'post'],'workspace/storage/(:any)', 'Workspace::storage/$1');

$routes->get('workspace/ram', 'Workspace::ram');
$routes->match(['get', 'post'],'workspace/ram/(:any)', 'Workspace::ram/$1');

$routes->get('workspace/psu', 'Workspace::psu');
$routes->match(['get', 'post'],'workspace/psu/(:any)', 'Workspace::psu/$1');

$routes->get('workspace/maker', 'Workspace::maker');
$routes->match(['get', 'post'],'workspace/maker/(:any)', 'Workspace::maker/$1');

$routes->get('workspace/series', 'Workspace::series');
$routes->match(['get', 'post'],'workspace/series/(:any)', 'Workspace::series/$1');

$routes->get('workspace/chipset', 'Workspace::chipset');
$routes->match(['get', 'post'],'workspace/chipset/(:any)', 'Workspace::chipset/$1');

$routes->get('workspace/socket', 'Workspace::socket');
$routes->match(['get', 'post'],'workspace/socket/(:any)', 'Workspace::socket/$1');

$routes->get('workspace/pccase', 'Workspace::pccase');
$routes->match(['get', 'post'],'workspace/pccase/(:any)', 'Workspace::pccase/$1');

$routes->get('workspace/ramtype', 'Workspace::ramtype');
$routes->match(['get', 'post'], 'workspace/ramtype/(:any)', 'Workspace::ramtype/$1');

$routes->get('workspace/storagetype', 'Workspace::storagetype');
$routes->match(['get', 'post'],'workspace/storagetype/(:any)', 'Workspace::storagetype/$1');

$routes->get('workspace/supportedcpu', 'Workspace::supportedcpu');
$routes->match(['get', 'post'],'workspace/supportedcpu/(:any)', 'Workspace::supportedcpu/$1');

$routes->get('workspace/images', 'Workspace::images');
$routes->match(['get', 'post'],'workspace/images/(:any)', 'Workspace::images/$1');

$routes->post('images','Workspace::imgupload');
$routes->post('imgopt','Workspace::imgopt');
$routes->get('imgopt/(:any)','Workspace::imgopt/$1/$2');

#basic user ones

$routes->get('/', 'Home::index');
$routes->get('components', 'Components::index');
$routes->get('components/(:segment)', 'Components::$1');
$routes->get('api/(:any)','Api::$1');
$routes->post('api/(:segment)','Api::$1');
$routes->get('/(:segment)', 'Home::$1');
$routes->post('/verify','Home::verify');

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
